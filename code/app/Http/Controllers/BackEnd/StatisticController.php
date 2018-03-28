<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProductModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dt        = Carbon::parse(Carbon::now());
        $thismonth = $dt->month;
        $lastmonth = $dt->subMonths(1)->month;

        // for product
        $product_thismonth       = ProductModel::where(DB::raw('MONTH(created_at)'), '=', $thismonth);
        $count_product_thismonth = $product_thismonth->count();
        $product_thismonth       = $product_thismonth->get();
        $count_product_lastmonth = ProductModel::where(DB::raw('MONTH(created_at)'), '=', $lastmonth)->count();
        $count_product_all       = ProductModel::count();

        // for new
        $order_thismonth       = Order::where(DB::raw('MONTH(created_at)'), '=', $thismonth);
        $count_order_thismonth = $order_thismonth->count();
        $order_thismonth       = $order_thismonth->get();
        $order_thismonth       = $order_thismonth->map(function ($item) {
            $user        = User::find($item->user_id);
            $item->email = $user->email;
            if ($item->status == 0) {
                $item->status = 'Processing';
            } elseif ($item->status == 1) {
                $item->status = 'Completed';
            } elseif ($item->status == 2) {
                $item->status = 'Pending';
            } elseif ($item->status == 3) {
                $item->status = 'Cancel';
            } elseif ($item->status == 4) {
                $item->status = 'Refund';
            } else {
                $item->status = 'Pending';
            }
            return $item;
        });
        $count_order_lastmonth = Order::where(DB::raw('MONTH(created_at)'), '=', $lastmonth)->count();
        $count_order_thisweek  = Order::select('*')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('W');
            })->count();
        $count_order_all = Order::count();

        // for user
        $user_thismonth       = User::where(DB::raw('MONTH(created_at)'), '=', $thismonth);
        $count_user_thismonth = $user_thismonth->count();
        $user_thismonth       = $user_thismonth->get();
        $count_user_lastmonth = User::where(DB::raw('MONTH(created_at)'), '=', $lastmonth)->count();
        $count_user_thisweek  = User::select('*')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('W');
            })->count();
        $count_user_all = User::count();

        $data = [
            'product_thismonth'       => $product_thismonth,
            'count_product_thismonth' => $count_product_thismonth,
            'count_product_lastmonth' => $count_product_lastmonth,
            'count_product_all'       => $count_product_all,
            'order_thismonth'         => $order_thismonth,
            'count_order_thismonth'   => $count_order_thismonth,
            'count_order_lastmonth'   => $count_order_lastmonth,
            'count_order_thisweek'    => $count_order_thisweek,
            'count_order_all'         => $count_order_all,
            'user_thismonth'          => $user_thismonth,
            'count_user_thismonth'    => $count_user_thismonth,
            'count_user_lastmonth'    => $count_user_lastmonth,
            'count_user_thisweek'     => $count_user_thisweek,
            'count_user_all'          => $count_user_all,
        ];
        return view('BackEnd.content.statistic.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

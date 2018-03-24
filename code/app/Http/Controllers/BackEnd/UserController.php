<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->paginate();
        // $users = $users->map(function($item){
        //     $item->name_role = $item->roles[0]->name;
        //     return $item;
        // });
        return view('BackEnd.content.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackEnd.content.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'first_name'  => 'required|string|min:2|max:100',
            'last_name'   => 'required|string|min:2|max:50',
            'email'       => 'required|email|unique:users|max:255',
            'avatar'      => 'nullable|image',
            'password'    => 'required|string|min:6|max:100',
            'age'         => 'nullable|numeric',
            'phone'       => 'nullable',
            'address'     => 'nullable',
            'description' => 'nullable',
        ]);
        $data             = $request->all();
        $file = new FileController;
        $path_upload = $file->upload($request);
        if($path_upload != null && $path_upload != false) {
            $data['avatar'] = $path_upload;
        }
        $data['password'] = Hash::make($request->get('password'));
        if ((int) $request->get('status_user')[0] == 0) {
            $data['status'] = User::STATUS_PENDING;
        } elseif ((int) $request->get('status_user')[0] == 1) {
            $data['status'] = User::STATUS_ACTIVE;
        }

        User::create($data);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('BackEnd.content.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('BackEnd.content.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate([
            'first_name'  => 'required|string|min:2|max:100',
            'last_name'   => 'required|string|min:2|max:50',
            'new_password'=> 'nullable|string|min:6|max:100',
            'email'       => 'exists:email',
            'avatar'      => 'nullable|image',
            'age'         => 'nullable|numeric|min:10|max:150',
            'phone'       => 'nullable|min:10|max:13',
            'address'     => 'nullable',
            'description' => 'nullable',
        ]);
        $data = $request->all();
        $file = new FileController;
        $path_upload = $file->upload($request);
        // if($path_upload == false) {
        //     return redirect()->back()->with('error', 'Can\'t not upload file');
        // }
        if($path_upload != null && $path_upload != false) {
            $data['avatar'] = $path_upload;
        }
        if ($request->has('new_password') && $request->get('new_password') != '') {
            $data['password'] = Hash::make($request->get('new_password'));
        }
        if ((int) $request->get('status_user')[0] == 0) {
            $data['status'] = User::STATUS_PENDING;
        } elseif ((int) $request->get('status_user')[0] == 1) {
            $data['status'] = User::STATUS_ACTIVE;
        }
        $user->update($data);

        return redirect()->back()->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}

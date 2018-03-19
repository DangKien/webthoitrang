<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_news = News::orderBy('id', "DESC")->paginate(6);
        return view('BackEnd.content.news.index', compact('list_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackEnd.content.news.create');
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
            'title'   => 'required|string|min:2|max:100',
            'image'   => 'nullable|image',
            'excerpt' => 'nullable',
            'content' => 'nullable',
        ]);
        $data             = $request->all();
        if($request->has('slug')) {
            $slug = $request->get('slug');
            if(empty($slug)) {
                $data['slug'] = str_slug($request->get('title'));
            } else {
                $data['slug'] = str_slug($slug);
            }
        }
        if ((int) $request->get('status_news')[0] == 0) {
            $data['status'] = News::STATUS_PENDING;
        } elseif ((int) $request->get('status_news')[0] == 1) {
            $data['status'] = News::STATUS_PUBLISH;
        }

        News::create($data);

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('BackEnd.content.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('BackEnd.content.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        request()->validate([
            'title'   => 'required|string|min:2|max:100',
            'image'   => 'nullable|image',
            'excerpt' => 'nullable',
            'content' => 'nullable',
        ]);
        $data = $request->all();

        if($request->has('slug')) {
            $slug = $request->get('slug');
            if(empty($slug)) {
                $data['slug'] = str_slug($request->get('title'));
            } else {
                $data['slug'] = str_slug($slug);
            }
        }

        if ((int) $request->get('status_news')[0] == 0) {
            $data['status'] = News::STATUS_PENDING;
        } elseif ((int) $request->get('status_news')[0] == 1) {
            $data['status'] = News::STATUS_PUBLISH;
        }
        // dd($news);
        $news->update($data);

        return redirect()->back()->with('success', 'News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')
            ->with('success', 'News deleted successfully');
    }
}

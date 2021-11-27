<?php

namespace App\Http\Controllers\Admin;

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
        $news = News::latest()->paginate(5);

        return view('admin.news.index', compact('news'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author_name' => 'required',
            'image' => 'required',
            'detail' => 'required',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->author_name = $request->author_name;
        $news->detail = $request->detail;
        $news->is_published = $request->is_published;

        $file = $request->file('image')->store('public/images/news');
        $news->image = str_replace('public', 'storage', $file);

        $news->save();



        return redirect()->route('news.index')
            ->with('success', 'News post created!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'author_name' => 'required',
            'detail' => 'required',

        ]);
        $news = News::find($news)->first();
        $news->title = $request->title;
        $news->author_name = $request->author_name;
        $news->detail = $request->detail;
        $news->is_published = $request->is_published;

        if (file_exists($news->image) && request('image')) {
            unlink($news->image);
            $file = $request->file('image')->store('public/images/news');
            $news->image = str_replace('public', 'storage', $file);
        } elseif (!file_exists($news->image) && request('image')) {
            $file = $request->file('image')->store('public/images/news');
            $news->image = str_replace('public', 'storage', $file);
        } else {
            $news->image = $news->image;
        }

        $news->update();

        return redirect()->route('news.index')
            ->with('success', 'News post updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        if (file_exists($news->image)) {
            unlink($news->image);
        }
        return redirect()->route('news.index')
            ->with('success', 'News deleted!!');
    }
}

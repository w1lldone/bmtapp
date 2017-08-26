<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helper\Uploader;

class NewsController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator($request)
    {
        switch (request()->method()) {
            case 'POST':
                return Validator::make($request, [
                    'name' => 'required',
                    'photo' => 'required|image',
                ]);
                break;
            
            case 'PATCH':
                return Validator::make($request, [
                    'name' => 'required',
                    'photo' => 'image',
                ]);
                break;
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->paginate(10);
        // return $news;
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        // $path = $request->file('photo')->store('images/news', 'uploads');
        // $photo = "/uploads/images/news/".$request->file('photo')->hashName();

        $photo = Uploader::upload('photo', 'news');

        $news = News::create([
            'name' => $request->name,
            'link' => $request->link,
            'photo' => $photo,
        ]);

        return redirect('/news')->with('status', 'Berhasil menambahkan news!');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $this->validator($request->all())->validate();

        $news->update([
            'name' => $request->name,
            'link' => $request->link,
        ]);

        if (!empty($request->file('photo'))) {
            $photo = Uploader::replace('photo', 'news', $news->photo);
            $news->update(['photo' => $photo]);
        }

        return redirect('/news')->with('status', 'Berhasil mengubah news!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}

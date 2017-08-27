<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\News;

class NewsAktifController extends Controller
{
    public function update(News $news)
    {
    	$news->update(request(['aktif']));

    	return redirect('/news')->with('status', 'Berhasil mengubah status news!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WriterController extends Controller
{
    public function dashboard(){
        $acceptedArticles = Article::where('user_id', Auth::user()->id)->where('is_accepted',true)->orderBy('created_at', 'desc')->get();
        $rejectedArticles = Article::where('user_id', Auth::user()->id)->where('is_accepted',false)->orderBy('created_at', 'desc')->get();
        $unrevisonedArticles = Article::where('user_id', Auth::user()->id)->where('is_accepted',NULL)->orderBy('created_at', 'desc')->get();

    return view('writer.dashboard', compact('rejectedArticles','acceptedArticles','unrevisonedArticles'));
    //
    }
    public function edit(Article $article){
        if(Auth::user()->id == $article->user_id){
            return view('article.edit', compact('articles'));
    }
    return redirect()->route('welcome')->with('alert','Non puo entrare ');
    }
}

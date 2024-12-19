<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashoboard(){
        $unrevisionedArticles = Article::where('is_accepted', NULL)->get();
        $acceptedArticles = Article::where('is_accepted', true)->get();
        $rejectedArticles = Article::where('is_accepted', false)->get();
        
        return view("revisor.dashboard", compact('unrevisionedArticles','acceptedArticles', 'rejectedArticles'));
    }
    public function acceptArticle(article $article){
        $article->is_accepted = true;
        $article->save();
        return redirect(route('revsor.dashboard'))->with('message','articolo publciato');

    }
    public function rejectArticle(article $article){
        $article->is_accepted = false;
        $article->save();
        return redirect(route('revsor.dashboard'))->with('message','articolo rifiutato');
    //
}
public function undoArticle(article $article){
    $article->is_accepted = NULL;
    $article->save();
    return redirect(route('revsor.dashboard'))->with('message','articolo rimandato in revisione');
}
}
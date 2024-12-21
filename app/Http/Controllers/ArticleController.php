<?php


namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; 
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;


class ArticleController extends Controller
{
    public static function middleware()

    {

        return[ new Middleware('auth',except:['index','show']),];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articles = Article::where('is_accepted', true)->orderBy('created_at','desc')->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'title'=>'required|unique:articles|min:5',
            'subtitle'=>'required|min:5',
            'body'=>'required|min:30',
            'image'=>'required|image',
            'category'=>'required',
        ]);


        $article = Article::create([

            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'body'=>$request->body,
            'image' => $request->file('image')->store('images', 'public'),
            'category_id'=>$request->category,
            'user_id' => Auth::user()->id,


        ]);
        return redirect(route('welcome'))->with('message', 'articolo crato con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
        return view('article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.by-category', compact('category', 'articles'));
    }
    public function byRedactor(User $user)
    {
        $redactors = $user->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.by-redactor', compact('user', 'articles'));
    }
}

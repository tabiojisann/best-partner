<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\User;
use Storage;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at');
        $user     = Auth::user();
        return view('articles.index', ['articles' => $articles, 'user' => $user]);
    }

    public function create(User $user) 
    {
        $user = Auth::user();
        return view('articles.create', ['user' => $user]);
    }

    public function store(ArticleRequest $request, Article $article)
    {

        $article->fill($request->all());

        $image = $request->file('image');

        if(isset($image)){
            $fileName = ($image)->getClientOriginalName();
            $path = Storage::disk('s3')->putFileAs('articles', $image, $fileName, 'public');
            $article->image = Storage::disk('s3')->url($path);
        }
     
        $article->user_id = $request->user()->id; 

        $article->save();  

        return redirect()->route('articles.index');
    }

    public function edit(Article $article, User $user)
    {  
        
        $user = Auth::user();

        return view('articles.edit', ['article' => $article, 'user' => $user]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        
        $article->fill($request->all());

        $image = $request->file('image');

        if(isset($image)){
            $fileName = ($image)->getClientOriginalName();
            $path = Storage::disk('s3')->putFileAs('articles', $image, $fileName, 'public');
            $article->image = Storage::disk('s3')->url($path);
        }
     
        $article->save();
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
     
        $article->delete();

        return redirect()->route('articles.index');
    }

    public function show(Article $article, User $user)
    {
        $user     = Auth::user();
        return view('articles.show', ['article' => $article, 'user' => $user]);
    }
}



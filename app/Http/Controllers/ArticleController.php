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
        $user     = Auth::user();
        $articles = Article::all()->sortByDesc('created_at')
                    ->load('user');
        
        return view('articles.index', ['articles' => $articles, 'user' => $user]);
    }

    public function search(Request $request)
    {
        $user     = Auth::user();

        $keyword     = $request->input('keyword');
        $style       = $request->input('style');
        $position    = $request->input('position');

        $query = Article::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }

        if($style === '1') {
            $query->where('style', '漫才');
        } 
        if($style === '2') {
            $query->where('style', 'コント');
        } 
        if($style === '3') {
            $query->where('style', 'その他');
        } 
        if($position === '1') {
            $query->where('position', 'ボケ');
        } 
        if($position === '2') {
            $query->where('position', 'ツッコミ');
        } 
        if($position === '3') {
            $query->where('position', 'その他');
        } 

        $articles = $query->get()
                    ->load('user');

        return view('articles.search', [
            'articles' => $articles, 
            'user' => $user,
            'keyword' => $keyword,
            'style'  => $style,
            'position' => $position,
        ]);
    }

    public function create() 
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

        $request->session()->put('articles.create', $article);

        return redirect()->action('ArticleController@confirm');
        // return redirect()->route('articles.confirm', ['article' => $article]);
        // return view('articles.confirm', ['article' => $article]);
    }

    public function confirm(Request $request, Article $article)
    {
        $article = $request->session()->get("articles.create");
		
		//セッションに値が無い時はフォームに戻る
		if(!$article){
			return redirect()->action("ArticleController@create");
		}
		return view("articles.confirm",['article' => $article]);
    }

    public function send(Request $request, Article $article)
    {
       
        $article = $request->session()->get("articles.create");

        if(!$article){
            return redirect()->action("ArticleController@create");
        }
        
        $article->save();

        $request->session()->forget("article.create");

        return redirect()->route('articles.index', ['article' => $article]);
    }



    public function edit(Article $article)
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
     
        $request->session()->put('articles.create', $article);

        return redirect()->action('ArticleController@confirm');

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



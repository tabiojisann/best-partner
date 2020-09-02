<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\User;
use Carbon\Carbon;
use Storage;
use App\Http\Requests\ArticleRequest;
use Intervention\Image\Facades\Image;



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
        return view('articles.create');
    }

    public function store(ArticleRequest $request, Article $article)
    {

        $article->fill($request->all());
   

        $imagefile = $request->file('image');  

        if(isset($imagefile)){
            $now = date_format(Carbon::now(), 'YmdHis');
            $fileName = ($imagefile)->getClientOriginalName();
            $extension =($imagefile)->getClientOriginalExtension();
            $storePath="articles/".$now."_".$fileName;

            $image = Image::make($imagefile);
            $image->resize(300,300);


            Storage::disk('s3')->put($storePath, (string)$image->encode(), 'public');

            $article->image = Storage::disk('s3')->url($storePath);
        };

        
     
        $article->user_id = $request->user()->id; 

        $request->session()->put('articles.create', $article);

        return redirect()->action('ArticleController@confirm');

    }

    public function confirm(Request $request, Article $article)
    {
        $article = $request->session()->get("articles.create");

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
        return view('articles.edit', ['article' => $article]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        
        $article->fill($request->all());

        $imagefile = $request->file('image'); 

        if(isset($imagefile)){
            $now = date_format(Carbon::now(), 'YmdHis');
            $fileName = ($imagefile)->getClientOriginalName();
            $extension =($imagefile)->getClientOriginalExtension();
            $storePath="articles/".$now."_".$fileName;

            $image = Image::make($imagefile);
            $image->resize(300,300);


            Storage::disk('s3')->put($storePath, (string)$image->encode(), 'public');

            $article->image = Storage::disk('s3')->url($storePath);
        };

     
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

    public function keep(Request $request, Article $article )
    {
        $user = Auth::user();

        if($article->user->id === $user->id) {
            return abort('404', 'Cannot keep yourself.');
        }

        $article->keeps()->detach($request->user()->id);
        $article->keeps()->attach($request->user()->id);

        return [
            'id' => $article->id,
            'countKeeps' => $article->count_keeps,
        ];
    }

    public function unkeep(Request $request, Article $article)
    {
        $article->keeps()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countKeeps' => $article->count_keeps,
        ];
    }
}



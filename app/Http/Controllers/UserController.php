<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Article;
use Carbon\Carbon;
use Storage;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(Request $request, User $user)
    {
        $user = Auth::user();

        $keyword_back   = $request->input('keyword_back');
        $keyword_birth  = $request->input('keyword_birth');
        $sex            = $request->input('sex');
        $age_upper      = $request->input('age_upper');
        $age_lower      = $request->input('age_lower');
        $height         = $request->input('height');
        $weight         = $request->input('weight');
        $background     = $request->input('background');
       
      

        $query = User::query();
        
    
        if(!empty($keyword_back)) {
            $query->where('background', 'LIKE', "%{$keyword_back}%");
        }
        if(!empty($keyword_birth)) {
            $query->where('birthplace', 'LIKE', "%{$keyword_birth}%");
        }

        if(!empty($age_lower)) {
            $query->where('age', '>=', $age_lower)->get();
        }
        if(!empty($age_upper)) {
            $query->where('age', '<=', $age_upper)->get();
        }

        if($sex === '1') {
            $query->where('sex', '男性');
        } 
        if($sex === '2') {
            $query->where('sex', '女性');
        } 

        $users = $query->get();

        return view('users.search', [
            'users'         => $users,
            'user'          => $user,
            'keyword_back'  => $keyword_back,
            'keyword_birth' => $keyword_birth,
            'sex'           => $sex,
            'age_lower'     => $age_lower,
            'age_upper'     => $age_upper,
        ]);
    }

    public function show(User $user)
    {

        return view('users.show', [
            'user' => $user,
        ]);
    }

     public function edit(User $user)
     {
        return view('users.edit', [
            'user' => $user,
        ]);
     }

     public function update(UserRequest $request, User $user)
     {

        $user->fill($request->all());  

        $image = $request->file('image');
     
        if(isset($image)){
            $fileName = ($image)->getClientOriginalName();
            $path = Storage::disk('s3')->putFileAs('users', $image, $fileName, 'public');
            $user->image = Storage::disk('s3')->url($path);
        }

        $date = Carbon::parse($user->birthday);
        $age  = $date->age;

        $user->age = $age;

        $user->save();

         return view('users.show', ['user' => $user, 'age' => $age]);
     }

     public function follow(Request $request, User $user)
     {
        
        $user->follows()->detach($request->user()->id);
        $user->follows()->attach($request->user()->id);

        return[
            'id' => $user->id,
        ];
   
     }

     public function unfollow(Request $request, User $user)
     {
        
        $user->follows()->detach($request->user()->id);
        
        return[
            'id' => $user->id,
        ];
     }

     public function keepIndex(User $user)
     {
         $articles = $user->keeps->sortByDesc('created_at');

         return view('users.keeps', [
            'user' => $user,
            'articles' => $articles,
         ]);
     }

     public function myArticle(User $user)
     {
         $articles = $user->articles->sortByDesc('created_at');

         return view('users.myArticles', [
            'user' => $user,
            'articles' => $articles,
         ]);
     }
}

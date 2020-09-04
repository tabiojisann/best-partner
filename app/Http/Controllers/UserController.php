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
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

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

     public function profileEdit(User $user)
     {
        return view('users.profileEdit', [
            'user' => $user,
        ]);
     }

     public function profileUpdate(UserRequest $request, User $user)
     {
    
        $user->fill($request->all());  

        $date = Carbon::parse($user->birthday);
        $age  = $date->age;

        $user->age = $age;

        $user->save();

         return view('users.show', ['user' => $user, 'age' => $age]);
     }

     public function PRedit(User $user)
     {
        
        return view('users.PRedit', [
            'user' => $user,
        ]);
     }

     public function PRupdate(UserRequest $request, User $user)
     {
        
        $user->fill($request->only(['PR']));
        $user->save();
         
         return view('users.show', [
             'user' => $user,
         ]);
     }

     public function imageUpdate(UserRequest $request, User $user)
     { 

        $user->fill($request->only(['image', 'name']));

        $imagefile = $request->file('image'); 

        if(isset($imagefile)){
            $now = date_format(Carbon::now(), 'YmdHis');
            $fileName = ($imagefile)->getClientOriginalName();

            $storePath="articles/".$now."_".$fileName;

            $image = Image::make($imagefile);
            $image->resize(500,500);


            Storage::disk('s3')->put($storePath, (string)$image->encode(), 'public');

            $user->image = Storage::disk('s3')->url($storePath);
        };

        $info = getimagesize($user->image);
        $mime = $info["mime"];



        if($mime === "image/jpeg") {
            $user->save();
            return redirect()->route('users.show', [
                'user' => $user,
            ]);
        } 
        else {
            dd($user->name);
            Session::flash('abort', '正しいファイルタイプを指定ください');
            return redirect()->back();
        }
     
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

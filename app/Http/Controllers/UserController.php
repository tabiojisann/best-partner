<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;
use Storage;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function search(Request $request, User $user)
    {
        $user = Auth::user();

        $keyword_back      = $request->input('keyword_back');
        $keyword_birth      = $request->input('keyword_birth');
        $sex          = $request->input('sex');
        $age          = $request->input('age');
        $height       = $request->input('height');
        $weight       = $request->input('weight');
        $background   = $request->input('background');
       
      

        $query = User::query();
        
    
        if(!empty($keyword_back)) {
            $query->where('background', 'LIKE', "%{$keyword_back}%");
        }
        if(!empty($keyword_birth)) {
            $query->where('birthplace', 'LIKE', "%{$keyword_birth}%");
        }

        if(!empty($age)) {
            $query->where('age', $age)->get();
        }

        if($sex === '1') {
            $query->where('sex', '男性')->get();
        } 
        if($sex === '2') {
            $query->where('sex', '女性')->get();
        } 

        $users = $query->get();

        return view('users.search', [
            'users'   => $users,
            'user'    => $user,
            'keyword_back' => $keyword_back,
            'keyword_birth' => $keyword_birth,
            'sex'     => $sex,
            'age'     => $age
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
}

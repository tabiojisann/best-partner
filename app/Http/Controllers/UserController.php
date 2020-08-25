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

        $keyword      = $request->input('keyword');
        $sex          = $request->input('sex');
        $birthday     = $request->input('birthday');
        $height       = $request->input('height');
        $weight       = $request->input('weight');
        $background   = $request->input('background');
       
        
        $query = User::query();
        
        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        if($sex === '男性') {
            $query->where('sex', '男性')->get();
        } 
        if($sex === '女性') {
            $query->where('sex', '女性')->get();
        } 

        $users = $query->get();


        return view('users.search', [
            'users'   => $users,
            'user'    => $user,
            'keyword' => $keyword,
            'sex'     => $sex,
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

         $user->save();

         return view('users.show', ['user' => $user]);
     }
}

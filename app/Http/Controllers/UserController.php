<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Storage;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function index(User $user)
    {
        $users = User::all();
        $user = Auth::user();

        return view('users.index', [
            'users' => $users,
            'user' => $user,
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

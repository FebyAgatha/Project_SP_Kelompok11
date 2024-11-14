<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    //
    public function displayUser(){
        $user = Auth::user()->is_admin;
        $users = User::all();

        if($user){
            return view('displayUser', [
                'title' => 'Users Display',
                'users' => $users,
            ]);
        }
    }

    public function deleteUser(Request $request){
        $user = Auth::user()->is_admin;
        $request->validate(['id' => 'required|integer']);

        if($user){
            $user = User::findOrFail($request->id);
            $user->delete();
        }
        return redirect('/display-user');
    }
}

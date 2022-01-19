<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
{
    //
    public function index($user)
    {
        $user = User::findOrFail($user);
//        dd(User::find($user));
        return view('home',[
            'user'=> $user
        ]);

    }
}

<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\User;

class ProfileController extends Controller
{
    //
    public function index($user)
    {
        $user = User::findOrFail($user);
//        dd(User::find($user));

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('home',[
            'user'=> $user,
            'follows' => $follows
        ]);

    }

    public function edit(User $user){
        $this->authorize('update',$user->profile);
        return view('profile.edit',compact('user'));
    }

    public function update(User $user){
        $data = request()->validate([
            "title"=>"required",
            "description"=>"required",
            "url"=>"url",
            "image"=>"",
        ]);
        $this->authorize('update',$user->profile);
        // dd($data);

        // $user->profile->update($data);
       
        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
           $data = array_merge(
                $data,
                ['image'=> $imagePath]);
        }

        auth()->user()->profile()->update($data);
        return redirect("/profile/{$user->id}");
    }
}

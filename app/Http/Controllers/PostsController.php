<?php

namespace App\Http\Controllers;

class PostsController extends Controller
{

    //
    /**
     * PostsController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image'
        ]);
        $imagePath = request('image')->store('uploads', 'public');
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);
//        Post::create($data);
//        dd(request()->all());
        return redirect('/profile/'.auth()->user()->id);
    }
}

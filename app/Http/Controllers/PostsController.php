<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;


use Illuminate\Contracts\Auth\Guard;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth') ;
    }

    public function index() {
        $posts = Post::all() ;
        return view('post.index' , compact('posts')) ;
    }

    public function create() {
        $post = new Post() ;
        return view('post.create' , compact('post')) ;
    }

    public function show($id){
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    public function store(Request $request , Guard $auth){
        $data = $request->only($request->only('name', 'image', 'users_id', 'masterclass_id' ,'content'));
        $data['user_id'] = $auth->user()->id;
        $post = Post::create($data);
        return redirect(action('PostsController@show', $post))->with('success', "L'image a bien été créée");
    }


    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }

    public function update($id, Request $request){
        $post = Post::findOrFail($id) ;
        $post->update($request->only('name', 'image', 'users_id', 'masterclass_id' ,'content'));
        return redirect(action('PostsController@show', $post))->with('success', "L'image a bien été sauvegardée");
    }

    public function destroy($post)
    {
        $post->delete();
        return redirect(action('PostsController@index'))->with('success', 'La photo a bien été supprimée');
    }

}

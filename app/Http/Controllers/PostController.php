<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function post(Request $request){
        $data=$request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        $data['user_id']=auth()->id();
        Post::create($data);
        return redirect('/profile');
    }
    public function updatePost($id){
      $posts=Post::find($id);
      $data=compact('posts');
      return view('update')->with($data);
    }
    public function update(Request $request,$id){
        $post= Post::find($id);
        $post->title=$request['title'];
        $post->description=$request['description'];
        $post->save();
        return redirect('/profile');
    }
    public function deletePost($id){
        $post= Post::find($id)->delete();
        return redirect()->back();
    }
}

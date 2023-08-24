<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function view(Request $request){
        $search=$request['search'] ?? "";
        if($search != ""){
            $posts = Post::where('title', 'LIKE', '%' . $search . '%')->get(); 
        }
        else{
            $posts = Post::with('author')->get();
        }
        return view('home',['posts'=> $posts]);
    }

    public function register(){
        return view('register');
    }
    public function profile(){
        $posts=Post::where('user_id',auth()->id())->get();
        return view('userProfile',['posts'=> $posts]);
    }
    public function logout(){
        Auth()->logout();
        return redirect('/');
    }
    public function login(){
        return view('login');
    }
    public function tryLogin(Request $request){
        $data=$request->validate([
            'email'=>['required','email'],
            'password'=>['required','min:6']
        ]);
        if (auth()->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $request->session()->regenerate();
            return redirect('/profile');
        }
        
    }
    public function registration(Request $request){
        $data=$request->validate([
            'name'=>'required',
            'email'=>['required','email'],
            'password'=>['required','min:6']
        ]);
        $data['password']=bcrypt($data['password']);
        $user= User::create($data);
        Auth()->login($user);
        return redirect('/profile');
    }
}

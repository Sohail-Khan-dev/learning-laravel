<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function CreateUser(Request $request){
        User::create([
            'name' => $request->name ,
            'email'=> $request->email,
            'role' => $request->role,
            'password' => $request->password,
        ]);
        return redirect('/');
    }
    
    public function register(){
        return view('auth.register');
    }

    public function login(){
           validator(request()->all(),[
            'email'=> ['required','email'],
            'password' => ['required']
           ])
           ->validate();
           if(auth()->attempt(request()->only(['email','password']))){
            return redirect('/tasks');
           }
           return redirect()->back()->withErrors(['email'=>'Invalid Credentials']);
    }
    public function showLoginForm(){
        return view('auth.login');
    }

    public function logout(){
        auth()->logout();
        return redirect('/tasks');
    }
}

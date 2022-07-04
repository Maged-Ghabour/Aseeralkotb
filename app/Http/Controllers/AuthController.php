<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function register(){
        return view ("auth.register");
    }
    public function handleRegister(Request $request ){
        $request->validate([
            "name"  => "required|string|max:100",
            "userName" =>"required|string|unique:users,userName",
            "email" => "required||email|max:100|unique:users,email,",
            "password"  => "required_with:password_confirmation|same:password_confirmation|string|min:6|max:50",
            "password_confirmation" =>"min:6",
        ]);

       $user =  User::create([
            "name" => $request->name,
            "userName" =>$request->userName,
            "password_confirmation"=>Hash::make($request->password_confirmation),
            "email" => $request->email,
            "password" => Hash::make($request ->pass)
        ]);

        Auth::login($user);

        // Send Email
        // Mail::to($user->email)->send(new RegisterMail);

        return redirect(route("books.index"));
    }


    public function login(){
        return view("auth.login");
    }

    public function handleLogin(Request $request){
        $request->validate([
            "email" => "required|email|max:100",
            "password"  => "required|string|min:6|max:50"
        ]);

       $is_login =  Auth::attempt([
            "email" => $request->email,
            "password"  => $request->pass
        ]);

        if(!$is_login){
            return back();
        }

        return redirect(route("books.index"));


    }

    public function logout(){
        Auth::logout();
        return back();
    }



}

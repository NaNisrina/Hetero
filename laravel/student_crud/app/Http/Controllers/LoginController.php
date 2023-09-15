<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function log()
    {
        return view('login',[
            "title" => "Login"
        ]);
    }

    public function lor(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password', 'tier')))
        {
            if(Auth::user()->tier == 'admin'){
                return redirect ('/admin');
            } //else
                return redirect ('/user');
        } // if failed
            return redirect('/login')->with('failed', 'Data Not-Found');
    }

    public function reg()
    {
        return view('register',[
            "title" => "Register"
        ]);
    }

    public function ger(Request $request)
    {
        // @dd($request->all());
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt ($request->password),
            "remember_token" => Str::random(60)
        ]);

        return redirect('/login');
    }

    public function out()
    {
        Auth::logout();
        return redirect('login');
    }
}

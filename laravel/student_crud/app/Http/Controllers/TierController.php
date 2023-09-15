<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TierController extends Controller
{
    public function admin()
    {
        return view('admin', [
            "title" => "Admin"
        ]);
    }

    public function mod()
    {
        return view('mod', [
            "title" => "Mod"
        ]);
    }

    public function user()
    {
        return view('user', [
            "title" => "User"
        ]);
    }
}

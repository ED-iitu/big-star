<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class UserController
{
    public function profile()
    {
        if (!Auth::user()) {
            return redirect()->route('home');
        }

        return view('profile.index');
    }
}

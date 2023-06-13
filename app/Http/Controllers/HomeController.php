<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Pocket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use TCG\Voyager\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!Session::has('currency')) {
            Session::put('currency', 'KZT');
        }

        $packages     = Pocket::all();
        $news         = Post::all();
        $currencyData = Currency::converter();

        return view('welcome', compact('packages', 'news', 'currencyData'));
    }

    public function getNewsById(int $id)
    {
        $news = Post::where('id', $id)->first();

        return view('news', compact('news'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Pocket;
use Illuminate\Http\Request;
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
        $packages = Pocket::all();
        $news     = Post::all();

        return view('welcome', compact('packages', 'news'));
    }

    public function getNewsById(int $id)
    {
        $news = Post::where('id', $id)->first();

        return view('news', compact('news'));
    }
}

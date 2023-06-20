<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Pocket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
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
    public function index(Request $request)
    {
        if (!Session::has('currency') || !Session::has('locale')) {
            $ip = $request->getClientIp();

            $response = Http::get('http://ip-api.com/json/'.$ip)->json();

            if (isset($response['countryCode']) && $response['countryCode'] == 'TR') {
                Session::put('currency', 'TRY');
                Session::put('locale', 'tr');
                App::setLocale('tr');
            }

            if (isset($response['countryCode']) && $response['countryCode'] == 'RU') {
                Session::put('currency', 'RUB');
                Session::put('locale', 'ru');
                App::setLocale('ru');
            }

            if (isset($response['countryCode']) && !in_array($response['countryCode'], ['RU', 'KZ'])) {
                Session::put('currency', 'USD');
                Session::put('locale', 'en');
                App::setLocale('en');
            }

            if (!Session::has('currency')) {
                Session::put('currency', 'KZT');
            }
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

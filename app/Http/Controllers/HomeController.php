<?php

namespace App\Http\Controllers;

use App\Enums\EMessageStatusReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.home.index');
    }

    public function localeChange($locale) {
        $language = 'vi';
        if ($locale === 'en') {
            $language = 'en';
        }
        session()->put('my_locale', $language);
        return redirect()->back();
    }
}

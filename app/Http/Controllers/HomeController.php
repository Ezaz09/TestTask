<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HistoryOfLogin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function listOfLogins()
    {
        $historyOfLogin = HistoryOfLogin::get();
        return view('list_of_logins', compact('historyOfLogin'));
    }
}

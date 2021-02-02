<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\User;

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
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalUsers = User::count();
        return view('board.dashboard', compact('totalUsers'));
    }

    public function home()
    {
        return redirect(route('dashboard'));
    }

}

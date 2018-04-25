<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * $user = auth()->user();
    return view('home')->with('user', $user);
    and then, in dashboard.blade.php, just use $user->posts to access posts
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('Dashboard')->with('posts', $user->posts);
    }
}

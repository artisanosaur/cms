<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $postsCount = Post::count();
        $usersCount = User::count();



        return view('home.home', [
            'postsCount' => $postsCount,
            'usersCount' => $usersCount
        ]);
    }
}

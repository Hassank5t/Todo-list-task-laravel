<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

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
        $todoactive = Todo::where('Status','active')->get();
        $todopending = Todo::where('Status','pending')->get();
        $todoexpired = Todo::where('Status','expired')->get();
        $tododone = Todo::where('Status','done')->get();
        return view('home',compact('todoactive','todopending','todoexpired','tododone'));
    }
}

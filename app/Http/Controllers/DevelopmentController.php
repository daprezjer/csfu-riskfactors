<?php

namespace App\Http\Controllers;

use App\Demographic;
use App\ModelIndicator;
use App\Forecast;
use App\Helpers;
use Illuminate\Support\Facades\DB;

class DevelopmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('development', ['page' => 'development']);
    }
}

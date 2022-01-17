<?php

namespace App\Http\Controllers;

use App\Articles;
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
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->items = Articles::all();
        //dd($this->items);
        return view('welcome',[
            "items" => $this->items
        ]);
    }


}

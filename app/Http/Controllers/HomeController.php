<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
        $from = date('Y-m-d');
        $to = date('Y-m-d',strtotime('+15 day',strtotime($from)));

        $filters=['from' => $from , 'to' => $to];
        $events = Event::filter($filters)->get();

        return view('home',compact('events'));
    }
}

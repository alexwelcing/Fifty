<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    var $active = 'dashboard';
    var $title = 'Dashboard';
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('admin.dashboard.index');
        $active = $this->active;
        $title = $this->title;
        return view('admin.dashboard.index', compact('active', 'title'));
    }
}

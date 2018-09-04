<?php

namespace App\Http\Controllers\Admin;

use App\Models\States;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StatesRequest;

class StatesController extends Controller
{
    var $active = 'states';
    var $title = 'States';
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
     * Show the application states.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$states = States::all();
        $active = $this->active;
        $title = $this->title;
        return view('admin.states.index', compact('states', 'active', 'title'));
    }


	/**
	* Show the form for creating a new create.
	*
	* @return \Illuminate\Http\Response
	*/
    public function create()
    {
    	$active = $this->active;
		$title = $this->title;
        return view('admin.states.create', compact('active', 'title'));
    }

	
	/**
	* Store a newly created resource in storage.
	*
	* @param StatesRequest $request
	* @return void
	*/
    public function store(StatesRequest $request)
    {
        $state = States::create($request->all());
        alert()->success("Success", "State {$state->name} created!");
        return redirect()->route('states.index');
    }
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\States $state
	* @return \Illuminate\Http\Response
	*/
    public function edit(States $state)
    {
    	$active = $this->active;
		$title = $this->title;
        return view('admin.states.edit', compact('state', 'active', 'title'));
    }
	
	/**
	* Update the specified resource in storage.
	*
	* @param StatesRequest $request
	* @param  \App\Models\States $state
	* @return \Illuminate\Http\Response
	*/
    public function update(StatesRequest $request, States $state)
    {
        $state->update($request->all());
        alert()->warning("Success", "State {$state->name} updated!");
        return redirect()->route('states.index');
    }	

	/**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\States $state
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
    public function destroy(Request $request, States $state)
    {
		
    	alert()->error("Deleted", "State {$state->name} deleted!");
        $state->delete();
        return redirect()->route('states.index');
    }



}
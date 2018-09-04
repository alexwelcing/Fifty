<?php

namespace App\Http\Controllers\Admin;

use App\Models\Datas;
use App\Models\States;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DatasRequest;

class DatasController extends Controller
{
    var $active = 'datas';
    var $title = 'States Data';
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
     * Show the application datas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$datas = Datas::all();
        $active = $this->active;
        $title = $this->title;
        return view('admin.datas.index', compact('datas', 'active', 'title'));
    }


	/**
	* Show the form for creating a new create.
	*
	* @return \Illuminate\Http\Response
	*/
    public function create()
    {
        $states = States::where('active', '1')->pluck('name', 'id');
    	$active = $this->active;
		$title = $this->title;
        return view('admin.datas.create', compact('states', 'active', 'title'));
    }

	
	/**
	* Store a newly created resource in storage.
	*
	* @param DatasRequest $request
	* @return void
	*/
    public function store(DatasRequest $request)
    {
        $data = Datas::create($request->all());
        alert()->success("Success", "Data {$data->name} created!");
        return redirect()->route('datas.index');
    }
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Datas $data
	* @return \Illuminate\Http\Response
	*/
    public function edit(Datas $data)
    {
        $states = States::where('active', '1')->pluck('name', 'id');
    	$active = $this->active;
		$title = $this->title;
        return view('admin.datas.edit', compact('data', 'states', 'active', 'title'));
    }
	
	/**
	* Update the specified resource in storage.
	*
	* @param DatasRequest $request
	* @param  \App\Models\Datas $data
	* @return \Illuminate\Http\Response
	*/
    public function update(DatasRequest $request, Datas $data)
    {
        
        $data->update($request->all());
        alert()->warning("Success", "Data {$data->name} updated!");
        return redirect()->route('datas.index');
    }	


    /**
    * Show the form for show the specified resource.
    *
    * @param  \App\Models\Datas $data
    * @return \Illuminate\Http\Response
    */
    public function show(Datas $data)
    {
        $active = $this->active;
        $title = $this->title;
        return view('admin.datas.show', compact('data', 'active', 'title'));
    }
    

	/**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Datas $data
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
    public function destroy(Request $request, Datas $data)
    {
    	alert()->error("Deleted", "Data {$data->name} deleted!");
        $data->delete();
        return redirect()->route('datas.index');
    }


}

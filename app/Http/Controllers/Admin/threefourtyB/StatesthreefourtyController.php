<?php

namespace App\Http\Controllers\Admin\threefourtyB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\threefourtyB\Statesthreefourty;
use App\Models\States;
use App\Http\Requests\Admin\StatesthreefourtyRequest;
class StatesthreefourtyController extends Controller
{
    var $active='statesthreefourty';
	var $title = '340 B States';
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
	
	public function index(){
		$statesthreefourty = statesthreefourty::all();

		$active = $this->active;
		$title = $this->title;
		
		return view('admin.statesthreefourty.index',compact('statesthreefourty','active','title'));
	}
	/**
	* Show the form for creating a new create.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create(){
		$states = States::where('active','1')->pluck('name','id');
		$active = $this->active;
		$title = $this->title;
		
		return view('admin.statesthreefourty.create',compact('states','active','title'));
	}
	/**
	* Store a newly created resource in storage.
	*
	* @param DatasRequest $request
	* @return void
	*/
	public function store(StatesthreefourtyRequest $request){
		$create = new Statesthreefourty;
		$create->user_id = auth()->user()->id;
		$create->title = $request->title;
		$create->description= $request->description;
		$create->states_id = $request->states_id;
		$create->active = $request->active;
		$create->save();
		alert()->success("Success", "340 B {$create->title} created!");
        return redirect()->route('statesthreefourty.index');
		
	}
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\DatasQuestions $Questions
	* @return \Illuminate\Http\Response
	*/
    public function edit(Statesthreefourty $statesthreefourty)
    {
        $states = States::where('active', '1')->pluck('name', 'id');
    	$active = $this->active;
		$title = $this->title;
        return view('admin.statesthreefourty.edit', compact('statesthreefourty', 'states', 'active', 'title'));
    }
	
	/**
	* Update the specified resource in storage.
	*
	* @param QuestionsRequest $request
	* @param  \App\Models\Questions $question
	* @return \Illuminate\Http\Response
	*/
    public function update(StatesthreefourtyRequest $request, Statesthreefourty $statesthreefourty)
    {
        $statesthreefourty->update($request->all());
        alert()->warning("Success", "Statesthreefourty {$statesthreefourty->title} updated!");
        return redirect()->route('statesthreefourty.index');
    }	


    /**
    * Show the form for show the specified resource.
    *
    * @param  \App\Models\Questions $question
    * @return \Illuminate\Http\Response
    */
    public function show(Statesthreefourty $statesthreefourty)
    {
        $active = $this->active;
        $title = $this->title;
        return view('admin.statesthreefourty.show', compact('statesthreefourty', 'active', 'title'));
    }
    

	/**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Datas $data
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
    public function destroy(Request $request, Statesthreefourty $statesthreefourty)
    {
    	alert()->error("Deleted", "Statesthreefourty {$statesthreefourty->title} deleted!");
        $question->delete();
        return redirect()->route('statesthreefourty.index');
    }

}

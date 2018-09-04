<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\States;
use App\Http\Requests\Admin\QuestionsRequest;
class QuestionController extends Controller
{
   var $active='questions';
	var $title = 'Questions';
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
		$questions = Questions::all();
		$active = $this->active;
		$title = $this->title;
		
		return view('admin.questions.index',compact('questions','active','title'));
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
		
		return view('admin.questions.create',compact('states','active','title'));
	}
	/**
	* Store a newly created resource in storage.
	*
	* @param DatasRequest $request
	* @return void
	*/
	public function store(QuestionsRequest $request){
		
		$create = new Questions;
		$create->user_id = auth()->user()->id;
		$create->question = $request->question;
		$create->active = $request->active;
		$create->save();
		alert()->success("Success", "Question {$create->question} created!");
        return redirect()->route('questions.index');
		
	}
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\DatasQuestions $Questions
	* @return \Illuminate\Http\Response
	*/
    public function edit(Questions $question)
    {
        $states = States::where('active', '1')->pluck('name', 'id');
    	$active = $this->active;
		$title = $this->title;
        return view('admin.questions.edit', compact('question', 'states', 'active', 'title'));
    }
	
	/**
	* Update the specified resource in storage.
	*
	* @param QuestionsRequest $request
	* @param  \App\Models\Questions $question
	* @return \Illuminate\Http\Response
	*/
    public function update(QuestionsRequest $request, Questions $question)
    {
        $question->update($request->all());
        alert()->warning("Success", "Question {$question->question} updated!");
        return redirect()->route('questions.index');
    }	


    /**
    * Show the form for show the specified resource.
    *
    * @param  \App\Models\Questions $question
    * @return \Illuminate\Http\Response
    */
    public function show(Questions $question)
    {
        $active = $this->active;
        $title = $this->title;
        return view('admin.questions.show', compact('question', 'active', 'title'));
    }
    

	/**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Datas $data
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
    public function destroy(Request $request, Questions $question)
    {
    	alert()->error("Deleted", "Question {$question->name} deleted!");
        $question->delete();
        return redirect()->route('questions.index');
    }

}

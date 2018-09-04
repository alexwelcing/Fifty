<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\threefourtyB\Sections;
use App\Models\threefourtyB\Statesthreefourty;
use App\Models\threefourtyB\Sectiondatas;
use App\Models\States;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
class UploadcsvController extends Controller
{
   var $active = 'uploadcsv';
    var $title = 'Uploadcsv';
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
        return view('admin.uploadcsv.create', compact('active', 'title'));
    }

	
	/**
	* Store a newly created resource in storage.
	*
	* @param StatesRequest $request
	* @return void
	*/
    public function store(Request $request)
    {
    	$rowData = array();
     $path = $request->file('csvfile')->getRealPath();
       $fileD = fopen($path,"r");
       
        $column=fgetcsv($fileD);
        while(!feof($fileD)){
         $rowData[]=fgetcsv($fileD);
        }
        
        foreach ($rowData as $key) {
        	if($key != ''){
        	$state = $key[0];
        	$states = States::where('name',$state)->first();
        	
        	$state_id = $states->id;
        	
        	$getstatethree = Statesthreefourty::where('states_id',$state_id)->first();
        	if(isset($getstatethree) && !empty($getstatethree)){
        		$up = DB::table('statesthreefourties')->where('states_id',$state_id)->update(array('title'=>$key[1],'description'=>$key[2]));

        		$check_section = Sections::where('title',$key[3])->first();
        		if(isset($check_section) && !empty($check_section)){
        			$sections_id = $check_section->id;
        		}else{

        			$section = new Sections;
        			$section->title = $key[3];
        			$section->description = $key[4];
        			$section->statesthree_id =  $getstatethree->id;
                    $section->active = 1;
        			$section->save();
        			$sections_id = $section->id;
        		}	

        		$check_question = Questions::where('question',$key[6])->first();
        		if(isset($check_question) && !empty($check_question)){
        			$questions_id = $check_question->id;



        		}else{
        			$create_question = new Questions;
					$create_question->user_id = auth()->user()->id;
					$create_question->question = $key[6];
					$create_question->active = 1;
					$create_question->states_id = $state_id;
					$create_question->save();
					$questions_id = $create_question->id;
        		}

        		if('Reimbursement Requirements'== $key[5]){

        			$sectiondata = new Sectiondatas;
        			$sectiondata->questions_id = $questions_id;
        			$sectiondata->sections_id = $sections_id;
        			$sectiondata->users_id = auth()->user()->id;
        			$sectiondata->table_select = 1;
        			$sectiondata->ingredient_cost= $key[7];
        			$sectiondata->dispensing_fee = $key[8];
        			$sectiondata->clarifying_detail=$key[9];
        			$sectiondata->source= $key[11];
        			$section->source_link= "dummy";
        			$sectiondata->active = 1;
        			$sectiondata->save();

        		}else{

        			$sectiondata = new Sectiondatas;
        			$sectiondata->questions_id = $questions_id;
        			$sectiondata->sections_id = $sections_id;
        			$sectiondata->users_id = auth()->user()->id;
        			$sectiondata->table_select = 2;
        			$section->source= $key[11];
        			$section->source_link= "dummy";
        			$section->clarifying_detail= $key[10];
        			$sectiondata->active = 1;
        			$sectiondata->save();
        		}

        		

        	}else{
        		$create = new Statesthreefourty;
        		$create->states_id = $state_id;
        		$create->user_id = auth()->user()->id;
        		$create->title = $key[1];
        		$create->description = $key[2];
        		$create->active = 1;
        		$create->save();

        		$statethrees_id = $create->id;

        		$check_section = Sections::where('title',$key[3])->first();
        		if(isset($check_section) && !empty($check_section)){
        			$sections_id = $check_section->id;
        		}else{

        			$section = new Sections;
        			$section->title = $key[3];
        			$section->description = $key[4];
        			$section->statesthree_id =  $statethrees_id;
        			$section->active= 1;
                    $section->save();
        			$sections_id = $section->id;
        		}	

        		$check_question = Questions::where('question',$key[6])->first();
        		if(isset($check_question) && !empty($check_question)){
        			$questions_id = $check_question->id;



        		}else{
        			$create_question = new Questions;
					$create_question->user_id = auth()->user()->id;
					$create_question->question = $key[6];
					$create_question->active = 1;
					$create_question->states_id = $state_id;
					$create_question->save();
					$questions_id = $create_question->id;
        		}

        		if('Reimbursement Requirements'== $key[5]){

        			$sectiondata = new Sectiondatas;
        			$sectiondata->questions_id = $questions_id;
        			$sectiondata->users_id = auth()->user()->id;
        			$sectiondata->table_select = 1;
        			$sectiondata->sections_id = $sections_id;
        			$sectiondata->ingredient_cost= $key[7];
        			$sectiondata->dispensing_fee = $key[8];
        			$sectiondata->clarifying_detail=$key[9];
        			$sectiondata->source= $key[11];
        			$section->source_link= "dummy";
        			$sectiondata->active = 1;
        			$sectiondata->save();

        		}else{

        			$sectiondata = new Sectiondatas;
        			$sectiondata->questions_id = $questions_id;
        			$sectiondata->users_id = auth()->user()->id;
        			$sectiondata->table_select = 1;
        			$sectiondata->sections_id = $sections_id;
        			$section->source= $key[11];
        			$section->source_link= "dummy";
        			$section->clarifying_detail= $key[10];
        			$sectiondata->active = 1;
        			$sectiondata->save();
        		}


        	}
        }

        }
        $image='340bdatacsv/'.auth()->user()->id . time() .'.csv';
        Storage::disk('local')->put($image, $fileD);
       alert()->success("Success", "CSV Uploaded");
        return redirect()->route('uploadcsv.create');
}
        
     
   
     //return redirect()->route('uploadcsv.index');
   
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

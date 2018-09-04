<?php

namespace App\Http\Controllers\Admin\threefourtyB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\threefourtyB\Sectiondatas;
use App\Models\threefourtyB\Statesthreefourty;
use App\Models\threefourtyB\Sections;
use App\Models\Questions;
use App\Http\Requests\Admin\SectiondatasRequest;
use DB;

class SectiondataController extends Controller
{
    var $active = 'statesthreefourty';
     var $title = "Section Data";
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
     * Show the application Statesthreefourty.
     *
     * @param  \App\Models\Sections $section
     * @return \Illuminate\Http\Response
     */
    public function index(Statesthreefourty $statesthreefourty,Sections $section)
    {
    	$sectiondata = Sectiondatas::where('sections_id', $section->id)->get();

        $active = $this->active;
        $title = $this->title;
        return view('admin.statesthreefourty.sectiondata.index', compact('sectiondata', 'statesthreefourty','section', 'active', 'title'));
    }


	/**
	* Show the form for creating a new create.
	*
	* @param  \App\Models\Datas $data
	* @return \Illuminate\Http\Response
	*/
    public function create(Statesthreefourty $statesthreefourty,Sections $section)
    {
        $questions = Questions::where('active','1')->pluck('question','id');
        $active = $this->active;
		$title = $this->title;
        return view('admin.statesthreefourty.sectiondata.create', compact('statesthreefourty','section','questions','active', 'title'));
    }

	
	/**
	* Store a newly created resource in storage.
	*
    * @param  \App\Models\Datas $data
	* @param FaqsRequest $request
	* @return void
	*/
    public function store(Request $request , Statesthreefourty $statesthreefourty,Sections $section)
    {

         $create = new Sectiondatas;
        $table_select = $request->table_select;
        if($table_select == 2){
            $create->sections_id = $request->sections_id;
            $create->users_id = $request->users_id;
            $create->questions_id = $request->questions_id;
            $create->clarifying_detail = $request->clarifying_detail;
            $create->source = $request->source;
            $create->source_link = $request->source_link;
            $create->table_select = $request->table_select;
            $create->active = $request->active;
            $create->save();
        }if($table_select == 1){
            $create->sections_id = $request->sections_id;
            $create->users_id = $request->users_id;
            $create->questions_id = $request->questions_id;
            $create->dispensing_fee = $request->dispensing_fee;
            $create->ingredient_cost = $request->ingredient_cost;
            $create->clarifying_detail = $request->clarifying_detail;
            $create->source = $request->source;
            $create->source_link = $request->source_link;
            $create->table_select = $request->table_select;
            $create->active = $request->active;
            $create->save();
        }
        alert()->success("Success", "Sectiondatas  created!");
        return redirect()->route('sectionsdata.index', [$statesthreefourty->id,$section->id]);
    }
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Datas $data
	* @param  \App\Models\Faqs $faqs
	* @return \Illuminate\Http\Response
	*/
    public function edit(Statesthreefourty $statesthreefourty, Sections $section, $id)
    {
        

        $sectiondata = Sectiondatas::where('id',$id)->first();
        $questions = Questions::where('active','1')->pluck('question','id');
        $active = $this->active;
		$title = $this->title;
        return view('admin.statesthreefourty.sectiondata.edit', compact('sectiondata', 'section','statesthreefourty','questions', 'active', 'title'));
    }
	
	/**
	* Update the specified resource in storage.
	*
	* @param Request $request
    * @param  \App\Models\Sections $section
	* @param  \App\Models\statesthreefourtys $statesthreefourty
	* @return \Illuminate\Http\Response
	*/
    public function update(Request $request, Statesthreefourty $statesthreefourty, Sections $section,$id)
    {
       
      
        
        $table_select = $request->table_select;
        if($table_select == 2){
        $up = Sectiondatas::where('id',$id)->update(array('sections_id'=>$request->sections_id,'users_id'=>$request->users_id,'questions_id'=>$request->questions_id,'clarifying_detail'=>$request->clarifying_detail,'source'=>$request->source,'source_link'=>$request->source_link,'table_select'=>$request->table_select,'active'=>$request->active));
           }
        if($table_select == 1){
            $up = Sectiondatas::where('id',$id)->update(array('sections_id'=>$request->sections_id,'users_id'=>$request->users_id,'questions_id'=>$request->questions_id,'clarifying_detail'=>$request->clarifying_detail,'source'=>$request->source,'source_link'=>$request->source_link,'table_select'=>$request->table_select,'active'=>$request->active,'dispensing_fee'=>$request->dispensing_fee,'ingredient_cost'=>$request->ingredient_cost));
        }

        alert()->warning("Success", "Sectiondatas  updated!");
        return redirect()->route('sectionsdata.index', [$statesthreefourty->id,$section->id]);
    }	

     /**
    * Show the form for show the specified resource.
    *
    * @param  \App\Models\Questions $question
    * @return \Illuminate\Http\Response
    */
    public function show(Statesthreefourty $statesthreefourty, Sections $section, $id)
    {
    
         $sectiondata = Sectiondatas::where('id',$id)->first();
        $active = $this->active;
        $title = $this->title;
        return view('admin.statesthreefourty.sectiondata.show', compact('sectiondata', 'statesthreefourty','section','active', 'title'));
    }
    

 	/**
	* Remove the specified resource from storage.
	*
	* @param Request $request
    * @param  \App\Models\Datas $data
	* @param  \App\Models\Faqs $faqs
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
    public function destroy(Request $request, Statesthreefourty $statesthreefourty, Sections $section,$id)
    {

    	alert()->error("Deleted", "Sectiondatas  deleted!");
         DB::delete('delete from sectiondatas where id = ?',[$id]);
        
        return redirect()->route('sectionsdata.index', [$statesthreefourty->id,$section->id]);
    }
}

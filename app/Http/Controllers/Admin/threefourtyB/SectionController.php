<?php

namespace App\Http\Controllers\Admin\threefourtyB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\threefourtyB\Statesthreefourty;
use App\Models\threefourtyB\Sections;
use App\Http\Requests\Admin\SectionsRequest;
class SectionController extends Controller
{
     var $active = 'statesthreefourty';
     var $title = "Section";
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
     * @param  \App\Models\Datas $data
     * @return \Illuminate\Http\Response
     */
    public function index(Statesthreefourty $statesthreefourty)
    {
    	$section = Sections::where('statesthree_id', $statesthreefourty->id)->get();
        $active = $this->active;
        $title = $this->title;
        return view('admin.statesthreefourty.section.index', compact('section', 'statesthreefourty', 'active', 'title'));
    }


	/**
	* Show the form for creating a new create.
	*
	* @param  \App\Models\Datas $data
	* @return \Illuminate\Http\Response
	*/
    public function create(Statesthreefourty $statesthreefourty)
    {
        $active = $this->active;
		$title = $this->title;
        return view('admin.statesthreefourty.section.create', compact('statesthreefourty',  'active', 'title'));
    }

	
	/**
	* Store a newly created resource in storage.
	*
    * @param  \App\Models\Datas $data
	* @param FaqsRequest $request
	* @return void
	*/
    public function store(SectionsRequest $request, Statesthreefourty $statesthreefourty)
    {
        $Sections = Sections::create($request->all());
        alert()->success("Success", "Sections {$Sections->title} created!");
        return redirect()->route('sections.index', $statesthreefourty->id);
    }
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Datas $data
	* @param  \App\Models\Faqs $faqs
	* @return \Illuminate\Http\Response
	*/
    public function edit(Statesthreefourty $statesthreefourty, Sections $section)
    {

        $active = $this->active;
		$title = $this->title;
        return view('admin.statesthreefourty.section.edit', compact('section', 'statesthreefourty', 'active', 'title'));
    }
	
	/**
	* Update the specified resource in storage.
	*
	* @param FaqsRequest $request
    * @param  \App\Models\Datas $data
	* @param  \App\Models\Faqs $faqs
	* @return \Illuminate\Http\Response
	*/
    public function update(SectionsRequest $request, Statesthreefourty $statesthreefourty, Sections $section)
    {

        $section->update($request->all());
        alert()->warning("Success", "Sections {$section->title} updated!");
        return redirect()->route('sections.index', $statesthreefourty->id);
    }	

     /**
    * Show the form for show the specified resource.
    *
    * @param  \App\Models\Questions $question
    * @return \Illuminate\Http\Response
    */
    public function show(Statesthreefourty $statesthreefourty, Sections $section)
    {
        //$section = Sections::where('id', $sections->id)->get();
       // print_r($section);
        //die();
        $active = $this->active;
        $title = $this->title;
        return view('admin.statesthreefourty.section.show', compact('section', 'statesthreefourty','active', 'title'));
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
    public function destroy(Request $request, Statesthreefourty $statesthreefourty, Sections $section)
    {

    	alert()->error("Deleted", "Sections {$section->title} deleted!");
        $section->delete();
        return redirect()->route('sections.index', $statesthreefourty->id);
    }

}

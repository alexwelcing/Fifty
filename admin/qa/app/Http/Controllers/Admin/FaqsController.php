<?php

namespace App\Http\Controllers\Admin;

use App\Models\Datas;
use App\Models\Faqs;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqsRequest;

class FaqsController extends Controller
{
    var $active = 'datas';
    var $title = "Categories FAQ's";
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
    public function index(Datas $data)
    {
    	$faqs = Faqs::where('datas_id', $data->id)->get();
        $active = $this->active;
        $title = $this->title;
        return view('admin.datas.faqs.index', compact('faqs', 'data', 'active', 'title'));
    }


	/**
	* Show the form for creating a new create.
	*
	* @param  \App\Models\Datas $data
	* @return \Illuminate\Http\Response
	*/
    public function create(Datas $data)
    {
        $categories = Categories::where('active', '1')->pluck('name', 'id');
    	$active = $this->active;
		$title = $this->title;
        return view('admin.datas.faqs.create', compact('data', 'categories', 'active', 'title'));
    }

	
	/**
	* Store a newly created resource in storage.
	*
    * @param  \App\Models\Datas $data
	* @param FaqsRequest $request
	* @return void
	*/
    public function store(FaqsRequest $request, Datas $data)
    {
        $faqs = Faqs::create($request->all());
        alert()->success("Success", "Faqs {$faqs->name} created!");
        return redirect()->route('faqs.index', $data->id);
    }
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Datas $data
	* @param  \App\Models\Faqs $faqs
	* @return \Illuminate\Http\Response
	*/
    public function edit(Datas $data, Faqs $faq)
    {
        
        $categories = Categories::where('active', '1')->pluck('name', 'id');
    	$active = $this->active;
		$title = $this->title;
        return view('admin.datas.faqs.edit', compact('faq', 'data', 'categories', 'active', 'title'));
    }
	
	/**
	* Update the specified resource in storage.
	*
	* @param FaqsRequest $request
    * @param  \App\Models\Datas $data
	* @param  \App\Models\Faqs $faqs
	* @return \Illuminate\Http\Response
	*/
    public function update(FaqsRequest $request, Datas $data, Faqs $faqs)
    {
        $faqs->update($request->all());
        alert()->warning("Success", "Faqs {$faqs->name} updated!");
        return redirect()->route('faqs.index', $data->id);
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
    public function destroy(Request $request, Datas $data, Faqs $faq)
    {
    	alert()->error("Deleted", "Faqs {$faq->name} deleted!");
        $faq->delete();
        return redirect()->route('faqs.index', $data->id);
    }

}

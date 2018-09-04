<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriesRequest;

class CategoriesController extends Controller
{
    var $active = 'categories';
    var $title = 'Categories';
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
     * Show the application categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$categories = Categories::all();
        $active = $this->active;
        $title = $this->title;
        return view('admin.categories.index', compact('categories', 'active', 'title'));
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
        return view('admin.categories.create', compact('active', 'title'));
    }

	
	/**
	* Store a newly created resource in storage.
	*
	* @param CategoriesRequest $request
	* @return void
	*/
    public function store(CategoriesRequest $request)
    {
        $categorie = Categories::create($request->all());
        alert()->success("Success", "Categorie {$categorie->name} created!");
        return redirect()->route('categories.index');
    }
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Categories $categorie
	* @return \Illuminate\Http\Response
	*/
    public function edit(Categories $category)
    {
        
    	$active = $this->active;
		$title = $this->title;
        return view('admin.categories.edit', compact('category', 'active', 'title'));
    }
	
	/**
	* Update the specified resource in storage.
	*
	* @param CategoriesRequest $request
	* @param  \App\Models\Categories $categorie
	* @return \Illuminate\Http\Response
	*/
    public function update(CategoriesRequest $request, Categories $category)
    {
        $category->update($request->all());
        alert()->warning("Success", "Category {$category->name} updated!");
        return redirect()->route('categories.index');
    }	

	/**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Categories $categorie
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
    public function destroy(Request $request, Categories $category)
    {
		
    	alert()->error("Deleted", "Category {$category->name} deleted!");
        $category->delete();
        return redirect()->route('categories.index');
    }



}
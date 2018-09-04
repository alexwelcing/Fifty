<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mapdatas;
class MapdatasController extends Controller
{
   var $active = "maps";
   var $title = "Maps data";

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(){

    
    }
    /**
     * Show the application datas.
     *
     * @param  \App\Models\Datas $data
     * @return \Illuminate\Http\Response
     */

    public function index(){
    	$mapdatas = Mapdatas::all();
    	$active = $this->active;
    	$title = $this->title;

    	return view('admin.mapdatas.index',compact('mapdatas','active','title'));

    }

    public function edit($id){
    	$mapdata = Mapdatas::where('id',$id)->first();
    	$active = $this->active;
    	$title = $this->title;

    	return view('admin.mapdatas.edit',compact('mapdata','active','title'));

    }

    public function update(Request $request,$id){
    	
    	$color = $request->color;
    	$hovercolor = $request->hoverColor;
    	$active = $request->active;
    	$up = Mapdatas::where('id',$id)->update(array('color'=>$color,'hoverColor'=>$hovercolor,'active'=>$active));
    	alert()->warning("Success", "State Color  updated!");
        return redirect()->route('maps.index');
    }

}

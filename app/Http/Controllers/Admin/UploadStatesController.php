<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Datas;
use App\Models\Faqs;
use App\Models\States;
use DB;
use Illuminate\Support\Facades\Storage;
class UploadStatesController extends Controller
{
     var $active = 'uploadstatecsv';
    var $title = 'Upload115statescsv';
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
        return view('admin.uploadstatecsv.create', compact('active', 'title'));
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
        $newss = $fileD;
       
        $column=fgetcsv($fileD);
        while(!feof($fileD)){
        	//$row = fgetcsv($fileD);
        	// $row = array_map( "convert", $row );
        $rowData[]=fgetcsv($fileD);
        }
       
       
        foreach ($rowData as $key) {
        	if($key != ''){

        	$state = $key[0];
        	$states = States::where('name',$state)->first();
        	
        	$state_id = $states->id;
        	
        	$getdata = datas::where('states_id',$state_id)->first();
        	if(isset($getdata) && !empty($getdata)){
        		$up = DB::table('datas')->where('states_id',$state_id)->update(array('title'=>$key[1],'first_heading'=>$key[2],'second_heading'=>$key[3]));

        		
        		$check_category = Categories::where('name',$key[4])->first();
        		if(isset($check_category) && !empty($check_category)){
        			$cat_id = $check_category->id;



        		}else{
        			$create_category = new Categories;
					$create_category->name = $key[4];
					$create_category->active = '1';
					$create_category->save();
					$cat_id = $create_category->id;
        		}

        		 $create_faq = new Faqs;
        		 $description = $key[5];
                 $description2 = $key[6];
                 $description = str_replace("�",".", $description);
                 $description2 = str_replace("�",".", $description2);
        		 $create_faq->datas_id= $getdata->id;
        		 $create_faq->categories_id=$cat_id;
        		$create_faq->description= $description;
        		 $create_faq->description2 = $description2;
        		 $create_faq->save(); 
        		

        	}else{
        		if(!empty($key[2] && !empty($key[3]))){
        			$two = 2;
        		}else{
        			$two = 1;
        		}

        		$create_data = new datas;
        		$create_data->states_id = $state_id;
        		$create_data->title = $key[1];
        		$create_data->first_heading = $key[2];
        		$create_data->second_heading = $key[3];
        		$create_data->active = '1';
        		$create_data->table_rows = $two;
        		$create_data->save();

        		$check_category = Categories::where('name',$key[4])->first();
        		if(isset($check_category) && !empty($check_category)){
        			$cat_id = $check_category->id;



        		}else{
        			$create_category = new Categories;
					$create_category->name = $key[4];
					$create_category->active = '1';
					$create_category->save();
					$cat_id = $create_category->id;
        		}

        		 $create_faq = new Faqs;
                 $description = $key[5];
                 $description2 = $key[6];
                 $description = str_replace("�",".", $description);
                 $description2 = str_replace("�",".", $description2);
        		 $create_faq->datas_id= $create_data->id;
        		 $create_faq->categories_id=$cat_id;
        		 $create_faq->description= $description;
        		 $create_faq->description2 = $description2;
        		 $create_faq->save(); 

        	}
        }

        }
        $image='115statescsv/'.auth()->user()->id . time() .'.csv';


       Storage::disk('local')->put($image, $newss);
      
       alert()->success("Success", "CSV Uploaded");
        return redirect()->route('uploadstatecsv.create');
}
        
 
 /*function convert( $str ) {
    return iconv( "Windows-1252", "UTF-8", $str );
}
   
     //return redirect()->route('uploadcsv.index');
   
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\States $state
	* @return \Illuminate\Http\Response
	*/
   
}

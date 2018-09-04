<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Datas;
use App\Models\Faqs;
use App\Models\States;
use App\Models\Mapdatas;

class onefifteenstatesController extends Controller
{
    public function index(){
    	$data = array();
        $states = array(); 
    	$datas = Datas::where('active','1')->get();
    	foreach($datas as $key=>$value){
                $data = array();
                $states[] = $value->states->name;
    			$id = $value->id;
               

    			$value->state_name = $value->states->name;
    			$faqs = Faqs::where('datas_id',$id)->get();

    			foreach($faqs as $k=>$v){
    				$Categories = Categories::where('id',$v->categories_id)->first();
    				$v->category_name = $Categories->name;
    				$data[] = $v;
    			}
    			$value->faqs = $data;

    	}
        $mapdata = array();
        $count = count($states);
       $dataone = array();
       $getstaes = Mapdatas::all();
        foreach ($getstaes as $key => $value) {

           if(!in_array($value->name,$states))
             {
            $up = Mapdatas::where('name',$value->name)->update(array('enable'=>'false','color'=>'#808080'));
             }
                //$mapdata[]= $value;

            /*if($value->name == $states[$key] ){
                $up = Mapdatas::where('name',$value->name)->update(array('enable'=>'false','color'=>'#000000'));
                $mapdata[]= $value;
            }else{
                $mapdata[] = $value;
            }*/
        }
        $getmap = Mapdatas::all();
       
       $dataone['path']= $getmap;
       // return response()->json($dataone, 200);
      //  die();
       $text = 'window.JSMaps.maps.usaTerritories = {
    "config": {
        "mapWidth": 930,
        "mapHeight": 590,
        "defaultText": "<h1>United States of America</h1><br /><p>The U.S. is a country of 50 states covering a vast swath of North America, with Alaska in the extreme Northwest and Hawaii extending the nation’s presence into the Pacific Ocean. Major cities include New York, a global finance and culture center, and Washington, DC, the capital, both on the Atlantic Coast; Los Angeles, famed for filmmaking, on the Pacific Coast; and the Midwestern metropolis Chicago.</p>"
    },
      "paths": ';
        $fp = fopen('/var/www/html/115-states/map/maps/usaTerritories.js', 'w');
            fwrite($fp, $text);
        $fp = fopen('/var/www/html/115-states/map/maps/usaTerritories.js', 'a');
            fwrite($fp, json_encode($getmap));

        $text1 = ",
    }";
    $fp = fopen('/var/www/html/115-states/map/maps/usaTerritories.js', 'a');
            fwrite($fp, $text1);

    	if(isset($datas) && !empty($datas)){
            if(file_exists("/var/www/html/340B/json/fifteenstatesdata.json")){
            unlink('/var/www/html/340B/json/fifteenstatesdata.json');
        }
            $fp = fopen('/var/www/html/340B/json/fifteenstatesdata.json', 'w');
            fwrite($fp, json_encode($datas));
            fclose($fp);

            return response()->json($datas, 200);    
        }
        return response()->json(['error'=>'Unauthorised'], 401);
    }
}

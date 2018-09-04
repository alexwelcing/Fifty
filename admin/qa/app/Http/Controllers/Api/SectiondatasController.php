<?php

namespace App\Http\Controllers\Api;

use App\Models\Questions;
use App\Models\threefourtyB\Sections;
use App\Models\threefourtyB\Statesthreefourty;
use App\Models\threefourtyB\Sectiondatas;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectiondatasController extends Controller
{
	public function index(){
		$statesthreefourty = Statesthreefourty::where('active', '1')->get();

		$data = array();
		$all_data = array();
		foreach($statesthreefourty as $statest){
			$datast = array();
			

			$sections = Sections::where('active', '1')->where('statesthree_id', $statest->id)->get();



			foreach($sections as $k => $section){
				$datast['title'] = $statest->title;
			    $datast['state'] = $statest->states->name;
			    $datast['description'] = $statest->description;
				$datasec = array();
				$datasec['title'] = $section->title;
				$datasec['description'] = $section->description;
				$datast['section'][$k] = $datasec;

				$sectiondata = Sectiondatas::where('active', '1')->where('sections_id', $section->id)->get();
				//echo "<pre>"; print_r($sectiondata);
				//die();
				foreach($sectiondata as $i => $sectiondat){
					$datada = array();
					$data2 = array();
					
					$datada['dispensing_fee'] = $sectiondat->dispensing_fee;
					$datada['ingredient_cost'] = $sectiondat->ingredient_cost;
					$datada['question_title'] = $sectiondat->questions->question;
					$datada['clarifying_detail'] = $sectiondat->clarifying_detail;
					$datada['source'] = $sectiondat->source;
					$datada['source_link'] = $sectiondat->source_link;
					$datada['question_type'] = $sectiondat->question_type;
					$datada['table_select'] = $sectiondat->table_select;
					$datast['section'][$k]['tableonedata'][$i] = $datada;
				
				
				}

			}


 			$data[] = $datast;
		}

		

		if(isset($data) && !empty($data)){
			if(file_exists("/var/www/html/340B/json/sectiondata.json")){
			unlink('/var/www/html/340B/json/sectiondata.json');
		}
        	$fp = fopen('/var/www/html/340B/json/sectiondata.json', 'w');
			fwrite($fp, json_encode($data));
			fclose($fp);

        	return response()->json($data, 200);	
        }
        return response()->json(['error'=>'Unauthorised'], 401);


	}





}

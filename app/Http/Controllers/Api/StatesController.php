<?php

namespace App\Http\Controllers\Api;

use App\Models\States;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatesController extends Controller
{


    public function index()
    {
    	$states = States::where('active', '1')->get();
        if($states){
        	unlink('/var/www/html/340B/json/results.json');
        	$fp = fopen('/var/www/html/340B/json/results.json', 'w');
			fwrite($fp, json_encode($states));
			fclose($fp);

        	return response()->json($states, 200);	

        	


        }
        return response()->json(['error'=>'Unauthorised'], 401);
    }


}

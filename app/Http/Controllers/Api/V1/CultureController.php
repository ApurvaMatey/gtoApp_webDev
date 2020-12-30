<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\V1\CultureModel;

class CultureController extends Controller
{
    //Abhay
    public function getCultureList(Request $request)
    {
        $cultureModel = new CultureModel();
        /*
        *  Get all Culture data
        */
        $cultureData = $cultureModel->getCultureList();
        if($cultureData){
            /*
            *   Final Response
            */
            $response["cultureList"] = $cultureData;
            $response["success"] = 1;                
            $response["message"] = "Culture list.";
            return response()->json($response);
        }else{
            /*
            *  Culture data not found
            */
            $response["success"] = 0;                
            $response["message"] = "Culture list not found.";
            return response()->json($response);
        }
    }

    /*
    *   Function to get Culture data by id
    */
    //Abhay
    public function getCultureById(Request $request)
    {   
        $cultureModel = new CultureModel();
        $cultureId = $request->input('cultureId');
        /*
        *  Get Culture data by Culture ID
        */
        $cultureData = $cultureModel->getCultureById($cultureId);
        if($cultureData) {
            /*
            *   Final Response
            */
            $response["cultureData"] = $cultureData;   
            $response["success"] = 1;                
            $response["message"] = "Culture fetched successfully.";
            return response()->json($response);
        } else {
            /*
            *   If Culture does not exists/deleted
            */
            $response["success"] = 0;                
            $response["message"] = "Culture does not exists/deleted..";
            return response()->json($response);
        }
    }
}

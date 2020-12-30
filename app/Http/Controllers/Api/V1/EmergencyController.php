<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\V1\EmergencyModel;

class EmergencyController extends Controller
{
    //Abhay
    public function getEmergencyList(Request $request)
    {
        $emergencyModel = new EmergencyModel();
        /*
        *  Get all Emergency data
        */
        $emergencyData = $emergencyModel->getEmergencyList();
        if($emergencyData) {
            /*
            *   Final Response
            */
            $response["emergencyList"] = $emergencyData;
            $response["success"] = 1;                
            $response["message"] = "Emergency list.";
            return response()->json($response);
        } else {
            /*
            *  Emergency data not found
            */
            $response["success"] = 0;                
            $response["message"] = "Emergency list not found.";
            return response()->json($response);
        }
    }

    /*
    *   Function to get Emergency data by id
    */
    //Abhay
    public function getEmergencyById(Request $request)
    {   
        $emergencyModel = new EmergencyModel();
        $emergencyId = $request->input('emergencyId');
        /*
        *  Get Emergency data by Emergency ID
        */
        $emergencyData = $emergencyModel->getEmergencyById($emergencyId);
        if($emergencyData) {
            /*
            *   Final Response
            */
            $response["emergencyData"] = $emergencyData;   
            $response["success"] = 1;                
            $response["message"] = "Emergency fetched successfully.";
            return response()->json($response);
        } else {
            /*
            *   If Emergency does not exists/deleted
            */
            $response["success"] = 0;                
            $response["message"] = "Emergency does not exists/deleted..";
            return response()->json($response);
        }
    }

    //Abhay
    public function addEmergencyCallCount(Request $request)
    {   
        $emergencyModel = new EmergencyModel();
        $emergencyId = $request->input('emergencyId');
        /*
        *  Add Emergency Call Count by Emergency ID
        */
        $result = $emergencyModel->addEmergencyCallCount($emergencyId);
        if($result) {
            /*
            *   Final Response
            */  
            $response["success"] = 1;                
            $response["message"] = "Emergency call added successfully.";
            return response()->json($response);
        } else {
            /*
            *   If Emergency call does not added count
            */
            $response["success"] = 0;                
            $response["message"] = "Something went wrong, please try again..";
            return response()->json($response);
        }
    }
}

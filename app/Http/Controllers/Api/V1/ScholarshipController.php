<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\V1\ScholarshipModel;

class ScholarshipController extends Controller
{
    //Abhay
    public function getScholarshipList(Request $request)
    {
        $scholarshipModel = new ScholarshipModel();
        /*
        *  Get all Scholarship data
        */
        $scholarshipData = $scholarshipModel->getScholarshipList();
        if($scholarshipData) {
            /*
            *   Final Response
            */
            $response["scholarshipList"] = $scholarshipData;
            $response["success"] = 1;                
            $response["message"] = "Scholarship list.";
            return response()->json($response);
        } else {
            /*
            *  Scholarship data not found
            */
            $response["success"] = 0;                
            $response["message"] = "Scholarship list not found.";
            return response()->json($response);
        }
    }

    /*
    *   Function to get Scholarship data by id
    */
    //Abhay
    public function getScholarshipById(Request $request)
    {   
        $scholarshipModel = new ScholarshipModel();
        $scholarshipId = $request->input('scholarshipId');
        /*
        *  Get Scholarship data by Scholarship ID
        */
        $scholarshipData = $scholarshipModel->getScholarshipById($scholarshipId);
        if($scholarshipData) {
            /*
            *   Final Response
            */
            $response["scholarshipData"] = $scholarshipData;   
            $response["success"] = 1;                
            $response["message"] = "Scholarship fetched successfully.";
            return response()->json($response);
        } else {
            /*
            *   If Scholarship does not exists/deleted
            */
            $response["success"] = 0;                
            $response["message"] = "Scholarship does not exists/deleted..";
            return response()->json($response);
        }
    }
}

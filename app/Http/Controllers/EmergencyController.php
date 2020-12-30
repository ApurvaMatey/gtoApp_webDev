<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Log;

//Models
use App\Models\Web\EmergencyModel;

class EmergencyController extends Controller
{
    //Abhay
    public function __construct()
    {
        $this->middleware('auth');
        $adminSessionId = Session::get('adminId');
    }

    /* Function to get all Emergency data */
    //Abhay
    public function getEmergencyList(Request $request)
    {
        $emergencyModel = new EmergencyModel();

        /* Get all Emergency data */
        $data['emergencyData'] = $emergencyModel->getEmergencyList();
        // Log::error($data['emergencyData']);
        return view('masters.emergency', $data);
    }

    /* Function to Create Emergency */
    //Abhay
    public function addEmergency(Request $request)
    {   
        /* check post method */
        $emergencyModel = new EmergencyModel();
        
        /* Form field */
        $number = $request->input('number');
        $colorCode = $request->input('colorCode');
        $description = $request->input('description');
        $callCount = $request->input('callCount');
        
        /* Array for Emergency */
        $insertArray = array(
            'number' => $number,
            'colorCode' => $colorCode,
            'description' => $description,
            'callCount' => 0,
            'addedBy' => $this->adminSessionId,
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        /* Insert Emergency data */
        $insertEmergencyId = $emergencyModel->insertEmergency($insertArray);
        if ($insertEmergencyId > 0) {
            /* Final response */
            return redirect()->route('emergency')->with('success','Data saved successfully !!');
        } else {
            /* If insertion fails */
            return redirect()->route('emergency')->with('error','Failed !! Data not saved !!');
        }
    }

    /* Function to Edit Emergency */
    //Abhay
    public function editEmergency(Request $request)
    {   
        /* check post method */
        $emergencyModel = new EmergencyModel();
        
        /* Form field */
        $emergencyId = $request->input('emergencyId');
        $number = $request->input('number');
        $colorCode = $request->input('colorCode');
        $description = $request->input('description');
        $callCount = $request->input('callCount');

        /* Array for Update Emergency */
        $updateArray = array(
            'number' => $number,
            'colorCode' => $colorCode,
            'description' => $description,
            'addedBy' => $this->adminSessionId,
            'updatedAt' => date('Y-m-d H:i:s')
        );

        /* Emergency data */
        if($emergencyModel->updateEmergency($updateArray, $emergencyId)) {
            /* Final response */
            return redirect()->route('emergency')->with('success','Data updated successfully !!');
        } else {
            /* If updation fails */
            return redirect()->route('emergency')->with('error','Failed !! Data not saved !!');
        }
    }

    /* Function to Delete Emergency */
    //Abhay
    public function deleteEmergency(Request $request)
    {   
        $emergencyModel = new EmergencyModel();
        $emergencyId = $request->input('emergencyId');

        /* delete entry by id */
        if($emergencyModel->deleteEmergencyById($emergencyId)) {
            return redirect()->route('emergency')->with('success','Data deleted successfully !!.');
        } else {
            return redirect()->route('emergency')->with('error','Emergency does not exists/deleted.');
        }
    }
}

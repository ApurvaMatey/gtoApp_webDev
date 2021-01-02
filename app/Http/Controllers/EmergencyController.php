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
        // $adminSessionId = Session::get('adminId');
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

    /* Function to get Emergency data By ID */
    //Abhay
    public function getEmergencyById(Request $request)
    {
        $emergencyModel = new EmergencyModel();
        $emergencyId = $_POST['emergencyId'];
        
        /* Get all Emergency data */
        $emergencyData = $emergencyModel->getEmergencyById($emergencyId);
        // Log::error(json_encode($emergencyData));
        return json_encode($emergencyData);
    }

    /* Function to Create Emergency */
    //Abhay
    public function addEmergency(Request $request)
    {
        /* check post method */
        $emergencyModel = new EmergencyModel();
        
        /* Form field */
        $number = $request->input('number');
        $colorCode = $request->input('color_code');
        $description = $request->input('description');
        
        /* Array for Emergency */
        $insertArray = array(
            'number' => $number,
            'colorCode' => $colorCode,
            'description' => $description,
            'callCount' => 0,
            'addedBy' => $request->session()->get('adminId'),
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        /* Insert Emergency data */
        $insertEmergencyId = $emergencyModel->insertEmergency($insertArray);
        if ($insertEmergencyId > 0) {
            /* Final response */
            return redirect()->route('emergency')->with('success','Datos guardados exitosamente !!');
        } else {
            /* If insertion fails */
            return redirect()->route('emergency')->with('error','Datos no guardados !!');
        }
    }

    /* Function to Edit Emergency */
    //Abhay
    public function editEmergency(Request $request)
    {   
        /* check post method */
        $emergencyModel = new EmergencyModel();
        
        /* Form field */
        $emergencyId = $request->input('edit-emergency-id');
        $number = $request->input('emergency_number');
        $colorCode = $request->input('emergency_color_code');
        $description = $request->input('emergency_description');        

        /* Array for Update Emergency */
        $updateArray = array(
            'number' => $number,
            'colorCode' => $colorCode,
            'description' => $description,
            'addedBy' => $request->session()->get('adminId'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        /* Emergency data */
        if($emergencyModel->updateEmergency($updateArray, $emergencyId)) {
            /* Final response */
            return redirect()->route('emergency')->with('success','Datos actualizados con éxito !!');
        } else {
            /* If updation fails */
            return redirect()->route('emergency')->with('error','Datos no guardados !!');
        }
    }

    /* Function to Delete Emergency */
    //Abhay
    public function deleteEmergency(Request $request)
    {   
        $emergencyModel = new EmergencyModel();
        $emergencyId = $request->input('del-emergency-id');

        /* delete entry by id */
        if($emergencyModel->deleteEmergencyById($emergencyId)) {
            return redirect()->route('emergency')->with('success','Datos eliminados con éxito !!.');
        } else {
            return redirect()->route('emergency')->with('error','Seguridad no existe / eliminada.');
        }
    }
}

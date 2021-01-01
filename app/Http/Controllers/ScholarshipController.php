<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Log;

//Models
use App\Models\Web\ScholarshipModel;

class ScholarshipController extends Controller
{
    //Abhay
    public function __construct()
    {
        $this->middleware('auth');
        $adminSessionId = Session::get('adminId');
    }

    /* Function to get all Scholarship data */
    //Abhay
    public function getScholarshipList(Request $request)
    {
        $scholarshipModel = new ScholarshipModel();
        
        /* Get all Scholarship data */
        $data['scholarshipData'] = $scholarshipModel->getScholarshipList();
        // Log::error($data['scholarshipData']);
        return view('masters.scholarship', $data);
    }

    /* Function to get Scholarship data By ID */
    //Abhay
    public function getScholarshipById(Request $request)
    {
        $scholarshipModel = new ScholarshipModel();
        $scholarshipId = $_POST['scholarshipId'];
        
        /* Get all Scholarship data */
        $scholarshipData = $scholarshipModel->getScholarshipById($scholarshipId);
        // Log::error(json_encode($scholarshipData));
        return json_encode($scholarshipData);
    }

    /* Function to Create Scholarship */
    //Abhay
    public function addScholarship(Request $request)
    {   
        /* check post method */
        $scholarshipModel = new ScholarshipModel();
        
        /* Form field */
        $title = $request->input('title');
        $description = $request->input('description');
        $imagePath = '';
        $url = $request->input('url');
        
        /* For image uploading */
        if($image = $request->file('imagePath')) {
            $input['imagePath'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = env('UPLOAD_PATH').'scholarship_images/'; //upload path for online
            $image->move($destinationPath, $input['imagePath']);
            $imagePath = 'scholarship_images/'.$input['imagePath'];
        }

        /* Array for Scholarship */
        $insertArray = array(
            'title' => $title,
            'description' => $description,
            'imagePath' => $imagePath,
            'url' => $url,
            'addedBy' => $request->session()->get('adminId'),
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        /* Insert Scholarship data */
        $insertScholarshipId = $scholarshipModel->insertScholarship($insertArray);
        if ($insertScholarshipId > 0) {
            /* Final response */
            return redirect()->route('scholarship')->with('success','Datos guardados exitosamente !!');
        } else {
            /* If insertion fails */
            return redirect()->route('scholarship')->with('error','Datos no guardados !!');
        }
    }

    /* Function to Edit Scholarship */
    //Abhay
    public function editScholarship(Request $request)
    {
        /* check post method */
        $scholarshipModel = new ScholarshipModel();
        
        /* Form field */
        $scholarshipId = $request->input('edit-scholarship-id');
        $title = $request->input('scholarship_title');
        $description = $request->input('scholarship_description');
        $imagePath = ''; /* Pending To Put old Link For save or unlink */
        $url = $request->input('scholarship_url');

        /* For image uploading */
        if($image = $request->file('scholarship_imagePath')) {
            $input['scholarship_imagePath'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = env('UPLOAD_PATH').'scholarship_images/'; //upload path for online
            $image->move($destinationPath, $input['scholarship_imagePath']);
            $imagePath = 'scholarship_images/'.$input['scholarship_imagePath'];
        }

        /* Array for Update Scholarship */
        $updateArray = array(
            'title' => $title,
            'description' => $description,
            'imagePath' => $imagePath,
            'url' => $url,
            'addedBy' => $request->session()->get('adminId'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        /* Scholarship data */
        if($scholarshipModel->updateScholarship($updateArray, $scholarshipId)) {
            /* Final response */
            return redirect()->route('scholarship')->with('success','Datos actualizados con éxito !!');
        } else {
            /* If updation fails */
            return redirect()->route('scholarship')->with('error','Datos no guardados !!');
        }
    }

    /* Function to Delete Scholarship */
    //Abhay
    public function deleteScholarship(Request $request)
    {   
        $scholarshipModel = new ScholarshipModel();
        $scholarshipId = $request->input('del-scholarship-id');

        /* delete entry by id */
        if($scholarshipModel->deleteScholarshipById($scholarshipId)) {
            return redirect()->route('scholarship')->with('success','Datos eliminados con éxito !!.');
        } else {
            return redirect()->route('scholarship')->with('error','La beca no existe / eliminada.');
        }
    }
}

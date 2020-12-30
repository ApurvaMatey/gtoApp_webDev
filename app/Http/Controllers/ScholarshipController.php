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

    /* Function to Create Scholarship */
    //Abhay
    public function addScholarship(Request $request)
    {   
        /* check post method */
        $scholarshipModel = new ScholarshipModel();
        
        /* Form field */
        $title = $request->input('title');
        $description = $request->input('description');
        $imagePath = $request->input('imagePath');
        $url = $request->input('url');
        
        /* Array for Scholarship */
        $insertArray = array(
            'title' => $title,
            'description' => $description,
            'imagePath' => $imagePath,
            'url' => $url,
            'addedBy' => $this->adminSessionId,
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        /* Insert Scholarship data */
        $insertScholarshipId = $scholarshipModel->insertScholarship($insertArray);
        if ($insertScholarshipId > 0) {
            /* Final response */
            return redirect()->route('scholarship')->with('success','Data saved successfully !!');
        } else {
            /* If insertion fails */
            return redirect()->route('scholarship')->with('error','Failed !! Data not saved !!');
        }
    }

    /* Function to Edit Scholarship */
    //Abhay
    public function editScholarship(Request $request)
    {
        /* check post method */
        $scholarshipModel = new ScholarshipModel();
        
        /* Form field */
        $scholarshipId = $request->input('scholarshipId');
        $title = $request->input('title');
        $description = $request->input('description');
        $imagePath = $request->input('imagePath');
        $url = $request->input('url');

        /* Array for Update Scholarship */
        $updateArray = array(
            'title' => $title,
            'description' => $description,
            'imagePath' => $imagePath,
            'url' => $url,
            'addedBy' => $this->adminSessionId,
            'updatedAt' => date('Y-m-d H:i:s')
        );

        /* Scholarship data */
        if($scholarshipModel->updateScholarship($updateArray, $scholarshipId)) {
            /* Final response */
            return redirect()->route('scholarship')->with('success','Data updated successfully !!');
        } else {
            /* If updation fails */
            return redirect()->route('scholarship')->with('error','Failed !! Data not saved !!');
        }
    }

    /* Function to Delete Scholarship */
    //Abhay
    public function deleteScholarship(Request $request)
    {   
        $scholarshipModel = new ScholarshipModel();
        $scholarshipId = $request->input('scholarshipId');

        /* delete entry by id */
        if($scholarshipModel->deleteScholarshipById($scholarshipId)) {
            return redirect()->route('scholarship')->with('success','Data deleted successfully !!.');
        } else {
            return redirect()->route('scholarship')->with('error','Scholarship does not exists/deleted.');
        }
    }
}

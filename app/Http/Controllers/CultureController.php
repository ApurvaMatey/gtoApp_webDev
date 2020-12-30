<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Log;

//Models
use App\Models\Web\CultureModel;

class CultureController extends Controller
{
    //Abhay
    public function __construct()
    {
        $this->middleware('auth');
        $adminSessionId = Session::get('adminId');
    }

    /* Function to get all Culture data */
    //Abhay
    public function getCultureList(Request $request)
    {
        $cultureModel = new CultureModel();

        /* Get all Culture data */
        $data['cultureData'] = $cultureModel->getCultureList();
        // Log::error($data['cultureData']);
        return view('masters.culture', $data);
    }

    /* Function to Create Culture */
    //Abhay
    public function addCulture(Request $request)
    {   
        /* check post method */
        $cultureModel = new CultureModel();
        
        /* Form field */
        $title = $request->input('title');
        $description = $request->input('description');
        $imagePath = $request->input('imagePath');
        $url = $request->input('url');
        
        /* Array for Culture */
        $insertArray = array(
            'title' => $title,
            'description' => $description,
            'imagePath' => $imagePath,
            'url' => $url,
            'addedBy' => $this->adminSessionId,
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        /* Insert Culture data */
        $insertCultureId = $cultureModel->insertCulture($insertArray);
        if ($insertCultureId > 0) {
            /* Final response */
            return redirect()->route('culture')->with('success','Data saved successfully !!');
        } else {
            /* If insertion fails */
            return redirect()->route('culture')->with('error','Failed !! Data not saved !!');
        }
    }

    /* Function to Edit Culture */
    //Abhay
    public function editCulture(Request $request)
    {   
        /* check post method */
        $cultureModel = new CultureModel();
        
        /* Form field */
        $cultureId = $request->input('cultureId');
        $title = $request->input('title');
        $description = $request->input('description');
        $imagePath = $request->input('imagePath');
        $url = $request->input('url');

        /* Array for Update Culture */
        $updateArray = array(
            'title' => $title,
            'description' => $description,
            'imagePath' => $imagePath,
            'url' => $url,
            'addedBy' => $this->adminSessionId,
            'updatedAt' => date('Y-m-d H:i:s')
        );

        /* Culture data */
        if($cultureModel->updateCulture($updateArray, $cultureId)) {
            /* Final response */
            return redirect()->route('culture')->with('success','Data updated successfully !!');
        } else {
            /* If updation fails */
            return redirect()->route('culture')->with('error','Failed !! Data not saved !!');
        }
    }

    /* Function to Delete Culture */
    //Abhay
    public function deleteCulture(Request $request)
    {   
        $cultureModel = new CultureModel();
        $cultureId = $request->input('cultureId');

        /* delete entry by id */
        if($cultureModel->deleteCultureById($cultureId)) {
            return redirect()->route('culture')->with('success','Data deleted successfully !!.');
        } else {
            return redirect()->route('culture')->with('error','Culture does not exists/deleted.');
        }
    }
}

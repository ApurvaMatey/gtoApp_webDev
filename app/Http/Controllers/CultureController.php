<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Log;
use File;

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

    /* Function to get Culture data By ID */
    //Abhay
    public function getCultureById(Request $request)
    {
        $cultureModel = new CultureModel();
        $cultureId = $_POST['cultureId'];
        
        /* Get all Culture data */
        $cultureData = $cultureModel->getCultureById($cultureId);
        // Log::error(json_encode($cultureData));
        return json_encode($cultureData);
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
        $imagePath = '';
        $url = $request->input('url');

        /* For image uploading */
        if($image = $request->file('imagePath')) {
            $input['imagePath'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/culture_images'); //upload path for online
            // $destinationPath = env('UPLOAD_PATH').'culture_images/'; //upload path for online
            $image->move($destinationPath, $input['imagePath']);
            $imagePath = 'culture_images/'.$input['imagePath'];

            // Log::error($destinationPath);exit();
        }
        
        /* Array for Culture */
        $insertArray = array(
            'title' => $title,
            'description' => $description,
            'imagePath' => $imagePath,
            'url' => $url,
            'addedBy' => $request->session()->get('adminId'),
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        /* Insert Culture data */
        $insertCultureId = $cultureModel->insertCulture($insertArray);
        if ($insertCultureId > 0) {
            /* Final response */
            return redirect()->route('culture')->with('success','Datos guardados exitosamente !!');
        } else {
            /* If insertion fails */
            return redirect()->route('culture')->with('error','Datos no guardados !!');
        }
    }

    /* Function to Edit Culture */
    //Abhay
    public function editCulture(Request $request)
    {   
        /* check post method */
        $cultureModel = new CultureModel();
        
        /* Form field */
        $cultureId = $request->input('edit-culture-id');
        $title = $request->input('culture_title');
        $description = $request->input('culture_description');
        $imagePath = ''; /* Pending To Put old Link For save or unlink */
        $url = $request->input('culture_url');

        /* For image uploading */
        if($image = $request->file('culture_imagePath')) {
            $input['culture_imagePath'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/culture_images'); //upload path for online
            // $destinationPath = env('UPLOAD_PATH').'culture_images/'; //upload path for online
            $image->move($destinationPath, $input['culture_imagePath']);
            $imagePath = 'culture_images/'.$input['culture_imagePath'];

            // Log::error($destinationPath);exit();
        }

        /* Array for Update Culture */
        $updateArray = array(
            'title' => $title,
            'description' => $description,
            'imagePath' => $imagePath,
            'url' => $url,
            'addedBy' => $request->session()->get('adminId'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        /* Culture data */
        if($cultureModel->updateCulture($updateArray, $cultureId)) {
            /* Final response */
            return redirect()->route('culture')->with('success','Datos actualizados con éxito !!');
        } else {
            /* If updation fails */
            return redirect()->route('culture')->with('error','Datos no guardados !!');
        }
    }

    /* Function to Delete Culture */
    //Abhay
    public function deleteCulture(Request $request)
    {   
        $cultureModel = new CultureModel();
        $cultureId = $request->input('del-culture-id');

        /* delete entry by id */
        if($cultureModel->deleteCultureById($cultureId)) {
            return redirect()->route('culture')->with('success','Datos eliminados con éxito !!.');
        } else {
            return redirect()->route('culture')->with('error','La cultura no existe / eliminada.');
        }
    }
}

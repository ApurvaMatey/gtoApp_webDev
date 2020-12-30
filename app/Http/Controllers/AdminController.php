<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Log;

//Models
use App\Models\Web\AdminModel;

class AdminController extends Controller
{
    //Abhay
    public function __construct()
    {
        $this->middleware('auth');
        // $adminSessionId = Session::get('adminId'); //Not Working
    }

    /* Function to get all Admin data */
    //Abhay
    public function getAdminList(Request $request)
    {
        $adminModel = new AdminModel();
        
        /* Get all Admin data */
        $data['adminData'] = $adminModel->getAdminList();
        // Log::error($data['adminData']);
        return view('masters.admin', $data);
    }

    /* Function to get Admin data By ID */
    //Abhay
    public function getAdminById(Request $request)
    {   
        $adminModel = new AdminModel();
        $adminId = $_POST['adminId'];
        
        /* Get all Admin data */
        $adminData = $adminModel->getAdminById($adminId);
        // Log::error(json_encode($adminData));
        return json_encode($adminData);
    }

    /* Function to create Admin */
    //Abhay
    public function addAdmin(Request $request)
    {
        /* check post method */
        $adminModel = new AdminModel();

        /* Form field */
        $name = $request->input('admin_name');
        $email = $request->input('email');
        $phone = $request->input('number');
        $password = $request->input('password');
        $passHash = Hash::make($password);
        $addedBy = $request->session()->get('adminId');
        
        /* Check if Admin exists or Not */
        if(!$adminModel->isAdminExists($email)) {
            /* Array for Admin */
            $insertArray = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'password' => $passHash,
                'addedBy' => $addedBy,
                'canDelete' => 1,
                'createdAt' => date('Y-m-d H:i:s'),
                'updatedAt' => date('Y-m-d H:i:s')
            );

            /* Insert Admin data */
            $insertAdminId = $adminModel->insertAdmin($insertArray);
            if ($insertAdminId > 0) {
                /* Final response */
                return redirect()->route('admin')->with('success','Data saved successfully !!');
            } else {
                /* If insertion fails */
                return redirect()->route('admin')->with('error','Failed !! Data not saved !!');
            }
        } else {
            /* If Admin already exists */
            return redirect()->route('admin')->with('error','Email already exists.');
        }
    }

    /* Function to edit Admin */
    //Abhay
    public function editAdmin(Request $request)
    {   
        /* check post method */
        $adminModel = new AdminModel();

        /* Form field */
        $adminId = $request->input('edit-admin-id');
        $name = $request->input('admin_name');

        $email = $request->input('email');
        $phone = $request->input('number');
        $password = $request->input('password');
        $passHash = Hash::make($password);

        /* Check if Admin exists or Not */
        if($adminModel->isAdminExistsById($adminId)) {
            if(!$adminModel->isEmailExists($email, $adminId)) {
                /* Check If Email Is Not exist */
                if($password == "") {
                    /* Array for Update Admin */
                    $updateArray = array(
                        'name' => $name,
                        'phone' => $phone,
                        'updatedAt' => date('Y-m-d H:i:s')
                    );
                } else {
                    /* Array for Update Admin */
                    $updateArray = array(
                        'name' => $name,
                        'phone' => $phone,
                        'password' => $passHash,
                        'updatedAt' => date('Y-m-d H:i:s')
                    );
                }
                /* Admin data */
                if($adminModel->updateAdmin($updateArray, $adminId)) {
                    /* Final response */
                    return redirect()->route('admin')->with('success','Data updated successfully !!');
                }
            } else {
                /* Check If Email Is already exist */
                return redirect()->route('admin')->with('error','Email already exists.');
            }
        } else {
            /* If Admin already exists */
            return redirect()->route('admin')->with('error','This Admin does not exists.');
        }
    }

    /* Function to Delete Admin */
    //Abhay
    public function deleteAdmin(Request $request)
    {   
        $adminModel = new AdminModel();
        $adminId = $request->input('del-admin-id');

        /* update isdeleted column by id */
        if($adminModel->deletedAdminById($adminId)) {
            return redirect()->route('admin')->with('success','Data deleted successfully !!.');
        } else {
            return redirect()->route('admin')->with('error','Admin does not exists/deleted.');
        }
    }
}

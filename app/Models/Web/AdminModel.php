<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use DB;

class AdminModel extends Model
{
    use HasFactory;

    //Abhay
    public function getAdminList()
    {
        $adminData = DB::table('tbl_admin')
                ->select('*')
                ->where('canDelete', '=', 1)
                ->where('id', '!=', Session::get('adminId'))
                ->get()
                ->toArray();

        if($adminData) {

            $adminList = array();
            foreach($adminData as $row) {
                $array = array( 
                    'adminId' => $row->id,
                    'name' => $row->name,
                    'email' => $row->email,
                    'phone' => $row->phone,
                    'addedBy' => $row->addedBy,
                    'adminName' => $this->getAdminNameById($row->addedBy),
                    'canDelete' => $row->canDelete,
                    'createdAt' => $row->createdAt,
                    'updatedAt' => $row->updatedAt
                );
                array_push($adminList, $array);
            }
            return $adminList;
        } else {
            return null;
        }
    }

    //Abhay
    public function getAdminNameById($adminId)
    {
        $adminName = DB::table('tbl_admin')
                ->select('name')
                ->where('id', $adminId)
                ->first();

        if($adminName) {
            return $adminName->name;
        } else {
            return false;
        }
    }

    //Abhay
    public function getAdminById($adminId)
    {
        $adminData = DB::table('tbl_admin')
                ->select('*')
                ->where('id', $adminId)
                ->first();

        if($adminData) {
            $array = array( 
                'adminId' => $adminData->id,
                'name' => $adminData->name,
                'email' => $adminData->email,
                'phone' => $adminData->phone,
                'addedBy' => $adminData->addedBy,
                'canDelete' => $adminData->canDelete,
                'createdAt' => $adminData->createdAt,
                'updatedAt' => $adminData->updatedAt
            );
            return $array;
        } else {
            return false;
        }
    }

    //Abhay
    public function isAdminExists($email)
    {
        $isAdminExists = DB::table('tbl_admin')
                ->where('email', $email)
                ->first();

        if($isAdminExists) {
            return true;
        } else {
            return false;
        }
    }

    //Abhay
    public function isEmailExists($email, $adminId)
    {
        $isEmailExists = DB::table('tbl_admin')
                ->where('email', $email)
                ->where('id', '!=', $adminId)
                ->first();

        if($isEmailExists) {
            return true;
        } else {
            return false;
        }
    }

    //Abhay
    public function isAdminExistsById($adminId)
    {
        $isAdminExists = DB::table('tbl_admin')
                ->where('id', $adminId)
                ->first();

        if($isAdminExists) {
            return true;
        } else {
            return false;
        }
    }

    //Abhay
    public function insertAdmin($insertArray)
    {
        $adminId = DB::table('tbl_admin')
                      ->insertGetId($insertArray);
        
        if($adminId > 0) {
            return $adminId;
        } else {
            return false;
        }
    }

    //Abhay
    public function updateAdmin($updateArray, $adminId)
    {
        $updateAdminData = DB::table('tbl_admin')
                    ->where('id', $adminId)
                    ->update($updateArray);

        if($updateAdminData) {
            return true;
        } else {
            return false;
        }
    }

    //Abhay
    public function deletedAdminById($adminId)
    {   
        $deleteAdmin = DB::table('tbl_admin')
                    ->delete($adminId);
        
        if($deleteAdmin) {
            return true;
        } else {
            return false;
        }
    }

    //Abhay
    public function getAdminCount()
    {
        $adminData = DB::table('tbl_admin')
                ->select('*')
                ->get()
                ->toArray();

        if($adminData) {
            return count($adminData);
        } else {
            return 0;
        }
    }

    //Abhay
    public function updateAdminPassword($adminId, $passHash)
    {
        $updateAdminData = DB::table('tbl_admin')
                    ->where('id', $adminId)
                    ->update(['password' => $passHash]);

        if($updateAdminData) {
            return true;
        } else {
            return false;
        }
    }

    //Abhay
    public function addEmailTokenReset($resetTokenArr)
    {
        $tokenEmail = DB::table('password_resets')
                    ->update($resetTokenArr);

        if($tokenEmail) {
            return true;
        } else {
            return false;
        }
    }

    //Abhay
    public function getUserDataByEmail($email)
    {
        $adminData = DB::table('tbl_admin')
                ->select('*')
                ->where('email', $email)
                ->first();

        if($adminData) {
            $array = array( 
                'adminId' => $adminData->id,
                'name' => $adminData->name,
                'email' => $adminData->email
            );
            return $array;
        } else {
            return false;
        }
    }
}

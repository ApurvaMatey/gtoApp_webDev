<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class EmergencyModel extends Model
{
    use HasFactory;

    //Abhay
    public function getEmergencyList()
    {
        $emergencyData = DB::table('tbl_emergency_no')
                ->select('*')
                ->get()
                ->toArray();

        if($emergencyData) {

            $emergencyList = array();
            foreach($emergencyData as $row) {
                $array = array( 
                    'emergencyId' => $row->id,
                    'number' => $row->number,
                    'colorCode' => $row->colorCode,
                    'description' => $row->description,
                    'callCount' => $row->callCount,
                    'addedBy' => $row->addedBy,
                    'createdAt' => $row->createdAt,
                    'updatedAt' => $row->updatedAt
                );
                array_push($emergencyList, $array);
            }
            return $emergencyList;
        } else {
            return null;
        }
    }

    //Abhay
    public function getEmergencyById($emergencyId)
    {
        $emergencyData = DB::table('tbl_emergency_no')
                ->select('*')
                ->where('id', $emergencyId)
                ->first();

        if($emergencyData) {
            $array = array( 
                'emergencyId' => $emergencyData->id,
                'number' => $emergencyData->number,
                'colorCode' => $emergencyData->colorCode,
                'description' => $emergencyData->description,
                'callCount' => $emergencyData->callCount,
                'addedBy' => $emergencyData->addedBy,
                'createdAt' => $emergencyData->createdAt,
                'updatedAt' => $emergencyData->updatedAt
            );
            return $array;
        } else {
            return false;
        }
    }

    //Abhay
    public function insertEmergency($insertArray)
    {
        $emergencyId = DB::table('tbl_emergency_no')
                      ->insertGetId($insertArray);
        
        if($emergencyId > 0) {
            return $emergencyId;
        } else {
            return false;
        }
    }

    //Abhay
    public function updateEmergency($updateArray, $emergencyId)
    {
        $updateEmergencyData = DB::table('tbl_emergency_no')
                    ->where('id', $emergencyId)
                    ->update($updateArray);

        if($updateEmergencyData) {
            return true;
        } else {
            return false;
        }
    }

    //Abhay
    public function deleteEmergencyById($emergencyId)
    {   
        $deleteEmergency = DB::table('tbl_emergency_no')
                    ->delete($emergencyId);
        
        if($deleteEmergency) {
            return true;
        } else {
            return false;
        }
    }
    
    //Abhay
    public function getEmergencyCount()
    {
        $emergencyCount = DB::table('tbl_emergency_no')
                ->select('*')
                ->get()
                ->toArray();

        if($emergencyCount) {
            return count($emergencyCount);
        } else {
            return 0;
        }
    }
}

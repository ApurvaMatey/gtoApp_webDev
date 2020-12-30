<?php

namespace App\Models\api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class EmergencyModel extends Model
{
    use HasFactory;

    //Abhay
    public function getEmergencyList()
    {
        $emergencyList = DB::table('tbl_emergency_no')
                ->get();
         
        $emergencyArr = array();
        if($emergencyList) {
            foreach($emergencyList as $row) {
                $emergency = array(
                    'id' => $row->id,
                    'number' => $row->number,
                    'colorCode' => $row->colorCode,
                    'description' => $row->description,
                    'callCount' => $row->callCount,
                    'addedBy' => $row->addedBy,
                    'createdAt' => $row->createdAt,
                    'updatedAt' => $row->updatedAt
                );
                array_push($emergencyArr, $emergency);
            }
            return $emergencyArr;
        } else {
            return null;
        }
    }

    //Abhay
    public function getEmergencyById($emergencyId)
    {
        $emergencyData = DB::table('tbl_emergency_no')
                ->where('id', $emergencyId)
                ->first();
        
        if($emergencyData) {
            $emergencyArr = array(
                'id' => $emergencyData->id,
                'number' => $emergencyData->number,
                'colorCode' => $emergencyData->colorCode,
                'description' => $emergencyData->description,
                'callCount' => $emergencyData->callCount,
                'addedBy' => $emergencyData->addedBy,
                'createdAt' => $emergencyData->createdAt,
                'updatedAt' => $emergencyData->updatedAt
            );
            return $emergencyArr;
        } else {
            return null;
        }
    }

    //Abhay
    public function addEmergencyCallCount($emergencyId) {
        $callCount = DB::table('tbl_emergency_no')
                ->where('id', $emergencyId)
                ->first();

        if($callCount) {
            $incrementCount = $callCount->callCount + 1;
            // print_r($incrementCount);
            DB::table('tbl_emergency_no')
            ->where('id', $emergencyId)
            ->update(
                ['callCount' => $incrementCount]
            );
            return true;
        } else {
            return null;
        }
    }
}

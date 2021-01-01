<?php

namespace App\Models\api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ScholarshipModel extends Model
{
    use HasFactory;

    //Abhay
    public function getScholarshipList()
    {
        $scholarshipList = DB::table('tbl_scholarship')
                ->get();
         
        $scholarshipArr = array();
        if($scholarshipList) {
            foreach($scholarshipList as $row) {
                $scholarship = array(
                    'id' => $row->id,
                    'title' => $row->title,
                    'description' => $row->description,
                    'imagePath' => url('/'.$row->imagePath),
                    'url' => $row->url,
                    'addedBy' => $row->addedBy,
                    'createdAt' => $row->createdAt,
                    'updatedAt' => $row->updatedAt
                );
                array_push($scholarshipArr, $scholarship);
            }
            return $scholarshipArr;
        } else{
            return null;
        }
    }

    //Abhay
    public function getScholarshipById($scholarshipId)
    {
        $scholarshipData = DB::table('tbl_scholarship')
                ->where('id', $scholarshipId)
                ->first();
        
        if($scholarshipData) {
            $scholarshipArr = array(
                'id' => $scholarshipData->id,
                'title' => $scholarshipData->title,
                'description' => $scholarshipData->description,
                'imagePath' => url('/'.$scholarshipData->imagePath),
                'url' => $scholarshipData->url,
                'addedBy' => $scholarshipData->addedBy,
                'createdAt' => $scholarshipData->createdAt,
                'updatedAt' => $scholarshipData->updatedAt
            );
            return $scholarshipArr;
        } else{
            return null;
        }
    }
}

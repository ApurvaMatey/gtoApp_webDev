<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ScholarshipModel extends Model
{
    use HasFactory;

    //Abhay
    public function getScholarshipList()
    {
        $scholarshipData = DB::table('tbl_scholarship')
                ->join('tbl_admin', 'tbl_scholarship.addedBy', '=', 'tbl_admin.id')
                ->select('tbl_scholarship.*', 'tbl_admin.name')
                ->get()
                ->toArray();

        if($scholarshipData) {
            $scholarshipList = array();
            foreach($scholarshipData as $row) {
                $array = array(
                    'scholarshipId' => $row->id,
                    'title' => $row->title,
                    'description' => $row->description,
                    'imagePath' => $row->imagePath,
                    'url' => $row->url,
                    'addedBy' => $row->addedBy,
                    'adminName' => $row->name,
                    'createdAt' => $row->createdAt,
                    'updatedAt' => $row->updatedAt
                );
                array_push($scholarshipList, $array);
            }
            return $scholarshipList;
        } else {
            return null;
        }
    }

    //Abhay
    public function getScholarshipById($scholarshipId)
    {
        $scholarshipData = DB::table('tbl_scholarship')
                ->select('*')
                ->where('id', $scholarshipId)
                ->first();

        if($scholarshipData) {
            $array = array(
                'scholarshipId' => $scholarshipData->id,
                'title' => $scholarshipData->title,
                'description' => $scholarshipData->description,
                'imagePath' => $scholarshipData->imagePath,
                'url' => $scholarshipData->url,
                'addedBy' => $scholarshipData->addedBy,
                'createdAt' => $scholarshipData->createdAt,
                'updatedAt' => $scholarshipData->updatedAt
            );
            return $array;
        } else {
            return false;
        }
    }

    //Abhay
    public function insertScholarship($insertArray)
    {
        $scholarshipId = DB::table('tbl_scholarship')
                      ->insertGetId($insertArray);
        
        if($scholarshipId > 0) {
            return $scholarshipId;
        } else{
            return false;
        }
    }

    //Abhay
    public function updateScholarship($updateArray, $scholarshipId)
    {
        $updateScholarshipData = DB::table('tbl_scholarship')
                    ->where('id', $scholarshipId)
                    ->update($updateArray);

        if($updateScholarshipData) {
            return true;
        } else{
            return false;
        }
    }

    //Abhay
    public function deleteScholarshipById($scholarshipId)
    {   
        $deleteScholarship = DB::table('tbl_scholarship')
                    ->delete($scholarshipId);
        
        if($deleteScholarship) {
            return true;
        } else{
            return false;
        }
    }

    //Abhay
    public function getScholarshipCount()
    {
        $ScholarshipCount = DB::table('tbl_scholarship')
                ->select('*')
                ->get()
                ->toArray();

        if($ScholarshipCount) {
            return count($ScholarshipCount);
        } else{
            return 0;
        }
    }
}

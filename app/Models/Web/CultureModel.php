<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CultureModel extends Model
{
    use HasFactory;

    //Abhay
    public function getCultureList()
    {
        $cultureData = DB::table('tbl_culture')
                ->select('*')
                ->get()
                ->toArray();

        if($cultureData) {

            $cultureList = array();
            foreach($cultureData as $row) {
                $array = array( 
                    'cultureId' => $row->id,
                    'title' => $row->title,
                    'description' => $row->description,
                    'imagePath' => $row->imagePath,
                    'url' => $row->url,
                    'addedBy' => $row->addedBy,
                    'createdAt' => $row->createdAt,
                    'updatedAt' => $row->updatedAt
                );
                array_push($cultureList, $array);
            }
            return $cultureList;
        } else {
            return null;
        }
    }

    //Abhay
    public function getCultureById($cultureId)
    {
        $cultureData = DB::table('tbl_culture')
                ->select('*')
                ->where('id', $cultureId)
                ->first();

        if($cultureData) {
            $array = array( 
                'cultureId' => $cultureData->id,
                'title' => $cultureData->title,
                'description' => $cultureData->description,
                'imagePath' => $cultureData->imagePath,
                'url' => $cultureData->url,
                'addedBy' => $cultureData->addedBy,
                'createdAt' => $cultureData->createdAt,
                'updatedAt' => $cultureData->updatedAt
            );
            return $array;
        } else {
            return false;
        }
    }

    //Abhay
    public function insertCulture($insertArray)
    {
        $cultureId = DB::table('tbl_culture')
                      ->insertGetId($insertArray);
        
        if($cultureId > 0) {
            return $cultureId;
        } else {
            return false;
        }
    }

    //Abhay
    public function updateCulture($updateArray, $cultureId)
    {
        $updateCultureData = DB::table('tbl_culture')
                    ->where('id', $cultureId)
                    ->update($updateArray);

        if($updateCultureData) {
            return true;
        } else {
            return false;
        }
    }

    //Abhay
    public function deleteCultureById($cultureId)
    {   
        $deleteCulture = DB::table('tbl_culture')
                    ->delete($cultureId);
        
        if($deleteCulture) {
            return true;
        } else{
            return false;
        }
    }

    //Abhay
    public function getCultureCount()
    {
        $cultureCount = DB::table('tbl_culture')
                ->select('*')
                ->get()
                ->toArray();

        if($cultureCount) {
            return count($cultureCount);
        } else{
            return 0;
        }
    }
}

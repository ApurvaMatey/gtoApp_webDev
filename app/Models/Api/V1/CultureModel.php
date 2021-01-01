<?php

namespace App\Models\Api\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CultureModel extends Model
{
    use HasFactory;

    //Abhay
    public function getCultureList()
    {
        $cultureList = DB::table('tbl_culture')
                ->get();
         
        $culturArr = array();
        if($cultureList) {
            foreach($cultureList as $row) {
                $culture = array(
                    'id' => $row->id,
                    'title' => $row->title,
                    'description' => $row->description,
                    'imagePath' => env('LINK_PATH').$row->imagePath,
                    'url' => $row->url,
                    'addedBy' => $row->addedBy,
                    'createdAt' => $row->createdAt,
                    'updatedAt' => $row->updatedAt
                );
                array_push($culturArr, $culture);
            }
            return $culturArr;
        } else{
            return null;
        }
    }

    //Abhay
    public function getCultureById($cultureId)
    {
        $cultureData = DB::table('tbl_culture')
                ->where('id', $cultureId)
                ->first();
        
        if($cultureData) {
            $cultureArr = array(
                'id' => $cultureData->id,
                'title' => $cultureData->title,
                'description' => $cultureData->description,
                'imagePath' => $cultureData->imagePath,
                'url' => $cultureData->url,
                'addedBy' => $cultureData->addedBy,
                'createdAt' => $cultureData->createdAt,
                'updatedAt' => $cultureData->updatedAt
            );
            return $cultureArr;
        } else{
            return null;
        }
    }
}

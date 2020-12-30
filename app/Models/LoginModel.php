<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use DB;

class LoginModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_admin';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array 
     */
    
    protected $fillable = [

        'id', 'name', 'email', 'phone', 'addedBy', 'canDelete', 'createdAt', 'updatedAt'
    ];

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        //'authKey',
    ];

    //Abhay
    public function checkEmailExists($email) {
        $checkEmail = DB::table('tbl_admin')->where('email', $email)->first();
        if($checkEmail) {
            return true;
        } else {
            return false;
        }
    }

    //Abhay
    public function getAdminDataById($adminId)
    {
        $admin = DB::table('tbl_admin')
                ->where('id', $adminId)
                ->first();
         
        if($admin) {
            $adminarray = array(
                'id' => $admin->id,
                'name' => $admin->name,
                'email' => $admin->email,
                'phone' => $admin->phone,
                'addedBy' => $admin->addedBy,
                'canDelete' => $admin->canDelete,
                'createdAt' => $admin->createdAt,
                'updatedAt' => $admin->updatedAt
            );
            return $adminarray;
        } else{
            return null;
        }
    }
}

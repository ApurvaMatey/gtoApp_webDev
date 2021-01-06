<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Mail;
use Log;

//Models
use App\Models\Web\AdminModel;

class ForgotPasswordController extends Controller
{
    //Abhay
    public function getEmail()
    {
       return view('auth.passwords.email');
    }

    //Abhay
    public function postEmail(Request $request)
    {
        $adminModel = new AdminModel();
        
        $request->validate([
            'email' => 'required|email|exists:tbl_admin',
        ]);
        
        $token = Str::random(60);
        
        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        /* Get User Details By ID */
        $adminData = $adminModel->getUserDataByEmail($request->email);

        $data = [
            'token' => $token,
            'username' => $adminData['name'],
            'emailLogo' => url('/images/logo/gto_logo_white.png'),
            'redirectURL' => url('resetYourPassword/?email='.$request->email.'&token='.$token)
        ];
        
        Mail::send('resetmail.forgotPassword', $data, function($message) use ($request) {
            $message->from(env('MAIL_FROM_ADDRESS'));
            $message->to($request->email);
            $message->subject('Reiniciar Contraseña');
        });

        return redirect()->route('login')->with('success','¡Hemos enviado un correo electrónico con el enlace de restablecimiento de contraseña!');
    }
}
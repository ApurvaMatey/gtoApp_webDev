<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\LoginModel;
use Auth;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /*
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /*
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /*
    * Create a new controller instance.
    * Login by email or phone and password
    */
    //Abhay
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]); 
        
        $email = $input['email'];

        $adminModel = new LoginModel();

        $checkExists = $adminModel->checkEmailExists($email);

        $remember = $request->has('remember') ? true : false; 

        if($checkExists) {
            if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
                $adminId = auth()->user()->id;
                // print_r($adminId);
                // exit();
                $getAdminData = $adminModel->getAdminDataById($adminId);

                if($remember == 'true') {
                    setcookie("admin_name",$input['email'],time()+60*60);
                    setcookie("admin_pass",base64_encode($input['password']),time()+60*60);
                    setcookie("remember",$input['remember'],time()+60*60);
                }

                Session::put('adminId', $getAdminData['id']);
                Session::put('adminName', $getAdminData['name']);
                Session::put('email', $getAdminData['email']);
                Session::put('phone', $getAdminData['phone']);
                return redirect()->intended($this->redirectPath());
                
            } else {
                return redirect()->route('login')->with('error','Invalid credentials.');
            }
        } else {
            return redirect()->route('login')->with('error','User does not exist.');
        }
    }

    //Abhay
    public function logout(Request $request ) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }
    
}
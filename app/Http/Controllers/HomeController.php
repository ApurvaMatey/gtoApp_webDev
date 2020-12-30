<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Log;

//Models
use App\Models\Web\AdminModel;
use App\Models\Web\CultureModel;
use App\Models\Web\EmergencyModel;
use App\Models\Web\ScholarshipModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $adminModel = new AdminModel();
        $cultureModel = new CultureModel();
        $emergencyModel = new EmergencyModel();
        $scholarshipModel = new ScholarshipModel();

        /* Get Admin Count */
        $data['adminCount'] = $adminModel->getAdminCount();

        /* Get Admin Count */
        $data['cultureCount'] = $cultureModel->getCultureCount();

        /* Get Admin Count */
        $data['emergencyCount'] = $emergencyModel->getEmergencyCount();

        /* Get Admin Count */
        $data['scholarshipCount'] = $scholarshipModel->getScholarshipCount();
        Log::error($data);
        return view('home', $data);
    }
}

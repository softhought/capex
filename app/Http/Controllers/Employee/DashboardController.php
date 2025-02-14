<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LayoutController;


class DashboardController extends Controller
{  
    public function index(){
       $session = session('capexEmployee');   
    //    echo checkApprover();
    //     exit;
        $data['bodyView'] = view('employee/dashboard');
        return LayoutController::loadEmployee($data);
    }


   

}

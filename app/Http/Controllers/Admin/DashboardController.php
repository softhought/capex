<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LayoutController;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data['bodyView'] = view('admin/dashboard');
        return LayoutController::loadAdmin($data);
    }

  
}

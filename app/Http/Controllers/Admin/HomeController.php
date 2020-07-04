<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $title = 'Dashboard';

//        $horizonStatus = $this->dashboardService->checkHorizon();

//        $node = $this->dashboardService->checkNodeSocketServer();

        return view('admin.index', compact('title'));
    }
}

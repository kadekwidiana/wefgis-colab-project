<?php

namespace App\Http\Controllers\Backpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('backpage.dashboard.index');
    }
}

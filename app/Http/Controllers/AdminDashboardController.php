<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    function show(){
        return view('admin.dashboard');
    }
}

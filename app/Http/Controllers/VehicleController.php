<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        
        // dd($brands);
        return view('admin.vehicle.index');
    }
}

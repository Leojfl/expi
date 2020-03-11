<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class ParkingController extends Controller
{
    public function index()
    {
        return view('admin.parking.index');
    }
}

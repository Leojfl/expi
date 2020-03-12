<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Parking;

class ParkingController extends Controller
{
    public function index()
    {
        $parkings = Parking::paginate(10);
        return view('admin.parking.index', ['parkings' => $parkings]);
    }
}

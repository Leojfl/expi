<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Parking;
use App\Models\User;

class ParkingController extends Controller
{
    public function index()
    {
        $parkings = Parking::paginate(10);
        return view('admin.parking.index', ['parkings' => $parkings]);
    }
    public function updateStatus($parkingId)
    {
        if (!request()->ajax()) {
            return redirect()->back();
        }
        $parking = Parking::find($parkingId);
        $parking->active = !($parking->active);
        $success = $parking->save();
        return response()->json(['success' => $success]);
    }
}

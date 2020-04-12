<?php


namespace App\Http\Controllers\Parking;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertTariffRequests;
use App\Models\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function index()
    {
        $tariffs = Tariff::orderBy('id', 'DESC')
            ->where('fk_id_parking', \Auth::user()->parking->id)
            ->paginate(10);
        return view('parking.tariff.index', ['tariffs' => $tariffs]);
    }

    public function upsert($tariffId = null)
    {
        $tariff = Tariff::find($tariffId);
        return view('parking.tariff._form', ['tariff' => $tariff]);
    }

    public function upsertPost(UpsertTariffRequests $request, $tariffId = null)
    {
        $tariff = Tariff::findOrNew($tariffId);
        $tariff->fill($request->all());
        $tariff->fk_id_parking = \Auth::user()->parking->id;
        return response()->json(['success' => $tariff->save()]);
    }
    public function updateStatus($tariffId)
    {
        if (!request()->ajax()) {
            return redirect()->back();
        }
        $tariff = Tariff::find($tariffId);
        $tariff->active = !($tariff->active);
        $success = $tariff->save();
        return response()->json(['success' => $success]);
    }

}

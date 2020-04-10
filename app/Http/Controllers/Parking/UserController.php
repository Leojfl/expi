<?php


namespace App\Http\Controllers\Parking;


use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $pension = ($request->route()->action['as']=='parking_pension_users_index');
        $userSpecial = User::whereFkIdRol(Rol::CLIENT)
            ->whereHas('special', function ($q) use ($pension) {
                $q->where('fk_id_parking', \Auth::user()->parking->id)
                ->where('pension', $pension);
            })->paginate(10);
        return view('parking.special.index', ['userSpecials' => $userSpecial, 'pension' => $pension]);
    }

}

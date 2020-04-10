<?php


namespace App\Http\Controllers\Parking;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertUserSpecialRequest;
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
    public function upsert($userId = 0)
    {
        $user = User::find($userId);
        return View('parking.special._form', ['user' => $user]);
    }

    public function upsertPost(UpsertUserSpecialRequest $requests, $userId = 0)
    {
        if ($userId == 0) {
            $user = new User();
        } else {
            $user = User::find($userId);
        }
        $user->fill($requests->all());
        $success = $user->save();
        return response()
            ->json(['success' => $success]);
    }

    public function updateStatus($userId)
    {
        if (!request()->ajax()) {
            return redirect()->back();
        }
        $user = User::find($userId);
        $user->active = !($user->active);
        $success = $user->save();
        return response()->json(['success' => $success]);
    }

}

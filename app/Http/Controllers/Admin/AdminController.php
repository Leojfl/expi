<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertAdminRequests;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::whereFkIdRol(Rol::ADMIN)
            ->where('id', '!=', Auth::id())
            ->paginate(10);
        return View('admin.admin.index', ['users' => $users]);
    }

    public function upsert($userId = 0)
    {
        $user = User::find($userId);
        return View('admin.admin._form', ['user' => $user]);
    }

    public function upsertPost(UpsertAdminRequests $requests, $userId = 0)
    {
        if ($userId == 0) {
            $user = new User();
        } else {
            $user = User::find($userId);
        }

        $user->fill($requests->all());
        $user->fk_id_rol = Rol::ADMIN;
        $user->password = Hash::make($requests->input('password'));
        $success = $user->save();
        return response()
            ->json(['success' => $success]);
    }
}

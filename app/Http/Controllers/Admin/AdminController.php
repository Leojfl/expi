<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
}

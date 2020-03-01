<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Models\User;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::whereFkIdRol(Rol::ADMIN)->paginate(10);
        return View('admin.admin.index', ['users' => $users]);
    }

}

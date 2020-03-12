<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Terms;

class TermsController extends Controller
{
    public function index()
    {
        $terms = Terms::findOrNew(1);
        return View('admin.terms.index', ['terms' => $terms]);
    }

}

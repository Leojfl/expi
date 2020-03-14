<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Terms;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        $terms = Terms::findOrNew(1);
        return View('admin.terms.index', ['terms' => $terms]);
    }

    public function update(Request $request)
    {
        $terms = Terms::findOrNew(1);
        $terms->terms = $request->input('terms');
        $terms->save();
        return response()->json([
            'success' => true,
            'message' => 'Correcto',
        ]);
    }

}

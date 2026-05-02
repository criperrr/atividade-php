<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Curso; // ACRESCENTE ESSA

class CursoController extends Controller
{
    // repare que a chamada do metodo all é "::all();"
    public function index() {
        $rows = Curso::all();
        return view('admin.cursos.index', compact('rows'));
    }
}

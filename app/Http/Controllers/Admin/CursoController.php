<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $rows = Curso::all();
        return view('admin.cursos.index', compact('rows'));
    }

    public function adicionar()
    {
        $curso = null;
        return view('admin.cursos.adicionar', compact('curso'));
    }

    public function salvar(Request $request)
    {
        $curso = new Curso();
        $curso->titulo = $request->titulo;
        $curso->descricao = $request->descricao;
        $curso->valor = $request->valor;
        $curso->publicado = $request->publicado ?? 'não';

        if ($request->hasFile('imagem')) {
            $file = $request->file('imagem');
            $path = $file->store('cursos', 'public');
            $curso->imagem = 'storage/' . $path;
        }

        $curso->save();
        return redirect()->route('admin.cursos');
    }

    public function editar($id)
    {
        $curso = Curso::find($id);
        return view('admin.cursos.adicionar', compact('curso'));
    }

    public function atualizar(Request $request, $id)
    {
        $curso = Curso::find($id);
        $curso->titulo = $request->titulo;
        $curso->descricao = $request->descricao;
        $curso->valor = $request->valor;
        $curso->publicado = $request->publicado ?? 'não';

        if ($request->hasFile('imagem')) {
            $file = $request->file('imagem');
            $path = $file->store('cursos', 'public');
            $curso->imagem = 'storage/' . $path;
        }

        $curso->save();
        return redirect()->route('admin.cursos');
    }

    public function excluir($id)
    {
        Curso::find($id)->delete();
        return redirect()->route('admin.cursos');
    }
}

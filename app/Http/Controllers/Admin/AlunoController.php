<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\Curso;

class AlunoController extends Controller
{
    public function index()
    {
        $rows = Aluno::all();
        return view('admin.alunos.index', compact('rows'));
    }

    public function adicionar()
    {
        $aluno = null;
        $cursos = Curso::all();
        return view('admin.alunos.adicionar', compact('aluno', 'cursos'));
    }

    public function salvar(Request $request)
    {
        $aluno = new Aluno();
        $aluno->nome = $request->nome;
        $aluno->celular = $request->celular;
        $aluno->id_curso = $request->id_curso;

        if ($request->hasFile('imagem')) {
            $file = $request->file('imagem');
            $path = $file->store('alunos', 'public');
            $aluno->imagem = 'storage/' . $path;
        }

        $aluno->save();
        return redirect()->route('admin.alunos');
    }

    public function editar($id)
    {
        $aluno = Aluno::find($id);
        $cursos = Curso::all();
        return view('admin.alunos.adicionar', compact('aluno', 'cursos'));
    }

    public function atualizar(Request $request, $id)
    {
        $aluno = Aluno::find($id);
        $aluno->nome = $request->nome;
        $aluno->celular = $request->celular;
        $aluno->id_curso = $request->id_curso;

        if ($request->hasFile('imagem')) {
            $file = $request->file('imagem');
            $path = $file->store('alunos', 'public');
            $aluno->imagem = 'storage/' . $path;
        }

        $aluno->save();
        return redirect()->route('admin.alunos');
    }

    public function excluir($id)
    {
        Aluno::find($id)->delete();
        return redirect()->route('admin.alunos');
    }
}

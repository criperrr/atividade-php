@extends('layout.site')

@section('titulo', $aluno ? 'Editar Aluno' : 'Adicionar Aluno')

@section('conteudo')
    <div class="container">
        <h1>{{ $aluno ? 'Editar Aluno' : 'Adicionar Novo Aluno' }}</h1>

        <div class="row">
            <div class="col s12 m8 offset-m2">
                <form method="POST"
                    action="{{ $aluno ? route('admin.alunos.atualizar', $aluno->id) : route('admin.alunos.salvar') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @if ($aluno)
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="nome" name="nome" class="validate"
                                value="{{ old('nome', $aluno->nome ?? '') }}" required />
                            <label for="nome">Nome</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input type="text" id="celular" name="celular" class="validate"
                                value="{{ old('celular', $aluno->celular ?? '') }}" required />
                            <label for="celular">Celular</label>
                        </div>

                        <div class="input-field col s12 m6">
                            <select id="id_curso" name="id_curso" required>
                                <option value="">Selecione um curso</option>
                                @foreach ($cursos as $curso)
                                    <option value="{{ $curso->id }}"
                                        {{ old('id_curso', $aluno->id_curso ?? '') == $curso->id ? 'selected' : '' }}>
                                        {{ $curso->titulo }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="id_curso">Curso</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="file-field input-field col s12">
                            <div class="btn deep-orange">
                                <span>Selecionar Imagem</span>
                                <input type="file" name="imagem" accept="image/*" />
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Escolha uma imagem" />
                            </div>
                        </div>
                    </div>

                    @if ($aluno && $aluno->imagem)
                        <div class="row">
                            <div class="col s12">
                                <p><strong>Imagem atual:</strong></p>
                                <img src="{{ asset($aluno->imagem) }}" alt="{{ $aluno->nome }}"
                                    style="max-width: 200px; height: auto;" />
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col s12">
                            <button class="btn blue" type="submit">{{ $aluno ? 'Atualizar' : 'Salvar' }}</button>
                            <a href="{{ route('admin.alunos') }}" class="btn gray">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.FormSelect.init(document.querySelectorAll('select'));
            M.textareaAutoResize(document.querySelectorAll('textarea'));
        });
    </script>
@endsection

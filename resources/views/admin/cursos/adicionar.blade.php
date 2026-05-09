@extends('layout.site')

@section('titulo', $curso ? 'Editar Curso' : 'Adicionar Curso')

@section('conteudo')
    <div class="container">
        <h1>{{ $curso ? 'Editar Curso' : 'Adicionar Novo Curso' }}</h1>

        <div class="row">
            <div class="col s12 m8 offset-m2">
                <form method="POST"
                    action="{{ $curso ? route('admin.cursos.atualizar', $curso->id) : route('admin.cursos.salvar') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @if ($curso)
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="titulo" name="titulo" class="validate"
                                value="{{ old('titulo', $curso->titulo ?? '') }}" required />
                            <label for="titulo">Título</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="descricao" name="descricao" class="materialize-textarea validate" required>{{ old('descricao', $curso->descricao ?? '') }}</textarea>
                            <label for="descricao">Descrição</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input type="number" id="valor" name="valor" class="validate" step="0.01"
                                value="{{ old('valor', $curso->valor ?? '') }}" required />
                            <label for="valor">Valor</label>
                        </div>

                        <div class="input-field col s12 m6">
                            <select id="publicado" name="publicado">
                                <option value="não"
                                    {{ old('publicado', $curso->publicado ?? 'não') === 'não' ? 'selected' : '' }}>Não
                                    Publicado</option>
                                <option value="sim"
                                    {{ old('publicado', $curso->publicado ?? 'não') === 'sim' ? 'selected' : '' }}>Publicado
                                </option>
                            </select>
                            <label for="publicado">Status</label>
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

                    @if ($curso && $curso->imagem)
                        <div class="row">
                            <div class="col s12">
                                <p><strong>Imagem atual:</strong></p>
                                <img src="{{ asset($curso->imagem) }}" alt="{{ $curso->titulo }}"
                                    style="max-width: 200px; height: auto;" />
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col s12">
                            <button class="btn blue" type="submit">{{ $curso ? 'Atualizar' : 'Salvar' }}</button>
                            <a href="{{ route('admin.cursos') }}" class="btn gray">Cancelar</a>
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

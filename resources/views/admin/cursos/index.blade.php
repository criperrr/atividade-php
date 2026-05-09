@extends('layout.site')

@section('titulo', 'Cursos')

@section('conteudo')
    <div class="container">
        <h1>Lista de Cursos</h1>

        <div class="row">
            <div class="col s12">
                <table class="striped responsive-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Publicado</th>
                            <th>Valor</th>
                            <th>Imagem</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->titulo }}</td>
                                <td>{{ $row->descricao }}</td>
                                <td>{{ $row->publicado }}</td>
                                <td>{{ $row->valor }}</td>
                                <td>
                                    <img src="{{ asset($row->imagem) }}" alt="{{ $row->titulo }}"
                                        style="max-width: 120px; height: auto;" />
                                </td>
                                <td>
                                    <a class="btn deep-orange" href="{{ route('admin.cursos.editar', $row->id) }}">Alterar</a>
                                    <a class="btn rede" href="{{ route('admin.cursos.excluir', $row->id) }}">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <a class="btn blue" href="{{ route('admin.cursos.adicionar') }}">Adicionar</a>
        </div>
    </div>
@endsection

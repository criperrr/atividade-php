@extends('layout.site')

@section('titulo', 'Alunos')

@section('conteudo')
    <div class="container">
        <h1>Lista de Alunos</h1>

        <div class="row">
            <div class="col s12">
                <table class="striped responsive-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Celular</th>
                            <th>Curso</th>
                            <th>Imagem</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->nome }}</td>
                                <td>{{ $row->celular }}</td>
                                <td>{{ $row->curso->titulo }}</td>
                                <td>
                                    @if ($row->imagem)
                                        <img src="{{ asset($row->imagem) }}" alt="{{ $row->nome }}"
                                            style="max-width: 120px; height: auto;" />
                                    @else
                                        <span class="grey-text">Sem imagem</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn deep-orange" href="{{ route('admin.alunos.editar', $row->id) }}">Alterar</a>
                                    <a class="btn red" href="{{ route('admin.alunos.excluir', $row->id) }}">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <a class="btn blue" href="{{ route('admin.alunos.adicionar') }}">Adicionar</a>
        </div>
    </div>
@endsection

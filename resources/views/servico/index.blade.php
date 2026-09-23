@extends('layouts.app')
@section('title', 'Serviços')
@section('content')
<h2>Serviços</h2>
<a href="/servicos/create" class="btn btn-success mb-3">Novo Serviço</a>
<table class="table table-hover table-striped">
    <thead><tr><th>ID</th><th>Nome</th><th>Valor Base</th><th>Descrição</th><th>Ações</th></tr></thead>
    <tbody>
        @forelse($servicos as $s)
        <tr>
            <td>{{ $s->id_servico }}</td>
            <td>{{ $s->nome_servico }}</td>
            <td>R$ {{ number_format($s->valor_base, 2, ',', '.') }}</td>
            <td>{{ $s->descricao }}</td>
            <td class="d-flex gap-2">
                <a href="/servicos/{{ $s->id_servico }}/edit" class="btn btn-sm btn-warning">Editar</a>
                <form action="/servicos/{{ $s->id_servico }}" method="POST" onsubmit="return confirm('Excluir este serviço?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center">Nenhum serviço cadastrado.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
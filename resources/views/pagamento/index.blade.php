@extends('layouts.app')
@section('title', 'Pagamentos')
@section('content')
<h2>Pagamentos</h2>
<a href="/pagamentos/create" class="btn btn-success mb-3">Novo Pagamento</a>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Forma</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pagamentos as $p)
        <tr>
            <td>{{ $p->id_pagamento }}</td>
            <td>R$ {{ number_format($p->valor, 2, ',', '.') }}</td>
            <td>{{ $p->data_pagamento }}</td>
            <td>{{ $p->forma_pagamento }}</td>
            <td class="d-flex gap-2">
                <a href="/pagamentos/{{ $p->id_pagamento }}/edit" class="btn btn-sm btn-warning">Editar</a>
                <form action="/pagamentos/{{ $p->id_pagamento }}" method="POST" onsubmit="return confirm('Excluir este pagamento?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Nenhum pagamento cadastrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
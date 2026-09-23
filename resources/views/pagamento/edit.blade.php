@extends('layouts.app')
@section('title', 'Editar Pagamento')
@section('content')
<h2>Editar Pagamento</h2>
<form action="/pagamentos/{{ $pagamento->id_pagamento }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3"><label class="form-label">Valor</label><input type="number" step="0.01" name="valor" class="form-control" value="{{ $pagamento->valor }}" required></div>
    <div class="mb-3"><label class="form-label">Data do Pagamento</label><input type="date" name="data_pagamento" class="form-control" value="{{ $pagamento->data_pagamento }}"></div>
    <div class="mb-3"><label class="form-label">Forma de Pagamento</label>
        <select name="forma_pagamento" class="form-select">
            @foreach(['dinheiro','pix','cartao','boleto'] as $opcao)
                <option value="{{ $opcao }}" {{ $pagamento->forma_pagamento == $opcao ? 'selected' : '' }}>{{ ucfirst($opcao) }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-warning">Atualizar</button>
    <a href="/pagamentos" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
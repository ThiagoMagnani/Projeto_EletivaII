@extends('layouts.app')
@section('title', 'Editar Material')
@section('content')
<h2>Editar Material</h2>
<form action="/materiais/{{ $material->id_material }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label class="form-label">Agendamento</label>
        <select name="id_agendamento" class="form-select" required>
            @foreach($agendamentos as $ag)
            <option value="{{ $ag->id_agendamento }}" {{ $material->id_agendamento == $ag->id_agendamento ? 'selected' : '' }}>#{{ $ag->id_agendamento }} - {{ $ag->data }} {{ $ag->horario }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3"><label class="form-label">Nome do Arquivo</label><input type="text" name="nome_arquivo" class="form-control" value="{{ $material->nome_arquivo }}" required></div>
    <div class="mb-3"><label class="form-label">Tipo</label><input type="text" name="tipo" class="form-control" value="{{ $material->tipo }}"></div>
    <div class="mb-3"><label class="form-label">Data de Recebimento</label><input type="date" name="data_recebimento" class="form-control" value="{{ $material->data_recebimento }}"></div>
    <button class="btn btn-warning">Atualizar</button>
    <a href="/materiais" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
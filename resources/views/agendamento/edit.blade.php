@extends('layouts.app')
@section('title', 'Editar Agendamento')
@section('content')
<h2>Editar Agendamento #{{ $agendamento->id_agendamento }}</h2>
<form action="/agendamentos/{{ $agendamento->id_agendamento }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label class="form-label">Aluno</label>
        <select name="id_aluno" class="form-select" required>
            @foreach($alunos as $aluno)
            <option value="{{ $aluno->id_aluno }}" {{ $agendamento->id_aluno == $aluno->id_aluno ? 'selected' : '' }}>{{ $aluno->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Serviço</label>
        <select name="id_servico" class="form-select" required>
            @foreach($servicos as $servico)
            <option value="{{ $servico->id_servico }}" {{ $agendamento->id_servico == $servico->id_servico ? 'selected' : '' }}>{{ $servico->nome_servico }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Instituição</label>
        <select name="id_instituicao" class="form-select" required>
            @foreach($instituicoes as $instituicao)
            <option value="{{ $instituicao->id_instituicao }}" {{ $agendamento->id_instituicao == $instituicao->id_instituicao ? 'selected' : '' }}>{{ $instituicao->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Pagamento (opcional)</label>
        <select name="id_pagamento" class="form-select">
            <option value="">Nenhum</option>
            @foreach($pagamentos as $pagamento)
            <option value="{{ $pagamento->id_pagamento }}" {{ $agendamento->id_pagamento == $pagamento->id_pagamento ? 'selected' : '' }}>#{{ $pagamento->id_pagamento }} - R$ {{ $pagamento->valor }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3"><label class="form-label">Data</label><input type="date" name="data" class="form-control" value="{{ $agendamento->data }}" required></div>
    <div class="mb-3"><label class="form-label">Horário</label><input type="time" name="horario" class="form-control" value="{{ $agendamento->horario }}" required></div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
            @foreach(['pendente','confirmado','cancelado','concluido'] as $opcao)
            <option value="{{ $opcao }}" {{ $agendamento->status == $opcao ? 'selected' : '' }}>{{ ucfirst($opcao) }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-warning">Atualizar</button>
    <a href="/agendamentos" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
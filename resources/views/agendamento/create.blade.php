@extends('layouts.app')

@section('title', 'Novo Agendamento')

@section('content')

<h2>Novo Agendamento</h2>

<form action="/agendamentos" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Aluno</label>

        <div class="input-group">
            <select name="id_aluno" id="id_aluno" class="form-select" required>
                <option value="">Selecione...</option>

                @foreach($alunos as $aluno)
                <option value="{{ $aluno->id_aluno }}">
                    {{ $aluno->nome }}
                </option>
                @endforeach
            </select>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAluno">
                + Novo aluno
            </button>
        </div>
    </div>


    <div class="mb-3">
        <label class="form-label">Serviço</label>

        <div class="input-group">
            <select name="id_servico" id="id_servico" class="form-select" required>
                <option value="">Selecione...</option>

                @foreach($servicos as $servico)
                <option value="{{ $servico->id_servico }}">
                    {{ $servico->nome_servico }}
                </option>
                @endforeach
            </select>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalServico">
                + Novo serviço
            </button>
        </div>
    </div>


    <div class="mb-3">
        <label class="form-label">Instituição</label>

        <div class="input-group">
            <select name="id_instituicao" id="id_instituicao" class="form-select" required>
                <option value="">Selecione...</option>

                @foreach($instituicoes as $instituicao)
                <option value="{{ $instituicao->id_instituicao }}">
                    {{ $instituicao->nome }}
                </option>
                @endforeach
            </select>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalInstituicao">
                + Nova instituição
            </button>
        </div>
    </div>


    <div class="mb-3">
        <label class="form-label">Pagamento (opcional)</label>

        <div class="input-group">
            <select name="id_pagamento" id="id_pagamento" class="form-select">
                <option value="">Nenhum</option>

                @foreach($pagamentos as $pagamento)
                <option value="{{ $pagamento->id_pagamento }}">
                    #{{ $pagamento->id_pagamento }} - R$ {{ $pagamento->valor }}
                </option>
                @endforeach
            </select>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalPagamento">
                + Novo pagamento
            </button>
        </div>
    </div>


    <div class="mb-3">
        <label class="form-label">Data</label>
        <input type="date" name="data" class="form-control" required>
    </div>


    <div class="mb-3">
        <label class="form-label">Horário</label>
        <input type="time" name="horario" class="form-control" required>
    </div>


    <div class="mb-3">
        <label class="form-label">Status</label>

        <select name="status" class="form-select" required>
            <option value="pendente">Pendente</option>
            <option value="confirmado">Confirmado</option>
            <option value="cancelado">Cancelado</option>
            <option value="concluido">Concluído</option>
        </select>
    </div>


    <button class="btn btn-success">Salvar</button>
    <a href="/agendamentos" class="btn btn-secondary">Cancelar</a>

</form>


<!-- MODAL ALUNO -->

<div class="modal fade" id="modalAluno" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Novo Aluno</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="formAluno">

                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">CPF</label>
                        <input type="text" name="cpf" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telefone</label>
                        <input type="text" name="telefone" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-success">
                        Cadastrar aluno
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>


<!-- MODAL SERVIÇO -->

<div class="modal fade" id="modalServico" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Novo Serviço</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="formServico">

                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nome do Serviço</label>
                        <input type="text" name="nome_servico" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Valor Base</label>
                        <input type="number" step="0.01" name="valor_base" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao" class="form-control"></textarea>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-success">
                        Cadastrar serviço
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>


<!-- MODAL INSTITUIÇÃO -->

<div class="modal fade" id="modalInstituicao" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Nova Instituição</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="formInstituicao">

                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Endereço</label>
                        <input type="text" name="endereco" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contato</label>
                        <input type="text" name="contato" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-success">
                        Cadastrar instituição
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>


<!-- MODAL PAGAMENTO -->

<div class="modal fade" id="modalPagamento" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Novo Pagamento</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="formPagamento">

                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Valor</label>
                        <input type="number" step="0.01" name="valor" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data do Pagamento</label>
                        <input type="date" name="data_pagamento" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Forma de Pagamento</label>

                        <select name="forma_pagamento" class="form-select">

                            <option value="dinheiro">Dinheiro</option>
                            <option value="pix">Pix</option>
                            <option value="cartao">Cartão</option>
                            <option value="boleto">Boleto</option>

                        </select>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-success">
                        Cadastrar pagamento
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>


<script>
    async function cadastrar(url, formId, selectId, modalId, montarOpcao) {

        const form = document.getElementById(formId);

        form.addEventListener('submit', async function(event) {

            event.preventDefault();

            const dados = new FormData(form);

            const resposta = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: dados
            });

            const resultado = await resposta.json();

            if (resposta.ok) {

                const select = document.getElementById(selectId);

                const option = document.createElement('option');

                option.value = resultado.id;

                option.textContent = montarOpcao(resultado);

                option.selected = true;

                select.appendChild(option);

                form.reset();

                bootstrap.Modal.getInstance(
                    document.getElementById(modalId)
                ).hide();

            } else {

                alert(resultado.message ?? 'Não foi possível cadastrar.');

            }

        });

    }


    cadastrar(
        '/alunos',
        'formAluno',
        'id_aluno',
        'modalAluno',
        resultado => resultado.nome
    );


    cadastrar(
        '/servicos',
        'formServico',
        'id_servico',
        'modalServico',
        resultado => resultado.nome_servico
    );


    cadastrar(
        '/instituicoes',
        'formInstituicao',
        'id_instituicao',
        'modalInstituicao',
        resultado => resultado.nome
    );


    cadastrar(
        '/pagamentos',
        'formPagamento',
        'id_pagamento',
        'modalPagamento',
        resultado => '#' + resultado.id + ' - R$ ' + resultado.valor
    );
</script>

@endsection
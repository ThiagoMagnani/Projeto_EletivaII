<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function index()
    {
        return view('servico.index', ['servicos' => Servico::all()]);
    }

    public function create()
    {
        return view('servico.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_servico' => 'required|string|max:100',
            'valor_base' => 'required|numeric',
            'descricao' => 'nullable|string',
        ]);

        $servico = Servico::create($request->all());

        if ($request->expectsJson()) {
            return response()->json([
                'id' => $servico->id_servico,
                'nome_servico' => $servico->nome_servico
            ]);
        }

        return redirect()
            ->route('servicos.index')
            ->with('mensagem', 'Serviço cadastrado com sucesso!');
    }

    public function edit(string $id)
    {
        return view('servico.edit', ['servico' => Servico::findOrFail($id)]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome_servico' => 'required|string|max:100',
            'valor_base' => 'required|numeric',
            'descricao' => 'nullable|string',
        ]);

        Servico::findOrFail($id)->update($request->all());
        return redirect()->route('servicos.index')->with('mensagem', 'Serviço atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        Servico::findOrFail($id)->delete();
        return redirect()->route('servicos.index')->with('mensagem', 'Serviço excluído!');
    }
}

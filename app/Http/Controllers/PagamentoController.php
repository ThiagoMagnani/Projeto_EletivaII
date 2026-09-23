<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function index()
    {
        return view('pagamento.index', ['pagamentos' => Pagamento::all()]);
    }

    public function create()
    {
        return view('pagamento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'valor' => 'required|numeric',
            'data_pagamento' => 'nullable|date',
            'forma_pagamento' => 'nullable|string|max:50',
        ]);

        $pagamento = Pagamento::create($request->all());

        if ($request->expectsJson()) {
            return response()->json([
                'id' => $pagamento->id_pagamento,
                'valor' => number_format($pagamento->valor, 2, ',', '.')
            ]);
        }

        return redirect()
            ->route('pagamentos.index')
            ->with('mensagem', 'Pagamento cadastrado com sucesso!');
    }

    public function edit(string $id)
    {
        return view('pagamento.edit', ['pagamento' => Pagamento::findOrFail($id)]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'valor' => 'required|numeric',
            'data_pagamento' => 'nullable|date',
            'forma_pagamento' => 'nullable|string|max:50',
        ]);

        Pagamento::findOrFail($id)->update($request->all());
        return redirect()->route('pagamentos.index')->with('mensagem', 'Pagamento atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        Pagamento::findOrFail($id)->delete();
        return redirect()->route('pagamentos.index')->with('mensagem', 'Pagamento excluído!');
    }
}

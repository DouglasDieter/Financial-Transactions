<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
{
    try {
        $transactions = Transaction::all(); // Carrega todas as transações
        if ($transactions->isEmpty()) {
            return response()->json(['message' => 'Nenhuma transação encontrada'], 200);
        }
        return response()->json($transactions, 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'descricao' => 'required|string|max:255',
            'tipo' => 'required|in:receita,despesa',
            'valor' => 'required|numeric|min:0',
            'categoria' => 'required|string|max:255',
            'data' => 'required|date',  // Validação para a coluna 'data'
        ]);

        // Criar a transação validada
        $transaction = Transaction::create($validated);

        // Retornar a transação criada com o status 201 (Criado)
        return response()->json($transaction, 201);
    }

    public function show($id)
    {
        return response()->json(Transaction::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());
        return response()->json($transaction);
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return response()->json(null, 204);
    }
}

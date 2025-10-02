<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index()
    {
        $credits = Credit::with('category', 'user')->get();
        return view('account.credit.index', compact('credits'));
    }

    public function create()
    {
        return view('account.credit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nominal' => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories_credit,id',
            'credit_date' => 'required|date',
        ]);

        Credit::create([
            'nominal' => $request->nominal,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'credit_date' => $request->credit_date,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('credit.index')->with('success', 'Data Uang Masuk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $credit = Credit::findOrFail($id);
        return view('account.credit.edit', compact('credit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nominal' => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories_credit,id',
            'credit_date' => 'required|date',
        ]);

        $credit = Credit::findOrFail($id);
        $credit->update([
            'nominal' => $request->nominal,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'credit_date' => $request->credit_date,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('credit.index')->with('success', 'Data Uang Masuk berhasil diupdate');
    }

    public function destroy($id)
    {
        $credit = Credit::findOrFail($id);
        $credit->delete();

        return redirect()->route('credit.index')->with('success', 'Data Uang Masuk berhasil dihapus');
    }
}

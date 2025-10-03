<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\CategoriesCredit;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index()
    {
        $credits = Credit::with('category')->where('user_id', auth()->id())->latest()->get();
        return view('account.credit.index', compact('credits'));
    }

    public function create()
    {
        // Ambil semua kategori milik user yg login
        $categories = CategoriesCredit::where('user_id', auth()->id())->get();

        return view('account.credit.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'credit_date' => 'required|date',
            'amount'      => 'required|numeric',
            'category_id' => 'required|exists:categories_credit,id',
        ]);

        Credit::create([
            'credit_date' => $request->credit_date,
            'amount'      => $request->amount,
            'category_id' => $request->category_id,
            'user_id'     => auth()->id(),
        ]);

        return redirect()->route('credit.index')
            ->with('success', 'Data kredit berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $credit = Credit::where('user_id', auth()->id())->findOrFail($id);
        $categories = CategoriesCredit::where('user_id', auth()->id())->get();

        return view('account.credit.edit', compact('credit', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'credit_date' => 'required|date',
            'amount'      => 'required|numeric',
            'category_id' => 'required|exists:categories_credit,id',
        ]);

        $credit = Credit::where('user_id', auth()->id())->findOrFail($id);

        $credit->update([
            'credit_date' => $request->credit_date,
            'amount'      => $request->amount,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('credit.index')
            ->with('success', 'Data kredit berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $credit = Credit::where('user_id', auth()->id())->findOrFail($id);
        $credit->delete();

        return redirect()->route('credit.index')
            ->with('success', 'Data kredit berhasil dihapus!');
    }
}

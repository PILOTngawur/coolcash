<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\CategoriesCredit;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    /**
     * Tampilkan semua data Uang Masuk
     */
    public function index()
    {
        // Ambil semua data dengan relasi user & kategori
        $credits = Credit::with('category', 'user')->latest()->get();
        return view('account.credit.index', compact('credits'));
    }

    /**
     * Form tambah data Uang Masuk
     */
    public function create()
    {
        $categories = CategoriesCredit::all();
        return view('account.credit.create', compact('categories'));
    }

    /**
     * Simpan data baru Uang Masuk
     */
    public function store(Request $request)
    {
        $request->validate([
            'nominal'     => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories_credit,id',
            'credit_date' => 'required|date',
        ]);

        Credit::create([
            'nominal'     => $request->nominal,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'credit_date' => $request->credit_date,
            'user_id'     => auth()->id(),
        ]);

        return redirect()->route('credit.index')->with('success', 'Data Uang Masuk berhasil ditambahkan');
    }

    /**
     * Form edit data Uang Masuk
     */
    public function edit($id)
    {
        $credit     = Credit::findOrFail($id);
        $categories = CategoriesCredit::all();
        return view('account.credit.edit', compact('credit', 'categories'));
    }

    /**
     * Update data Uang Masuk
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nominal'     => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories_credit,id',
            'credit_date' => 'required|date',
        ]);

        $credit = Credit::findOrFail($id);
        $credit->update([
            'nominal'     => $request->nominal,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'credit_date' => $request->credit_date,
            'user_id'     => auth()->id(),
        ]);

        return redirect()->route('credit.index')->with('success', 'Data Uang Masuk berhasil diupdate');
    }

    /**
     * Hapus data Uang Masuk
     */
    public function destroy($id)
    {
        $credit = Credit::findOrFail($id);
        $credit->delete();

        return redirect()->route('credit.index')->with('success', 'Data Uang Masuk berhasil dihapus');
    }
}

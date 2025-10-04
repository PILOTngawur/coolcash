<?php

namespace App\Http\Controllers;

use App\Models\CategoriesDebits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesDebitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Tampilkan daftar kategori debit.
     */
    public function index(Request $request)
    {
        $query = CategoriesDebits::where('user_id', auth()->id());
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $categories = $query->orderBy('created_at', 'desc')->paginate(5);
    
        return view('account.categories_debit.index', compact('categories'));
    }
    
    /**
     * Form tambah kategori debit.
     */
    public function create()
    {
        return view('account.categories_debit.create');
    }

    /**
     * Simpan kategori baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ], [
            'name.required' => 'Masukkan Nama Kategori!'
        ]);

        CategoriesDebits::create([
            'user_id' => auth()->id(),
            'name'    => $request->name,
        ]);

        return redirect()->route('categories_debit.index')
            ->with('success', 'Kategori Uang Keluar berhasil ditambahkan');
    }

    /**
     * Form edit kategori debit.
     */
    public function edit($id)
    {
        $category = CategoriesDebits::where('user_id', auth()->id())->findOrFail($id);
        return view('account.categories_debit.edit', compact('category'));
    }

    /**
     * Update kategori debit.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string'
        ], [
            'name.required' => 'Masukkan Nama Kategori!'
        ]);

        $category = CategoriesDebits::where('user_id', auth()->id())->findOrFail($id);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories_debit.index')
            ->with('success', 'Kategori Uang Keluar berhasil diperbarui');
    }

    /**
     * Hapus kategori debit.
     */
    public function destroy($id)
    {
        $category = CategoriesDebits::where('user_id', auth()->id())->findOrFail($id);
        $category->delete();

        return redirect()->route('categories_debit.index')
            ->with('success', 'Kategori Uang Keluar berhasil dihapus');
    }
}

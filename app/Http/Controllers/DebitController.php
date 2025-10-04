<?php

namespace App\Http\Controllers;

use App\Models\Debits;
use App\Models\CategoriesDebits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DebitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Tampilkan semua data debit milik user
     */
    public function index(Request $request)
    {
        $query = Debits::with('category')
            ->where('user_id', Auth::id())
            ->latest();

        // kalau ada parameter "search", filter berdasarkan kategori
        if ($request->filled('search')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%');
            });
        }

        $debit = $query->paginate(5);

        return view('account.debit.index', compact('debit'));
    }


    /**
     * Form tambah data
     */
    public function create()
    {
        $categories = CategoriesDebits::where('user_id', Auth::id())->get();
        return view('account.debit.create', compact('categories'));
    }

    /**
     * Simpan data baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nominal' => 'required',
            'debit_date' => 'required|date',
            'category_id' => 'required',
            'description' => 'required'
        ], [
            'nominal.required' => 'Masukkan Nominal Debit / Uang Masuk!',
            'debit_date.required' => 'Silahkan Pilih Tanggal!',
            'category_id.required' => 'Silahkan Pilih Kategori!',
            'description.required' => 'Masukkan Keterangan!',
        ]);

        $save = Debits::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'debit_date' => $request->debit_date,
            'nominal' => str_replace(',', '', $request->nominal),
            'description' => $request->description,
        ]);

        return redirect()->route('debit.index')
            ->with($save ? ['success' => 'Data Berhasil Disimpan!'] : ['error' => 'Data Gagal Disimpan!']);
    }

    /**
     * Form edit data
     */
    public function edit(Debits $debit)
    {
        $categories = CategoriesDebits::where('user_id', Auth::id())->get();
        return view('account.debit.edit', compact('debit', 'categories'));
    }

    /**
     * Update data
     */
    public function update(Request $request, Debits $debit)
    {
        $request->validate([
            'nominal' => 'required',
            'debit_date' => 'required|date',
            'category_id' => 'required',
            'description' => 'required'
        ], [
            'nominal.required' => 'Masukkan Nominal Debit / Uang Masuk!',
            'debit_date.required' => 'Silahkan Pilih Tanggal!',
            'category_id.required' => 'Silahkan Pilih Kategori!',
            'description.required' => 'Masukkan Keterangan!',
        ]);

        $updated = $debit->update([
            'category_id' => $request->category_id,
            'debit_date' => $request->debit_date,
            'nominal' => str_replace(',', '', $request->nominal),
            'description' => $request->description,
        ]);

        return redirect()->route('debit.index')
            ->with($updated ? ['success' => 'Data Berhasil Diupdate!'] : ['error' => 'Data Gagal Diupdate!']);
    }

    /**
     * Hapus data
     */
    public function destroy(Debits $debit)
    {
        $deleted = $debit->delete();

        return redirect()->route('debit.index')
            ->with($deleted ? ['success' => 'Data Berhasil Dihapus!'] : ['error' => 'Data Gagal Dihapus!']);
    }
}

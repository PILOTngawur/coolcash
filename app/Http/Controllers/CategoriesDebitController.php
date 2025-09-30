<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesDebitController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = CategoriesDebit::create($validated);

        return response()->json(['message' => 'Kategori berhasil ditambahkan', 'data' => $category]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = CategoriesDebit::findOrFail($id);
        $category->update($validated);

        return response()->json(['message' => 'Kategori berhasil diupdate', 'data' => $category]);
    }

    public function destroy($id)
    {
        $category = CategoriesDebit::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('account.categories_debit.index');
    }

}
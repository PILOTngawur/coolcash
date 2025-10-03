<?php

namespace App\Http\Controllers;

use App\Models\CategoriesCredit;
use Illuminate\Http\Request;

class CategoriesCreditController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $categories = CategoriesCredit::where('user_id', auth()->id())
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->get();

        return view('account.categories_credit.index', compact('categories'));
    }

    public function create()
    {
        return view('account.categories_credit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        CategoriesCredit::create([
            'name'    => $request->name,
            'user_id' => auth()->id(),
        ]);

        // Pakai session flash, biar SweetAlert jalan di blade
        return redirect()->route('categories_credit.index')
                         ->with('success', 'Kategori Uang Masuk berhasil ditambahkan ✅');
    }

    public function edit($id)
    {
        $category = CategoriesCredit::findOrFail($id);
        return view('account.categories_credit.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = CategoriesCredit::findOrFail($id);
        $category->update([
            'name'    => $request->name,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('categories_credit.index')
                         ->with('success', 'Kategori Uang Masuk berhasil diupdate ✅');
    }

    public function destroy($id)
    {
        $category = CategoriesCredit::findOrFail($id);
        $category->delete();

        return redirect()->route('categories_credit.index')
                         ->with('success', 'Kategori Uang Masuk berhasil dihapus ❌');
    }
}

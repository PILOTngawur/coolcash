<?php

namespace App\Http\Controllers;

use App\Models\CategoriesCredit;
use Illuminate\Http\Request;

class CategoriesCreditController extends Controller
{
    public function index()
    {
        $categories = CategoriesCredit::where('user_id', auth()->id())->get();
        return view('account.categories_credit.index', compact('categories'));
    }

    public function create()
    {
        return view('account.categories_credit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        CategoriesCredit::create([
            'name'    => $request->name,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('categories_credit.index')
                         ->with('success', 'Kategori Uang Masuk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $category = CategoriesCredit::where('user_id', auth()->id())->findOrFail($id);
        return view('account.categories_credit.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $category = CategoriesCredit::where('user_id', auth()->id())->findOrFail($id);

        $category->update([
            'name'    => $request->name,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('categories_credit.index')
                         ->with('success', 'Kategori Uang Masuk berhasil diupdate');
    }

    public function destroy($id)
    {
        $category = CategoriesCredit::where('user_id', auth()->id())->findOrFail($id);
        $category->delete();

        return redirect()->route('categories_credit.index')
                         ->with('success', 'Kategori Uang Masuk berhasil dihapus');
    }
}

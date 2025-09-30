<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DebitController extends Controller
{
  public function index()
{
    $debits = Debit::with('category')->get();
    $categories = CategoriesDebit::all();
    return view('debits.index', compact('debits', 'categories'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories_out,id',
            'nominal' => 'required|numeric',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $data = UangKeluar::create($validated);
        return response()->json($data, 201);
    }

    public function show($id)
    {
        return response()->json(UangKeluar::with('category')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $data = UangKeluar::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories_out,id',
            'nominal' => 'required|numeric',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $data->update($validated);
        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = UangKeluar::findOrFail($id);
        $data->delete();
        return response()->json(null, 204);
    }
}
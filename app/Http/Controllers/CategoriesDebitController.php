<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoriesDebits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesDebitController extends Controller
{
    /**
     * CategoriesDebitController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoriesDebits::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('account.categories_debit.index', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $search = $request->get('q');
        $categories = CategoriesDebits::where('user_id', Auth::user()->id)
            ->where('name', 'LIKE', '%' .$search. '%')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('account.categories_debit.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.categories_debit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //set validasi required
        $this->validate($request, [
            'name'  => 'required'
        ],
            //set message validation
            [
                'name.required' => 'Masukkan Nama Kategori!',
            ]
        );

        //Eloquent simpan data
        $save = CategoriesDebits::create([
            'user_id'       => Auth::user()->id,
            'name'          => $request->input('name')
        ]);
        //cek apakah data berhasil disimpan
        if($save){
            //redirect dengan pesan sukses
            return redirect()->route('categories_debit.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('categories_debit.index')->with(['error' => 'Data Gagal Disimpan!']);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CategoriesDebits $categoriesDebit)
    {
        return view('account.categories_debit.edit', compact('categoriesDebit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriesDebits $categoriesDebit)
    {
        //set validasi required
        $this->validate($request, [
            'name'  => 'required'
        ],
            //set message validation
            [
                'name.required' => 'Masukkan Nama Kategori !',
            ]
        );

        //Eloquent simpan data
        $update = CategoriesDebits::whereId($categoriesDebit->id)->update([
            'user_id'       => Auth::user()->id,
            'name'          => $request->input('name')
        ]);
        //cek apakah data berhasil disimpan
        if($update){
            //redirect dengan pesan sukses
            return redirect()->route('categories_debit.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('categories_debit.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = CategoriesDebits::find($id)->delete($id);

        if($delete){
            return redirect()->route('categories_debit.index')->with(['success' => 'Data Berhasil Dihapus']);
        }else{
            return redirect()->route('categories_debit.index')->with(['error' => 'Data gagal Dihapus']);
        }
    }
}
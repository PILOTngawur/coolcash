<?php

namespace App\Http\Controllers;

use App\Model\Debits;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $total_pengeluaran = DB::table('debit')
            ->where('user_id', Auth::user()->id)
            ->sum('nominal');

        $total_pemasukan = DB::table('credit')
            ->where('user_id', Auth::user()->id)
            ->sum('nominal');

        $total_saldo = $total_pemasukan - $total_pengeluaran;

        return view('account.dashboard.index', compact('total_saldo', 'total_pengeluaran'));
    }
}

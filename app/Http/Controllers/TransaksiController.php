<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;



class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::where('user_id', auth()->user()->id)->latest()->get();

        return view('view_transaksi', compact('transaksi'));

    }
    
    public function buy($id)
    {
        $transaksi = new Transaksi;
        $transaksi->user_id = Auth::id();
        $transaksi->barang_id = $id;
        $transaksi->save();

        return redirect()->back()->with('sukses','Barang Berhasil di-Beli');

    }
}

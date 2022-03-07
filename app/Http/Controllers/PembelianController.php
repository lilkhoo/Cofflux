<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Pegawai;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\CarbonTimeZone;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('transaksi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create', [
            'menus' => Menu::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            // 'nama_pelanggan' => 'required|max:100',
            'menu_id' => 'required',
            'jumlah' => 'required',
        ]);

        $validatedData['tgl_transaksi'] = date('Y-m-d');

        $validatedData['user_id'] = Auth::user()->id;
        // $validatedData['pembuat'] = $pegawai->pembuat;
        $validatedData['total'] = Menu::find($request->menu_id)->harga * $request->jumlah;

        $transaksi = Transaksi::create($validatedData);

        return redirect('/transaksi/' . $transaksi->id)->with('success', 'Pembelian Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('transaksi.struk', [
        //     'transaksi' => Transaksi::find($id)
        // ]);

        $pdf = PDF::loadView('transaksi.struk', [
            'transaksi' => Transaksi::find($id)
        ]);
        return $pdf->stream('struk.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Transaksi::all();
        return view('dashboardAdmin.transaksis.index', [
            'transaksis' => Transaksi::latest()->filter(request(['tgl_transaksi']))->get(),
            'dates' => Transaksi::latest()->get()->pluck('tgl_transaksi')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        $pdf = PDF::loadView('dashboardAdmin.transaksis.laporan', [
            'transaksi' => Transaksi::latest()->get()
        ]);
        return $pdf->download('laporan.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function exportPDF($tgl_transaksi)
    {
        // return 'Oke';

        if ($tgl_transaksi === 'all') {
            $transaksis =  Transaksi::latest()->get();
        } else {
            $transaksis = Transaksi::latest()->filter(['tgl_transaksi' => $tgl_transaksi])->get();
        }
        $pdf = PDF::loadView('dashboardAdmin.transaksis.laporan', [
            'transaksis' => $transaksis
        ]);
        return $pdf->stream('laporan.pdf');
    }
}

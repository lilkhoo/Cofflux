@extends('dashboardAdmin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Transaksi</h1>

        @if (Auth::user()->roles !== 'kasir')
            {{-- Akan dipakai Buat Export ke PDF (udah Jadi) --}}
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="/laporan/transaksi/{{ request('tgl_transaksi') ?? 'all' }}"
                    class="btn btn-sm btn-outline-secondary me-1" target="_blank">Export</a>

                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Sort Data
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="/dashboard/transaksis">All</a>
                        </li>
                        @foreach ($dates as $date)
                            <li><a class="dropdown-item" href="?tgl_transaksi={{ $date }}">{{ $date }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>

    {{-- Alerts Untuk Konfirmasi Data Berhasil --}}
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif


    {{-- Table data Users --}}
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Pembuat</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaksi->user->name }}</td>
                        <td>{{ $transaksi->menu->pegawai->pembuat }}</td>
                        <td>{{ $transaksi->menu->namamenu }}</td>
                        <td>{{ $transaksi->jumlah }}</td>
                        <td>{{ $transaksi->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

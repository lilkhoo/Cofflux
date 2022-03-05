@extends('dashboardAdmin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Menus </h1>

        {{-- Akan dipakai Buat Export ke PDF (Kalo Jadi) --}}
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>

            {{-- Akan Dijalankan Untuk Sort Data Dari Tanggal / Created at (Kalo Jadi) --}}
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="clipboard"></span>
                This week
            </button>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif


    {{-- Table data Menus --}}
    <div class="table-responsive">
        <a href="/dashboard/menus/create" class="btn btn-primary mn-3">Add Menu</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Category</th>
                    {{-- <th scope="col">Deskripsi</th> --}}
                    <th scope="col">Harga</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $menu->namamenu }}</td>
                        <td>{{ $menu->category->name }}</td>
                        {{-- <td>{!! $menu->deskripsi !!}</td> --}}
                        <td>{{ $menu->harga }}</td>
                        <td>{{ $menu->ketersediaan }}</td>
                        <td>
                            <a href="/dashboard/menus/{{ $menu->slug }}/edit" class="badge bg-info"><i
                                    class="bi bi-pencil-square"></i></a>
                            <a href="/dashboard/menus/{{ $menu->slug }}" class="badge bg-warning"><i
                                    class="bi bi-eye-fill"></i></a>
                            <form action="/dashboard/menus/{{ $menu->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf

                                <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure ?')"><i
                                        class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

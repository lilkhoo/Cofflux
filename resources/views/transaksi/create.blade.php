@extends('layouts.buy')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Beli</h1>
    </div>


    {{-- Form Create --}}
    <div class="col-lg-8">

        <form action="{{ route('transaksi.store') }}" method="post">
            @csrf

            {{-- <div class="mb-3">
                <label for="nama_pelanggan" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror" id="nama_pelanggan" name="nama_pelanggan"
                    value="{{ old('nama_pelanggan') }}" required autofocus>
                @error('nama_pelanggan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            <div class="mb-3">
                <label for="menu_id" class="form-label">Nama Menu</label>
                <select class="form-select @error('menu_id') is-invalid @enderror" name="menu_id">
                    @foreach ($menus as $menu)
                        @if (old('menu_id') == $menu->id)
                            <option value="{{ $menu->id }}" selected>{{ $menu->namamenu }}</option>
                        @else
                            <option value="{{ $menu->id }}">{{ $menu->namamenu }}</option>
                        @endif
                    @endforeach
                </select>
                @error('menu_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah"
                    value="{{ old('jumlah') }}" required>
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Beli</button>
        </form>

    </div>
@endsection

@extends('layouts.main')


@section('container')
    <h1 class="mb-5 text-center ">Halaman Menu's</h1>

    {{-- Search Bar --}}

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/menus">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('pegawai'))
                    <input type="hidden" name="pegawai" value="{{ request('pegawai') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Menu..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($menus->count())
        {{-- Card Hero --}}
        <div class="card mb-3">
            @if ($menus[0]->image)
                <img src="{{ asset('storage/' . $menus[0]->image) }}" alt="{{ $menus[0]->category->name }}"
                    class="img-fluid">
            @else
                <img src="https://source.unsplash.com/1200x400/?{{ $menus[0]->category->name }}" class="card-img-top"
                    alt="{{ $menus[0]->category->name }}">
            @endif

            <div class="card-body text-center">
                <h3 class="card-title"><a href="/menus/{{ $menus[0]->slug }}"
                        class="text-decoration-none text-dark">{{ $menus[0]->namamenu }}</a></h3>
                <p>Made By : <a href="/barista/{{ $menus[0]->pegawai->username }}"
                        class="text-decoration-none text-dark">{{ $menus[0]->pegawai->pembuat }}</a> in <a
                        href="/menus?category={{ $menus[0]->category->slug }}"
                        class="text-decoration-none">{{ $menus[0]->category->name }}</a></p>
                <p class="card-text">Rp. {{ $menus[0]->harga }}</p>
                <p class="card-text">{!! $menus[0]->deskripsi !!}</p>
                <p class="card-text"><small class="text-muted">Menu Creation Estimate : 10 Minutes</small></p>
                {{-- <a href="/transaksi/{{ $menus[0]->slug }}/create" class="btn btn-primary mb-2">Pesan</a> --}}
            </div>
        </div>





        {{-- Child Card --}}
        <div class="container">
            <div class="row">
                @foreach ($menus->skip(1) as $menu)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute px-3 text-white" style="background-color: rgba(0, 0, 0, 0.5)">
                                <a href="/menus?category={{ $menu->category->slug }}"
                                    class="text-decoration-none text-white">
                                    {{ $menu->category->name }}
                                </a>
                            </div>
                            @if ($menu->image)
                                <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->category->name }}"
                                    class="img-fluid">
                            @else
                                <img src="https://source.unsplash.com/500x350/?{{ $menu->category->name }}"
                                    class="card-img-top" alt={{ $menu->category->name }}>
                            @endif

                            <h5 class="card-title"><a href="/menus/{{ $menu->slug }}"
                                    class="text-decoration-none text-dark">{{ $menu->namamenu }}</a></h5>

                            <p>Made By : <a href="/barista/{{ $menu->pegawai->username }}"
                                    class="text-decoration-none text-dark">{{ $menu->pegawai->pembuat }}</a>
                            </p>

                            <small>Rp. {{ $menu->harga }}</small>

                            <p>{!! $menu->deskripsi !!}</p>

                            <p class="card-text"><small class="text-muted">Menu Creation Estimate : 10
                                    Minutes</small>
                            </p>

                            {{-- <a href="/transaksi/{{ $menu->slug }}/create" class="btn btn-primary mb-2">Pesan</a> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">Menu Not Available</p>
    @endif

    {{-- Pagination --}}
    <div class="d-flex justify-content-end">
        {{ $menus->links() }}
    </div>
@endsection

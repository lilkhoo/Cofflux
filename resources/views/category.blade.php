@extends('layouts.main')


@section('container')
    <h1 class="mb-5">Category : {{ $category }}</h1>


    @foreach ($menus as $menu)
        {{-- @dd($menu) --}}
        <article class="mb-5 border-bottom">
            <h2>
                <a href="/menus/{{ $menu->slug }}" class="text-decoration-none">{{ $menu->namamenu }}</a>
            </h2>

            <p>Made By : <a href="/barista/{{ $menu->pegawai->username }}"
                class="text-decoration-none">{{ $menu->pegawai->pembuat }}</a> in <a
                href="/categories/{{ $menu->category->slug }}"
                class="text-decoration-none">{{ $menu->category->name }}</a></p>

            <small class="my-3">Rp. {{ $menu->harga }}</small>

            <p>{{ $menu->deskripsi }}</p>

            <a href="" class="btn btn-primary mb-2">Pesan</a>
        </article>
    @endforeach
@endsection

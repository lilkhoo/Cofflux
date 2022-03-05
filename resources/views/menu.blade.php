{{-- @dd($menu) --}}
@extends("layouts.main")

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">{{ $menu->namamenu }}</h1>

                <p class="text-center">Made By : <a href="/barista/{{ $menu->pegawai->username }}"
                        class="text-decoration-none text-dark">{{ $menu->pegawai->pembuat }}</a> in <a
                        href="/menus?category={{ $menu->category->slug }}"
                        class="text-decoration-none">{{ $menu->category->name }}</a></p>

                @if ($menu->image)
                    <div>
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->category->name }}"
                            class="img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400/?{{ $menu->category->name }}"
                        alt="{{ $menu->category->name }}" class="img-fluid">
                @endif

                <article class="my-3">
                    <p>{!! $menu->deskripsi !!}</p>
                </article>

                <div class="container">
                    <div class="row mb-2">
                        <a href="" class="btn btn-primary mb-2">Pesan</a>
                    </div>
                </div>


                <a href="/menus" class="text-decoration-none">View All Menu's</a>
            </div>
        </div>
    </div>
@endsection

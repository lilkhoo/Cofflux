@extends('dashboardAdmin.layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-8">
                <h1 class="text-center">{{ $menu->namamenu }}</h1>

                <a href="" class="btn btn-warning"><i class="bi bi-pencil-square"></i>Edit</a>
                <a href="" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Delete</a>

                <p class="text-center">Made By : <a href="/barista/{{ $menu->pegawai->username }}"
                        class="text-decoration-none">{{ $menu->pegawai->pembuat }}</a> in <a
                        href="/menus?category={{ $menu->category->slug }}"
                        class="text-decoration-none">{{ $menu->category->name }}</a></p>

                <img src="https://source.unsplash.com/1200x400/?{{ $menu->category->name }}"
                    alt="{{ $menu->category->name }}" class="img-fluid">

                <article class="my-3">
                    <p>{!! $menu->deskripsi !!}</p>
                </article>

                <div class="container">
                    <div class="row mb-2">
                        <a href="" class="btn btn-primary mb-2">Pesan</a>
                        <a href="/dashboard/menus" class="btn btn-success">View All Menu's</a>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection

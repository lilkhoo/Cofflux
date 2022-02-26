@extends('dashboardAdmin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Menu </h1>
    </div>


    {{-- Form Create --}}
    <div class="col-lg-8">

        <form action="/dashboard/menus" method="post">
            @csrf

            <div class="mb-3">
                <label for="namamenu" class="form-label">Nama Menu</label>
                <input type="text" class="form-control @error('namamenu') is-invalid @enderror" id="namamenu" name="namamenu"
                    value="{{ old('namamenu') }}" required autofocus>
                @error('namamenu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{ old('slug') }}" required>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga"
                    value="{{ old('harga') }}" required>
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pegawai" class="form-label">Pegawai</label>
                <select class="form-select" name="pegawai_id">
                    @foreach ($pegawais as $pegawai)
                        @if (old('pegawai_id' == $pegawai->id))
                            <option value="{{ $pegawai->id }}" selected>{{ $pegawai->pembuat }}</option>
                        @else
                            <option value="{{ $pegawai->id }}">{{ $pegawai->pembuat }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id' == $category->id))
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                @error('deskripsi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
                <trix-editor input="deskripsi"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary">Add Menu</button>
        </form>

    </div>


    {{-- Masih Error --}}
    <script>
        const namamenu = document.querySelector('#namamenu');
        const slug = document.querySelector('#slug');

        namamenu.addEventListener('change', function() {
            fetch('/dashboard/menus/checkSlug?namamenu=' + namamenu.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endsection

@extends('dashboardAdmin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Users</h1>
    </div>

    {{-- Alerts Untuk Konfirmasi Data Berhasil --}}
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif


    {{-- Table data Users --}}
    <div class="table-responsive">
        <a href="/dashboard/users/create" class="btn btn-primary mn-3">Add Users</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles }}</td>
                        <td>
                            <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-info"><i
                                    class="bi bi-pencil-square"></i></a>

                            <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
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

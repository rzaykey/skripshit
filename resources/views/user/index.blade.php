@extends('layouts.admin')

@section('title')
    <title>List Customer</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Customer</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                List Customer
                                <div class="float-right">
                                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <form action="{{ route('user.cari') }}" method="get">
                                <div class="input-group mb-3 col-md-3 float-right">
                                    <input type="text" name="q" class="form-control" placeholder="Cari..." value="{{ old('cari') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button">Cari</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                            <th>Address</th>
<<<<<<< HEAD
                                            <th>Level</th>
                                            <th>Photo</th>
=======
                                            <th>Status</th>
>>>>>>> f7e58606a351aca8f0478ba57d32999b7e3809f3
                                            <th>Created at</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($user as $row)
                                        <tr>
                                        <td>
                                            <img src="{{ asset('users/' . $row->image) }}" width="100px" height="100px" alt="{{ $row->name }}">
                                        </td>
                                            <td><strong>{{ $row->name }}</strong></td>
                                            <td>{{ $row->email }}<br></td>
                                            <td>{{ $row->address }}<br></td>
                                            <td>{!! $row->status_label !!}</td>
                                            <td>{{ $row->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <form action="{{ route('user.destroy', $row->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('user.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <button onclick="return confirm('Hapus ?')" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

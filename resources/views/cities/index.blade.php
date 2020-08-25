@extends('layouts.admin')

@section('title')
    <title>List Kota</title>
@endsection

@section('content') 
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Kota</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Kota Baru</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('city.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="type">{{ __('type') }}</label>
                                        <select class="form-control" name="type">
                                            <option>--Pilih Jenis--</option>
                                            <option value="Kabupaten">Kabupaten</option>
                                            <option value="Kota">Kota</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="postal_code">Kode Pos</label>
                                    <input type="text" name="postal_code" class="form-control" required>
                                    <p class="text-danger">{{ $errors->first('postal_code') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="province_id">Provinsi</label>
                                    <select name="province_id" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($province as $row)
                                        <option value="{{ $row->id }}" {{ old('province_id') == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('province_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Kota</h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kota</th>
                                            <th>Jenis</th>
                                            <th>Kode Pos</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($city as $val)
                                        <tr>
                                            <td></td>
                                            <td>
                                                <strong>{{ $val->name }}</strong><br>
                                                <label>Provinsi: <span class="badge badge-info">{{ $val->province->name }}</span></label><br>
                                            </td>
                                            <td>{{ $val->type }}</td>
                                            <td>{{ $val->postal_code }}</td>
                                            <td>
                                                <form action="#" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            Halaman : {{ $city->currentPage() }} <br/>
	                        Jumlah Data : {{ $city->total() }} <br/>
	                        Data Per Halaman : {{ $city->perPage() }} <br/>
                            {!! $city->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

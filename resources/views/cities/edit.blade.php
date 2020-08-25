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
                            <h4 class="card-title">Edit</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('city.update', $city->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" value="{{ $city->name }}" required>
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
                                    <input type="text" name="postal_code" value="{{ $city->postal_code }}" class="form-control" required>
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
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

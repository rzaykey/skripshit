@extends('layouts.admin')

@section('title')
    <title>List Need Confirmed</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                List Need Confirmed
                            </h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <form action="{{ route('product.index') }}" method="get">
                                <div class="input-group mb-3 col-md-3 float-right">
                                    <input type="text" name="q" class="form-control" placeholder="Cari..." value="{{ request()->q }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button">Cari</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Customer</th>
                                            <th>Pembayaran</th>
                                            <th>Subtotal</th>
                                            <th>Kurir</th>
                                            <th>Ongkos Kirim</th>
                                            <th>Status</th>
                                            <th>Alamat Pengiriman</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $no => $datas)                                        
                                            <tr>
                                                <td>{{ $no+1 }}</td>
                                                <td>{{ strtoupper(App\User::find($datas->id_customer)->name) }}</td>
                                                <td>{{ $datas->payments }}</td>
                                                <td>Rp. {{ number_format($datas->subtotal) }}</td>
                                                <td>{{ strtoupper($datas->sent_by) }}</td>
                                                <td>Rp. {{ number_format($datas->shipping) }}</td>
                                                <td>{{ $datas->status }}</td>
                                                <td>{{ App\Customer::find($datas->id_customer)->address }}, {{ App\City::find($datas->to)->type }} {{ App\City::find($datas->to)->name }}, {{ App\City::find($datas->to)->postal_code }}, {{ App\Province::find(App\City::find($datas->to)->id)->name}}</td>
                                                <td><a class="btn btn-primary" href="{{ route('transaction.waitings', $datas->id) }}">Kirim</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $data->links()}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

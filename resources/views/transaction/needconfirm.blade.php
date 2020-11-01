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
                                                <td><a href="{{ route('transaction.confirm', $datas->id) }}" class="btn btn-success">Confirm</a> / <a href="{{ route('transaction.cancel', $datas->id) }}" onclick="return confirm('Cancel ? ') ">Cancel</a> / <a href="#"  data-toggle="modal" data-target="#exampleModalLong">Detail</a></td>
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

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Transaksi detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach($data as $datasa)
            @foreach(json_decode($datasa->data, true) as $product)
                <p>{{$product['product_name']}} x {{ $product['qty'] }} Rp. ({{number_format($product['product_price'])}})</p>
            @endforeach
            <p>Subtotal + Shipping: {{ number_format($datasa->subtotal + $datasa->shipping) }}</p>
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

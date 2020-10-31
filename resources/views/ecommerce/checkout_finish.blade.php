@extends('layouts.ecommerce')

@section('title')
    <title>Keranjang Belanja - Rupaka Store</title>
@endsection
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Pesanan Diterima</h2>
					<div class="page_link">
            <a href="{{ url('/') }}">Home</a>
						<a href="">Invoice</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Order Details Area =================-->
	<section class="order_details p_120">
		<div class="container">
		@if($msg = session('cancel'))
			<h3 class="title_confirmation" style="color: red">Pesanan anda telah dibatalkan.</h3>
		@else
		<h3 class="title_confirmation">Terima kasih, pesanan anda telah kami terima.</h3>
			<p>Berubah pikiran ? anda bisa membatalkan pesanan anda <a href="{{ route('cancel', $order->id) }}">klik</a></p>
		@endif
			<div class="row order_d_inner">
				<div class="col-lg-6">
					<div class="details_item">
						<h4>Informasi Pesanan</h4>
						<ul class="list">
							<li>
								<a href="#">
                  <span>Invoice</span> : INV-{{ md5($order->id) }}</a>
							</li>
							<li>
								<a href="#">
                  <span>Tanggal</span> : {{ date('d/m/Y', strtotime($order->created_at)) }} </a>
							</li>
							<li>
								<a href="#">
								  <span>Subtotal</span> : Rp {{ number_format($order->subtotal) }}
								</a>
							  </li>
							  <li>
								<a href="#">
								  <span>Pembayaran</span> : {{ $order->payments }}
								</a>
							  </li>
							  <li>
								<a href="#">
								  <span>Ongkos Kirim</span> : Rp {{ number_format($order->shipping) }}
								</a>
							  </li>
							  <li>
								<a href="#">
								  <span>Total</span> : Rp {{ number_format($order->subtotal + $order->shipping) }}
								</a>
							  </li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="details_item">
						<h4>Informasi Alamat</h4>
						<ul class="list">
						<li>
								<a href="#">
                  <span>Nama</span> : {{ Auth::user()->name }}</a>
							</li>
							<li>
								<a href="#">
                  <span>Alamat</span> : {{ Auth::user()->address }}</a>
							</li>
							<li>
								<a href="#">
								@php App\City::find(Auth::user()->city_id)->province_id @endphp
                  <span>Kota</span> : {{  App\City::find($order->to)->type }} {{ App\City::find($order->to)->name }}</a>
							</li>
							<li>
								<a href="#">
                  <span>Provinsi</span> : {{ App\Province::find(App\City::find(Auth::user()->city_id)->province_id)->name }}</a>
							</li>
							<li>
								<a href="#">
									<span>Country</span> : Indonesia</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="order_details p_120">
		<div class="container">
			<div class="row order_d_inner">
				<div class="col-lg-6">
					<div class="details_item">
						<h4>Informasi Barang</h4>
						<ul class="list">
						<li><a href="#">Produk: </a></li>
						<li><a href="#">Harga:</a></li>
						<li><a href="#">Kurir:</a></li>
						<li><a href="#">Subtotal:</a></li>
						<li><a href="#">Ongkos Kirim:</a></li>
						<li><a href="#">Total</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="details_item">
						<h4>Detail Pembelian</h4>
						<ul class="list">
						@foreach(json_decode($order->data, true) as $data)
							<span>{{ $data['product_name'].',' }}</span>
							<p>Rp. {{ number_format($data['product_price']) }}</p>
						@endforeach
						<p>{{ strtoupper($order->sent_by) }}</p>
						<p>Rp. {{ number_format($order->subtotal) }}</p>
						<p>Rp. {{ number_format($order->shipping) }} </p>
						<p>Rp. {{ number_format($order->subtotal + $order->shipping) }}</p>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
  <!--================End Order Details Area =================-->
    
@endsection
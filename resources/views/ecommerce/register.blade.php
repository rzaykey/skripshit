@extends('layouts.ecommerce')

@section('title')
    <title>Login - Rupaka Store</title>
@endsection

@section('content')
    <!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Login/Register</h2>
					<div class="page_link">
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{ route('customer.login') }}">Register</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Login Box Area =================-->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="offset-md-3 col-lg-6">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

					<div class="login_form_inner">
                        <h3>Log in to enter</h3>
                        <form class="row login_form" action="{{ route('customer.post_register') }}" method="post" id="contactForm" novalidate="novalidate">
							@csrf
							<div class="col-md-12 form-group">
								<input type="email"  class="form-control" id="email" name="email" placeholder="Email Address">
							</div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Your name">
							</div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Your Address">
							</div>
                            <div class="col-md-12 form-group">
								<select class="form-control" name="city" id="city">
                                    <option value="pilih">Select Your Cities</option>
                                    @foreach($city as $city_get)
                                        <option value="{{ $city_get['id'] }}">{{$city_get['type']}} {{ $city_get['name'] }}</option>
                                    @endforeach
                                </select>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="******">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="remember">
									
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Log In</button>
								<a href="{{ route('customer.login') }}">Already registered ?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection 
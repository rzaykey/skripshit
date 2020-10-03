

<?php $__env->startSection('title'); ?>
    <title>Checkout - Rupaka Store</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Informasi Pengiriman</h2>
					<div class="page_link">
            <a href="<?php echo e(url('/')); ?>">Home</a>
						<a href="#">Checkout</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Checkout Area =================-->
	<section class="checkout_area section_gap">
		<div class="container">
			<div class="billing_details">
				<div class="row">
					<div class="col-lg-8">
            <h3>Informasi Pengiriman</h3>          
              <?php if(session('error')): ?>
              error

              <?php endif; ?>
                        
              <form class="row contact_form" action="<?php echo e(route('front.store_checkout')); ?>" method="post" novalidate="novalidate">
                            <?php echo csrf_field(); ?>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" id="first" name="customer_name" required>

                            <p class="text-danger"><?php echo e($errors->first('customer_name')); ?></p>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <label for="">No Telp</label>
                            <input type="text" class="form-control" id="number" name="customer_phone" required>
                            <p class="text-danger"><?php echo e($errors->first('customer_phone')); ?></p>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <label for="">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                        </div>
                        
                        <div class="col-md-12 form-group p_star">
                            <label for="">Alamat Lengkap</label>
                            <input type="text" class="form-control" id="add1" name="customer_address" required>
                            <p class="text-danger"><?php echo e($errors->first('customer_address')); ?></p>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Propinsi</label>
                            <select class="form-control" name="province_id" id="province_id" required>
                                <option value="">Pilih Propinsi</option>
                                
                                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <p class="text-danger"><?php echo e($errors->first('province_id')); ?></p>
                        </div>
                
                        
                        <div class="col-md-12 form-group p_star">
                            <label for="">Kabupaten / Kota</label>
                            <select class="form-control" name="city_id" id="city_id" required>
                                <option value="">Pilih Kabupaten/Kota</option>
                            </select>
                            <p class="text-danger"><?php echo e($errors->first('city_id')); ?></p>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Kecamatan</label>
                            <select class="form-control" name="district_id" id="district_id" required>
                                <option value="">Pilih Kecamatan</option>
                            </select>
                            <p class="text-danger"><?php echo e($errors->first('district_id')); ?></p>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Kurir</label>
                            <input type="hidden" name="weight" id="weight" value="<?php echo e($weight); ?>">
                            <select class="form-control" name="courier" id="courier" required>
                                <option value="">Pilih Kurir</option>
                            </select>
                            <p class="text-danger"><?php echo e($errors->first('courier')); ?></p>
                        </div>
                        
                    
					</div>
					<div class="col-lg-4">
						<div class="order_box">
							<h2>Ringkasan Pesanan</h2>
							<ul class="list">
								<li>
									<a href="#">Product
										<span>Total</span>
									</a>
                </li>
                <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li>
									<a href="#"><?php echo e(\Str::limit($cart['product_name'], 10)); ?>

                    <span class="middle">x <?php echo e($cart['qty']); ?></span>
                    <span class="last">Rp <?php echo e(number_format($cart['product_price'])); ?></span>
									</a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
							<ul class="list list_2">
                                <li>
                                  <a href="#">Subtotal
                                    <span>Rp <?php echo e(number_format($subtotal)); ?></span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#">Pengiriman
                                    <span id="ongkir">Rp 0</span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#">Total
                                    <span id="total">Rp <?php echo e(number_format($subtotal)); ?></span>
                                  </a>
                                </li>
                              </ul>
              <button class="main_btn">Bayar Pesanan</button>
              </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Checkout Area =================-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        
        $('#province_id').on('change', function() {
            
            $.ajax({
                url: "<?php echo e(url('/api/city')); ?>",
                type: "GET",
                data: { province_id: $(this).val() },
                success: function(html){
                    
                    $('#city_id').empty()
                    
                    $('#city_id').append('<option value="">Pilih Kabupaten/Kota</option>')
                    $.each(html.data, function(key, item) {
                        $('#city_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                    })
                }
            });
        })


        $('#city_id').on('change', function() {
            $.ajax({
                url: "<?php echo e(url('/api/district')); ?>",
                type: "GET",
                data: { city_id: $(this).val() },
                success: function(html){
                    $('#district_id').empty()
                    $('#district_id').append('<option value="">Pilih Kecamatan</option>')
                    $.each(html.data, function(key, item) {
                        $('#district_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                    })
                }
            });
        })

            $('#district_id').on('change', function() {
            $('#courier').empty()
            $('#courier').append('<option value="">Loading...</option>')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('cost')); ?>",
                type: "POST",
                data: { 
                    _token: "<?php echo e(csrf_token()); ?>",
                    destination: $('#city_id').val(), 
                    weight: $('#weight').val() 
                    },
                success: function(html){
                    $.each(html.rajaongkir.results, (key, value) => {
                        $.each(value.costs, (key2, valu2) => {
                            $.each(valu2.cost, (key3, value3) => {
                            let courier = value.code + ' - ' + valu2.service + ' (Rp ' + value3.value + ' ) '
                            $('#courier').append('<option value='+ courier +'>' + courier + '</option>')
                            })
                        })
                    })
                },
                beforeSend: function(){
                    $('#courier').empty()
                }
            });
        })

        $('#courier').on('change', function() {
            let split = $(this).val().split('-')
            $('#ongkir').text('Rp ' + split[2])

            let subtotal = "<?php echo e($subtotal); ?>"
            let total = parseInt(subtotal) + parseInt(split['2'])
            $('#total').text('Rp' + total)
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ecommerce', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My Projects\perfect\skripshit\resources\views/ecommerce/checkout.blade.php ENDPATH**/ ?>
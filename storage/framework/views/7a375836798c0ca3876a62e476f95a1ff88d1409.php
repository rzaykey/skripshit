

<?php $__env->startSection('title'); ?>
    <title>Keranjang Belanja - Rupaka Store</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Keranjang Belanja</h2>
					<div class="page_link">
                        <a href="<?php echo e(url('/')); ?>">Home</a>
                        <a href="<?php echo e(route('front.list_cart')); ?>">Cart</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Cart Area =================-->
	<section class="cart_area">
		<div class="container">
			<div class="cart_inner">
                <form action="<?php echo e(route('front.update_cart')); ?>" method="post">
                    <?php echo csrf_field(); ?>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<tr>
								<td>
									<div class="media">
										<div class="d-flex">
                                            <img src="<?php echo e(asset('products/' . $row['product_image'])); ?>" width="100px" height="100px" alt="<?php echo e($row['product_name']); ?>">
										</div>
										<div class="media-body">
                                            <p><?php echo e($row['product_name']); ?></p>
										</div>
									</div>
								</td>
								<td>
                                    <h5>Rp <?php echo e(number_format($row['product_price'])); ?></h5>
								</td>
								<td>
									<div class="product_count">
                                        <input type="text" name="qty[]" id="sst<?php echo e($row['product_id']); ?>" maxlength="12" value="<?php echo e($row['qty']); ?>" title="Quantity:" class="input-text qty">
                                        <input type="hidden" name="product_id[]" value="<?php echo e($row['product_id']); ?>" class="form-control">
										<button onclick="var result = document.getElementById('sst<?php echo e($row['product_id']); ?>'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
										 class="increase items-count" type="button">
											<i class="lnr lnr-chevron-up"></i>
										</button>
										<button onclick="var result = document.getElementById('sst<?php echo e($row['product_id']); ?>'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
										 class="reduced items-count" type="button">
											<i class="lnr lnr-chevron-down"></i>
										</button>
									</div>
								</td>
								<td>
                                    <h5>Rp <?php echo e(number_format($row['product_price'] * $row['qty'])); ?></h5>
								</td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4">Tidak ada belanjaan</td>
                            </tr>
                            <?php endif; ?>
							<tr class="bottom_button">
								<td>
									<button class="gray_btn">Update Cart</button>
								</td>
								<td></td>
								<td></td>
								<td></td>
                            </tr>
                            </form>
							<tr>
								<td>

								</td>
								<td>

								</td>
								<td>
									<h5>Subtotal</h5>
								</td>
								<td>
                                    <h5>Rp <?php echo e(number_format($subtotal)); ?></h5>
								</td>
							</tr>
							<tr class="out_button_area">
								<td></td>
								<td></td>
								<td></td>
								<td>
									<div class="checkout_btn_inner">
										<a class="gray_btn" href="<?php echo e(route('front.produk')); ?>">Continue Shopping</a>
										<a class="main_btn" href="<?php echo e(route('front.checkout')); ?>">Proceed to checkout</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Cart Area =================-->
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.ecommerce', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My Projects\perfect\skripshit\resources\views/ecommerce/cart.blade.php ENDPATH**/ ?>
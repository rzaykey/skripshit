

<?php $__env->startSection('title'); ?>
    <title>Rupaka Store</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--================Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="overlay"></div>
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8">
						<h3>Fashion for
							<br />Upcoming Winter</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
							aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
						<a class="white_bg_btn" href="#">View Collection</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Hot Deals Area =================-->
	<section class="hot_deals_area section_gap">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="hot_deal_box">
						<img class="img-fluid" src="<?php echo e(asset('ecommerce/img/product/hot_deals/deal1.jpg')); ?>" alt="">
						<div class="content">
							<h2>Hot Deals of this Month</h2>
							<p>shop now</p>
						</div>
						<a class="hot_deal_link" href="#"></a>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="hot_deal_box">
						<img class="img-fluid" src="<?php echo e(asset('ecommerce/img/product/hot_deals/deal1.jpg')); ?>" alt="">
						<div class="content">
							<h2>Hot Deals of this Month</h2>
							<p>shop now</p>
						</div>
						<a class="hot_deal_link" href="#"></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Hot Deals Area =================-->

	<!--================Feature Product Area =================-->
	<section class="feature_product_area section_gap">
		<div class="main_box">
			<div class="container-fluid">
				<div class="row">
					<div class="main_title">
						<h2>Produk Terbaru</h2>
						<p>Tampil trendi dengan kumpulan produk kekinian kami.</p>
					</div>
				</div>
				<div class="row">
          
          <!-- PERHATIAKAN BAGIAN INI, LOOPING DATA PRODUK -->
          <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<div class="col col1">
						<div class="f_p_item">
							<div class="f_p_img">
                <!-- KEMUDIAN TAMPILKAN IMAGENYA DARI FOLDER /PUBLIC/STORAGE/PRODUCTS -->
                <img class="img-fluid" src="<?php echo e(asset('products/' . $row->image)); ?>" alt="<?php echo e($row->name); ?>">
								<div class="p_icon">
									<a href="<?php echo e(url('/produk/' . $row->slug)); ?>">
										<i class="lnr lnr-cart"></i>
									</a>
								</div>
							</div>
              <!-- KETIKA PRODUK INI DIKLIK MAKA AKAN DIARAHKAN KE URL DIBAWAH -->
              <!-- HANYA SAJA URL TERSEBUT BELUM DISEDIAKAN PADA ARTIKEL KALI INI -->
              <a href="<?php echo e(url('/produk/' . $row->slug)); ?>">
                <!-- TAMPILKAN NAMA PRODUK -->
                 <h4><?php echo e($row->name); ?></h4>
							</a>
              <!-- TAMPILKAN HARGA PRODUK -->
              <h5>Rp <?php echo e(number_format($row->price)); ?></h5>
						</div>
					</div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
          <?php endif; ?>
				</div>

        <!-- GENERATE PAGINATION UNTUK MEMBUAT NAVIGASI DATA SELANJUTNYA JIKA ADA -->
				<div class="row">
					<?php echo e($products->links()); ?>

				</div>
			</div>
		</div>
	</section>
	<!--================End Feature Product Area =================-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.ecommerce', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Tes\resources\views/ecommerce/index.blade.php ENDPATH**/ ?>


<?php $__env->startSection('title'); ?>
    <title>Login - Rupaka Store</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Login/Register</h2>
					<div class="page_link">
                        <a href="<?php echo e(url('/')); ?>">Home</a>
                        <a href="<?php echo e(route('customer.login')); ?>">Register</a>
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
                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                    <?php endif; ?>

					<div class="login_form_inner">
                        <h3>Log in to enter</h3>
                        <form class="row login_form" action="<?php echo e(route('customer.post_register')); ?>" method="post" id="contactForm" novalidate="novalidate">
							<?php echo csrf_field(); ?>
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
                                    <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city_get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city_get['id']); ?>"><?php echo e($city_get['type']); ?> <?php echo e($city_get['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
								<a href="<?php echo e(route('customer.login')); ?>">Already registered ?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.ecommerce', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My Projects\perfect\skripshit\resources\views/ecommerce/register.blade.php ENDPATH**/ ?>
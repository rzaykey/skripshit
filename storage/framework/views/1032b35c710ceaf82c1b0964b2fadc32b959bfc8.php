<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="description" content="Rupaka - Aplikasi Ecommerce">
	<meta name="author" content="Irfan">
    <?php echo $__env->yieldContent('title'); ?>
	<link href="<?php echo e(asset('assets/css/font-awesome.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('assets/css/simple-line-icons.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('assets/vendors/pace-progress/css/pace.min.css')); ?>" rel="stylesheet">
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <?php echo $__env->make('layouts.module.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="app-body" id="dw">
        <div class="sidebar">
            <?php echo $__env->make('layouts.module.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <footer class="app-footer">
        <div>
            <a href="https://coreui.io">Rupaka Store</a>
            <span>&copy; 2018 creativeLabs.</span>
        </div>
        <div class="ml-auto">
            <span>Powered by</span>
            <a href="https://coreui.io">CoreUI</a>
        </div>
    </footer>
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/pace.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/coreui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom-tooltips.min.js')); ?>"></script>
    <?php echo $__env->yieldContent('js'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\Tes\resources\views/layouts/admin.blade.php ENDPATH**/ ?>
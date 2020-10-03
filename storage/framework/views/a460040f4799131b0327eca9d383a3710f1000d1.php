

<?php $__env->startSection('title'); ?>
    <title>Tambah User</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">User</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <form action="<?php echo e(route('user.edit')); ?>"></form>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My Projects\perfect\skripshit\resources\views/user/update.blade.php ENDPATH**/ ?>
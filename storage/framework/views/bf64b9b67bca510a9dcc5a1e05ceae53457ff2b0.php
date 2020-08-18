

<?php $__env->startSection('title'); ?>
    <title>List Kota</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Kota</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Kota Baru</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('city.store')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" required>
                                    <p class="text-danger"><?php echo e($errors->first('name')); ?></p>
                                </div>
                                <div class="form-group row">
                                    <label for="type" class="col-md-4 col-form-label text-md-right"><?php echo e(__('type')); ?></label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="type">
                                            <option>--Pilih Jenis--</option>
                                            <option value="Kabupaten">Kabupaten</option>
                                            <option value="Kota">Kota</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="postal_code">Kode Pos</label>
                                    <input type="text" name="postal_code" class="form-control" required>
                                    <p class="text-danger"><?php echo e($errors->first('postal_code')); ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="province_id">Provinsi</label>
                                    <select name="province_id" class="form-control">
                                        <option value="">Pilih</option>
                                        <?php $__currentLoopData = $province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->id); ?>" <?php echo e(old('province_id') == $row->id ? 'selected':''); ?>><?php echo e($row->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <p class="text-danger"><?php echo e($errors->first('province_id')); ?></p>
                                </div>

                                

                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Kota</h4>
                        </div>
                        <div class="card-body">
                            <?php if(session('success')): ?>
                                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                            <?php endif; ?>

                            <?php if(session('error')): ?>
                                <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                            <?php endif; ?>

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kota</th>
                                            <th>Jenis</th>
                                            <th>Kode Pos</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <strong><?php echo e($val->name); ?></strong><br>
                                                <label>Provinsi: <span class="badge badge-info"><?php echo e($val->province->name); ?></span></label><br>
                                            </td>
                                            <td><?php echo e($val->type); ?></td>
                                            <td><?php echo e($val->postal_code); ?></td>
                                            <td>
                                                <form action="#" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            Halaman : <?php echo e($city->currentPage()); ?> <br/>
	                        Jumlah Data : <?php echo e($city->total()); ?> <br/>
	                        Data Per Halaman : <?php echo e($city->perPage()); ?> <br/>
                            <?php echo $city->links(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\skripshit\resources\views/cities/index.blade.php ENDPATH**/ ?>
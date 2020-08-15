

<?php $__env->startSection('title'); ?>
    <title>Tambah Produk</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <form action="<?php echo e(route('product.store')); ?>" method="post" enctype="multipart/form-data" >
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Produk</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Produk</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
                                    <p class="text-danger"><?php echo e($errors->first('name')); ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>\
                                    <textarea name="description" id="description" class="form-control"><?php echo e(old('description')); ?></textarea>
                                    <p class="text-danger"><?php echo e($errors->first('description')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="1" <?php echo e(old('status') == '1' ? 'selected':''); ?>>Publish</option>
                                        <option value="0" <?php echo e(old('status') == '0' ? 'selected':''); ?>>Draft</option>
                                    </select>
                                    <p class="text-danger"><?php echo e($errors->first('status')); ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Kategori</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Pilih</option>
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->id); ?>" <?php echo e(old('category_id') == $row->id ? 'selected':''); ?>><?php echo e($row->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <p class="text-danger"><?php echo e($errors->first('category_id')); ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="price">Harga</label>
                                    <input type="number" name="price" class="form-control" value="<?php echo e(old('price')); ?>" required>
                                    <p class="text-danger"><?php echo e($errors->first('price')); ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Berat</label>
                                    <input type="number" name="weight" class="form-control" value="<?php echo e(old('weight')); ?>" required>
                                    <p class="text-danger"><?php echo e($errors->first('weight')); ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="number" name="stock" class="form-control" value="<?php echo e(old('stock')); ?>" required>
                                    <p class="text-danger"><?php echo e($errors->first('stock')); ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="image">Foto Produk</label>
                                    <input type="file" name="image" class="form-control" value="<?php echo e(old('image')); ?>" required>
                                    <p class="text-danger"><?php echo e($errors->first('image')); ?></p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Tes\resources\views/products/create.blade.php ENDPATH**/ ?>
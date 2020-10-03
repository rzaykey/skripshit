

<?php $__env->startSection('title'); ?>
    <title>Rupaka Store</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--================Home Banner Area =================-->
	<section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Jual Produk Fashion</h2>
                    <div class="page_link">
                        <a href="<?php echo e(route('front.index')); ?>">Home</a>
                        <a href="<?php echo e(route('front.produk')); ?>">Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap">
        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="product_top_bar">
                        <div class="left_dorp">
                            <select class="sorting">
                                <option value="1">Default sorting</option>
                                <option value="2">Default sorting 01</option>
                                <option value="4">Default sorting 02</option>
                            </select>
                            <select class="show">
                                <option value="1">Show 12</option>
                                <option value="2">Show 14</option>
                                <option value="4">Show 16</option>
                            </select>
                        </div>
                        <div class="right_page ml-auto">
                            <?php echo e($products->links()); ?>

                        </div>
                    </div>
                    <div class="latest_product_inner row">
                      
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="f_p_item">
                                <div class="f_p_img">
                                    <img class="img-fluid" src="<?php echo e(asset('products/' . $row->image)); ?>" alt="<?php echo e($row->name); ?>">
                                    <div class="p_icon">
                                        <a href="<?php echo e(url('/produk/' . $row->slug)); ?>">
                                            <i class="lnr lnr-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <a href="<?php echo e(url('/produk/' . $row->slug)); ?>">
                                    <h4><?php echo e($row->name); ?></h4>
                                </a>
                                <h5>Rp <?php echo e(number_format($row->price)); ?></h5>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-md-12">
                            <h3 class="text-center">Tidak ada produk</h3>
                        </div>
                        <?php endif; ?>
                        
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets cat_widgets">
                            <div class="l_w_title">
                                <h3>Kategori Produk</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                  
                                    
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        
                                        <a href="<?php echo e(url('/category/' . $category->slug)); ?> }}"><?php echo e($category->name); ?></a>
                                        
                                        
                                        <?php $__currentLoopData = $category->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <ul class="list">
                                            <li>
                                                <a href="<?php echo e(url('/category/' . $child->slug)); ?>"><?php echo e($child->name); ?></a>
                                            </li>
                                        </ul>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ecommerce', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My Projects\perfect\skripshit\resources\views/ecommerce/product.blade.php ENDPATH**/ ?>
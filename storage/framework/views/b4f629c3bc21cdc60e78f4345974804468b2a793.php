<nav class="sidebar-nav">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/home')); ?>">
                <i class="nav-icon icon-speedometer"></i> Dashboard
            </a>
        </li>
        <li class="nav-title">MANAJEMEN USER</li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('user.index')); ?>">
                <i class="nav-icon icon-puzzle"></i> Customer
            </a>
        </li>
        <li class="nav-title">MANAJEMEN PRODUK</li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('category.index')); ?>">
                <i class="nav-icon icon-puzzle"></i> Kategori
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('product.index')); ?>">
                <i class="nav-icon icon-puzzle"></i> Produk
            </a>
        </li>
        <li class="nav-title">MANAJEMEN KOTA</li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('city.index')); ?>">
                <i class="nav-icon icon-puzzle"></i> Kota
            </a>
        </li>
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-settings"></i> Pengaturan
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="nav-icon icon-puzzle"></i> Toko
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav><?php /**PATH D:\Project\skripshit\resources\views/layouts/module/sidebar.blade.php ENDPATH**/ ?>
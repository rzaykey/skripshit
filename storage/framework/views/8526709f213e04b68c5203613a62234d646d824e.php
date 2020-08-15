<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <li class="breadcrumb-item active">Rupaka Store</li>
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
                <i class="icon-location-pin"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-avatar" src="<?php echo e(asset('assets/img/avatars/6.jpg')); ?>" alt="admin@bootstrapmaster.com">
            </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header text-center">
                <strong>Account</strong>
            </div>
            <div class="divider"></div>
            <a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>">
                <i class="fa fa-shield"></i> Edit Profile
            </a>
            <a class="dropdown-item" href="#">
                <i class="fa fa-shield"></i> Lock Account
            </a>
            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-lock"></i> Logout
            </a>

            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
        </div>
        </li>
    </ul>
</header><?php /**PATH C:\xampp\htdocs\Tes\resources\views/layouts/module/header.blade.php ENDPATH**/ ?>
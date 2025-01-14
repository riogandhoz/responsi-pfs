<!-- resources/views/admin/partials/sidebar.blade.php -->
<div class="sidebar bg-dark text-white" style="min-width: 250px; min-height: 100vh;">
    <div class="sidebar-header p-3">
        <h3>Admin Panel</h3>
    </div>
    <div class="sidebar-menu">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link text-white <?php echo e(Request::routeIs('admin.dashboard') ? 'active bg-primary' : ''); ?>">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.orders')); ?>" class="nav-link text-white <?php echo e(Request::routeIs('admin.orders') ? 'active bg-primary' : ''); ?>">
                    <i class="fas fa-shopping-cart me-2"></i> Orders
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.products')); ?>" class="nav-link text-white <?php echo e(Request::routeIs('admin.products') ? 'active bg-primary' : ''); ?>">
                    <i class="fas fa-box me-2"></i> Products
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.customers')); ?>" class="nav-link text-white <?php echo e(Request::routeIs('admin.customers') ? 'active bg-primary' : ''); ?>">
                    <i class="fas fa-users me-2"></i> Customers
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.reports')); ?>" class="nav-link text-white <?php echo e(Request::routeIs('admin.reports') ? 'active bg-primary' : ''); ?>">
                    <i class="fas fa-chart-bar me-2"></i> Reports
                </a>
            </li>
        </ul>
    </div>
</div><?php /**PATH D:\Rio\ecommers\resources\views/admin/partials/sidebar.blade.php ENDPATH**/ ?>
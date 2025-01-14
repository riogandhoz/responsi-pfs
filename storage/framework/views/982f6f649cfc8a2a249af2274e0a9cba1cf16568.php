

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Overview</h1>
        <div>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
        </div>
    </div>

    <!-- Stats Cards Row -->
    <div class="row">
        <!-- Total Orders Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase mb-1 font-weight-bold text-xs text-primary">
                                Total Orders
                            </div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800"><?php echo e($totalOrders); ?></div>
                            <div class="text-sm text-success mt-2">
                                <i class="fas fa-arrow-up"></i> 12% increase
                            </div>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="fas fa-shopping-cart fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Products Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase mb-1 font-weight-bold text-xs text-success">
                                Total Products
                            </div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800"><?php echo e($totalProducts); ?></div>
                            <div class="text-sm text-success mt-2">
                                <i class="fas fa-box"></i> In Stock
                            </div>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="fas fa-box fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Customers Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase mb-1 font-weight-bold text-xs text-info">
                                Total Customers
                            </div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800"><?php echo e($totalCustomers); ?></div>
                            <div class="text-sm text-info mt-2">
                                <i class="fas fa-users"></i> Active Users
                            </div>
                        </div>
                        <div class="rounded-circle bg-info bg-opacity-10 p-3">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Revenue Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-uppercase mb-1 font-weight-bold text-xs text-warning">
                                Total Revenue
                            </div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                Rp <?php echo e(number_format($totalRevenue, 0, ',', '.')); ?>

                            </div>
                            <div class="text-sm text-warning mt-2">
                                <i class="fas fa-chart-line"></i> Monthly Revenue
                            </div>
                        </div>
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                            <i class="fas fa-dollar-sign fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Recent Orders Table -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-light">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Orders</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">View All Orders</a>
                            <a class="dropdown-item" href="#">Export Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" width="100%" cellspacing="0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>#<?php echo e($order->id); ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($order->user->name)); ?>&background=random" 
                                                 alt="<?php echo e($order->user->name); ?>" 
                                                 class="rounded-circle mr-2"
                                                 width="32">
                                            <?php echo e($order->user->name); ?>

                                        </div>
                                    </td>
                                    <td>Rp <?php echo e(number_format($order->total_price, 0, ',', '.')); ?></td>
                                    <td>
                                        <?php switch($order->status):
                                            case ('pending'): ?>
                                                <span class="badge badge-warning">Pending</span>
                                                <?php break; ?>
                                            <?php case ('processing'): ?>
                                                <span class="badge badge-info">Processing</span>
                                                <?php break; ?>
                                            <?php case ('completed'): ?>
                                                <span class="badge badge-success">Completed</span>
                                                <?php break; ?>
                                            <?php default: ?>
                                                <span class="badge badge-secondary"><?php echo e($order->status); ?></span>
                                        <?php endswitch; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Card -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-light">
                    <h6 class="m-0 font-weight-bold text-primary">Categories Overview</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div class="display-4 font-weight-bold text-primary mb-3">
                            <?php echo e($totalCategories); ?>

                        </div>
                        <p class="text-muted">Total Active Categories</p>
                    </div>
                    <hr>
                    <div class="mt-4">
                        <h6 class="font-weight-bold">Quick Actions</h6>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Add New Category
                                <i class="fas fa-plus text-success"></i>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Manage Categories
                                <i class="fas fa-cog text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .card {
        transition: transform 0.2s ease-in-out;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .badge {
        padding: 0.5em 1em;
    }
    .bg-opacity-10 {
        opacity: 0.1;
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rio\ecommers\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>
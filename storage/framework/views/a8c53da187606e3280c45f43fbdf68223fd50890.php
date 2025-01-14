

<?php $__env->startSection('title', 'Categories - Brownies Gacor'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>All Categories</h2>
        </div>
        <div class="col-md-6">
            <form action="<?php echo e(route('categories.index')); ?>" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" 
                           placeholder="Search categories..." 
                           value="<?php echo e(request('search')); ?>">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Categories Grid -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col">
            <div class="card h-100">
                <img src="<?php echo e(asset('product/product-' . ($loop->iteration + 13) . '.jpg')); ?>" 
                     class="card-img-top" alt="<?php echo e($category->name); ?>">
                <div class="card-body">
                    <h3 class="card-title"><?php echo e($category->name); ?></h3>
                    <p class="card-text">Discover <?php echo e($category->name); ?>.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-primary"><?php echo e($category->products_count); ?> Products</span>
                        <a href="<?php echo e(route('categories.show', $category->slug)); ?>" 
                           class="btn btn-outline-primary">View Products</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rio\ecommers\resources\views/categories.blade.php ENDPATH**/ ?>
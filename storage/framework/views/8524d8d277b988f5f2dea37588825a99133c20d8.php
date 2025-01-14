

<?php $__env->startSection('title', 'Home - Brownies Gacor'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<div class="bg-dark text-white p-5 mb-4 rounded" style="background-image: url('<?php echo e(asset('product/product-17.jpeg')); ?>'); background-size: cover; background-position: center;">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold" style="font-weight: bold;">Welcome to Brownies Gacor</h1>
        <p class="col-md-8 fs-4" style="font-weight: bold;">Find brownie products at the best prices here!.</p>
        <a href="/products" class="btn btn-primary btn-lg">Shop Now</a>
    </div>
</div>

<!-- Featured Categories -->
<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
    <div class="col">
        <div class="card h-100">
            <img src="<?php echo e(asset('product/product-11.jpeg')); ?>" class="card-img-top" alt="Brownies Kukus" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">Brownies Kukus</h5>
                <p class="card-text">Steamed brownies.</p>
                <a href="<?php echo e(url('/category/brownies-kukus')); ?>" class="btn btn-outline-primary">View Products</a>
            </div>  
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <img src="<?php echo e(asset('product/product-12.jpg')); ?>" class="card-img-top" alt="Brownies Panggang" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">Brownies Panggang</h5>
                <p class="card-text">Baked brownies.</p>
                <a href="<?php echo e(url('/category/brownies-panggang')); ?>" class="btn btn-outline-primary">View Products</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <img src="<?php echo e(asset('product/product-13.jpg')); ?>" class="card-img-top" alt="Brownies Oven" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">Brownies Oven</h5>
                <p class="card-text">Brownies in the oven.</p>
                <a href="<?php echo e(url('/category/brownies-oven')); ?>" class="btn btn-outline-primary">View Products</a>
            </div>
        </div>
    </div>
</div>

<!-- Featured Products -->
<h2 class="mb-4">Best Seller</h2>
<div class="row row-cols-1 row-cols-md-4 g-4">
    <!-- Brownies Coklat Panggang -->
    <div class="col">
        <div class="card h-100">
            <img src="<?php echo e(asset('product/product-10.jpg')); ?>" class="card-img-top" alt="Brownies Coklat Panggang" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">Brownies Coklat Panggang</h5>
                <p class="card-text">Rp 45.000</p>
                <?php if(auth()->guard()->check()): ?>
                    <form action="<?php echo e(route('beli.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="product_id" value="1">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Login to Buy</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rio\ecommers\resources\views/home.blade.php ENDPATH**/ ?>
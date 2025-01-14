

<?php $__env->startSection('title', 'Brownies Oven - Brownies Gacor'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="mb-4">Brownies Oven Collection</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="<?php echo e(asset('product/product-4.jpg')); ?>" class="card-img-top" alt="Brownies Coklat Oven" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Brownies Coklat Oven</h5>
                        <p class="card-text">Chocolate Brownies in the Oven.</p>
                        <p class="card-text"><strong>Rp 45.000</strong></p>
                        <?php if(auth()->guard()->check()): ?>
                            <form action="<?php echo e(route('beli.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="7">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                            </form>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary w-100">Login to Buy</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="<?php echo e(asset('product/product-8.jpg')); ?>" class="card-img-top" alt="Brownies Keju Oven" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Brownies Keju Oven</h5>
                        <p class="card-text">Cheese Brownies in the Oven.</p>
                        <p class="card-text"><strong>Rp 50.000</strong></p>
                        <?php if(auth()->guard()->check()): ?>
                            <form action="<?php echo e(route('beli.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="8">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                            </form>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary w-100">Login to Buy</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="<?php echo e(asset('product/product-9.jpg')); ?>" class="card-img-top" alt="Brownies Red Velvet Oven" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Brownies Red Velvet Oven</h5>
                        <p class="card-text">Red Velvet Brownies in the Oven.</p>
                        <p class="card-text"><strong>Rp 55.000</strong></p>
                        <?php if(auth()->guard()->check()): ?>
                            <form action="<?php echo e(route('beli.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="9">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                            </form>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary w-100">Login to Buy</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rio\ecommers\resources\views/categories/brownies-oven.blade.php ENDPATH**/ ?>
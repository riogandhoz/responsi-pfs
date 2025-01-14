

<?php $__env->startSection('title', 'Brownies Kukus - Brownies Gacor'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="mb-4">Brownies Kukus Collection</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="<?php echo e(asset('product/product-1.jpg')); ?>" class="card-img-top" alt="Brownies Coklat Kukus" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Brownies Coklat Kukus</h5>
                        <p class="card-text">Steamed Chocolate Brownies.</p>
                        <p class="card-text"><strong>Rp 50.000</strong></p>
                        <?php if(auth()->guard()->check()): ?>
                            <form action="<?php echo e(route('beli.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="1">
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
                    <img src="<?php echo e(asset('product/product-2.jpg')); ?>" class="card-img-top" alt="Brownies Keju Kukus" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Brownies Keju Kukus</h5>
                        <p class="card-text">Steamed Cheese Brownies.</p>
                        <p class="card-text"><strong>Rp 55.000</strong></p>
                        <?php if(auth()->guard()->check()): ?>
                            <form action="<?php echo e(route('beli.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="2">
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
                    <img src="<?php echo e(asset('product/product-3.jpg')); ?>" class="card-img-top" alt="Brownies Matcha Kukus" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Brownies Matcha Kukus</h5>
                        <p class="card-text">Steamed Matcha Brownies.</p>
                        <p class="card-text"><strong>Rp 60.000</strong></p>
                        <?php if(auth()->guard()->check()): ?>
                            <form action="<?php echo e(route('beli.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="3">
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rio\ecommers\resources\views/categories/brownies-kukus.blade.php ENDPATH**/ ?>
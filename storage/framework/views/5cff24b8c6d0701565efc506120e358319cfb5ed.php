

<?php $__env->startSection('title', 'Shopping Cart'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <h1 class="mb-4">Shopping Cart</h1>

    <?php if($cartItems->count() > 0): ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mb-4 border-bottom pb-4">
                                <div class="col-md-2">
                                    <img src="<?php echo e($item->product->image_url ?? '/images/placeholder.jpg'); ?>" 
                                         alt="<?php echo e($item->product->name); ?>" 
                                         class="img-fluid rounded">
                                </div>
                                <div class="col-md-4">
                                    <h5><?php echo e($item->product->name); ?></h5>
                                    <p class="text-muted"><?php echo e($item->product->category->name ?? 'No Category'); ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p class="mb-0">Rp <?php echo e(number_format($item->product->price, 0, ',', '.')); ?></p>
                                </div>
                                <div class="col-md-2">
                                    <form action="<?php echo e(route('beli.update', $item)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <div class="input-group">
                                            <input type="number" 
                                                   name="quantity" 
                                                   value="<?php echo e($item->quantity); ?>" 
                                                   min="1" 
                                                   class="form-control">
                                            <button type="submit" class="btn btn-outline-secondary">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-2">
                                    <form action="<?php echo e(route('beli.destroy', $item)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Remove
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Order Summary</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>Rp <?php echo e(number_format($subtotal, 0, ',', '.')); ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping</span>
                            <span>Rp <?php echo e(number_format($shipping, 0, ',', '.')); ?></span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <strong>Total</strong>
                            <strong>Rp <?php echo e(number_format($total, 0, ',', '.')); ?></strong>
                        </div>

                        <form action="<?php echo e(route('beli.applyCoupon')); ?>" method="POST" class="mb-3">
                            <?php echo csrf_field(); ?>
                            <div class="input-group">
                                <input type="text" name="coupon_code" class="form-control" placeholder="Coupon Code">
                                <button type="submit" class="btn btn-outline-secondary">Apply</button>
                            </div>
                        </form>

                        <form action="<?php echo e(route('beli.checkout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-lock me-2"></i>Proceed to Checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="text-center py-5">
            <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
            <h3>Your cart is empty</h3>
            <p class="text-muted">Add some products to your cart and they will appear here</p>
            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary">
                <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
            </a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rio\ecommers\resources\views/beli/index.blade.php ENDPATH**/ ?>
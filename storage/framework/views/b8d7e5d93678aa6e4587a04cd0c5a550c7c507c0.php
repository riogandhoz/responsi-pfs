

<?php $__env->startSection('title', 'Order Successful'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="text-center">
        <i class="fas fa-check-circle fa-5x text-success mb-4"></i>
        <h1 class="mb-4">Order Successful!</h1>
        <p class="lead">Thank you for your purchase. Your order number is #<?php echo e($order->id); ?>.</p>
        <p>We've sent a confirmation email to <?php echo e($order->email); ?>.</p>
        <a href="<?php echo e(route('home')); ?>" class="btn btn-primary mt-4">Continue Shopping</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

    
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rio\ecommers\resources\views/checkout/succes.blade.php ENDPATH**/ ?>
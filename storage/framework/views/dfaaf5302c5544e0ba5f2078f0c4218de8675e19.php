

<?php $__env->startSection('title', 'Products - Brownies Gacor'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- Sidebar Filter -->
        <div class="col-lg-3">
            <form action="<?php echo e(route('products.index')); ?>" method="GET" id="filterForm">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Filter Products</h5>
                    </div>
                    <div class="card-body">
                        <!-- Categories -->
                        <h6 class="mb-3">Categories</h6>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check mb-2">
                                <input class="form-check-input filter-checkbox" 
                                       type="checkbox" 
                                       name="categories[]" 
                                       value="<?php echo e($category->id); ?>"
                                       <?php echo e(in_array($category->id, request()->get('categories', [])) ? 'checked' : ''); ?>>
                                <label class="form-check-label"><?php echo e($category->name); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <!-- Price Range -->
                        <h6 class="mb-3">Price Range</h6>
                        <div class="mb-4">
                            <label for="min_price" class="form-label">Min Price</label>
                            <input type="number" class="form-control filter-input" name="min_price" 
                                   value="<?php echo e(request('min_price')); ?>">
                            
                            <label for="max_price" class="form-label mt-2">Max Price</label>
                            <input type="number" class="form-control filter-input" name="max_price"
                                   value="<?php echo e(request('max_price')); ?>">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Product List -->
        <div class="col-lg-9">
            <!-- Sort and Search -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <select class="form-select" name="sort" form="filterForm">
                        <option value="">Sort by</option>
                        <option value="price-low" <?php echo e(request('sort') == 'price-low' ? 'selected' : ''); ?>>
                            Price: Low to High
                        </option>
                        <option value="price-high" <?php echo e(request('sort') == 'price-high' ? 'selected' : ''); ?>>
                            Price: High to Low
                        </option>
                        <option value="newest" <?php echo e(request('sort') == 'newest' ? 'selected' : ''); ?>>
                            Newest First
                        </option>
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" form="filterForm"
                               placeholder="Search products..." value="<?php echo e(request('search')); ?>">
                        <button class="btn btn-outline-secondary" type="submit" form="filterForm">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo e(asset('product/product-'.($loop->iteration).'.jpg')); ?>" 
                                 class="card-img-top" 
                                 alt="<?php echo e($product->name); ?>" 
                                 style="object-fit: cover; height: 200px; width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                <p class="card-text text-truncate"><?php echo e($product->description); ?></p>
                                <p class="card-text">
                                    <strong>Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></strong>
                                </p>
                                
                                <?php if(auth()->guard()->check()): ?>
                                    <form action="<?php echo e(route('beli.store')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                                    </form>
                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary w-100">Login to Buy</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                <?php echo e($products->withQueryString()->links()); ?>

            </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-submit form when sort selection changes
            document.querySelector('select[name="sort"]').addEventListener('change', function() {
                document.getElementById('filterForm').submit();
            });
        });
    </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rio\ecommers\resources\views/products.blade.php ENDPATH**/ ?>
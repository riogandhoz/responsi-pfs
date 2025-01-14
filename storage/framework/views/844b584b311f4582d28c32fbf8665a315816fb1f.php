<!-- resources/views/admin/reports/index.blade.php -->


<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reports</h1>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    Sales Report
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label>Date Range</label>
                            <div class="input-group">
                                <input type="date" class="form-control" name="start_date">
                                <span class="input-group-text">to</span>
                                <input type="date" class="form-control" name="end_date">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-download me-2"></i>Download Report
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    Customer Report
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label>Report Type</label>
                            <select class="form-control">
                                <option>Customer Growth</option>
                                <option>Customer Activity</option>
                                <option>Top Customers</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-download me-2"></i>Generate Report
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rio\ecommers\resources\views/admin/reports/index.blade.php ENDPATH**/ ?>
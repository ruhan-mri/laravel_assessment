

<?php $__env->startSection('title','Edit Address'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Edit Laravel User Address')); ?></div>

                <div class="card-body">
                    <?php if(session('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('success')); ?>

                    </div>
                    <?php endif; ?>
                </div>
                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <form action="<?php echo e(route('addresses.update', $address->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="d-flex justify-content-center align-items-center vh-50">
                    <div class="row g-3">
                        
                        <div class="col-md-8">
                            <label for="address" class="form-label">Recent Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo e(old('address', $address->address_line )); ?>" placeholder="1234 Main St" required>
                        </div>
                        
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Update Address</button>
                            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary ms-5">Cancel</a>
                        </div>
                    </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelUser\resources\views/editAddress.blade.php ENDPATH**/ ?>
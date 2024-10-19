

<?php $__env->startSection('title','Edit User'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Edit Laravel User')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

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
                <form action="<?php echo e(route('update', $user->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="d-flex justify-content-center align-items-center vh-50">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?php echo e(old('name', $user->name)); ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" name="age" class="form-control" id="age" value="<?php echo e(old('age', $user->age)); ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="<?php echo e(old('email', $user->email)); ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="address" class="form-label">Recent Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo e(old('address', $user->recentAddress->address_line )); ?>" placeholder="1234 Main St" required>
                        </div>
                        <div class="col-md-4">
                            <label for="image" class="form-label">Upload New Image (optional)</label>
                            <input type="file" name="image" class="form-control" id="image" accept="image/*">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Update User</button>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelUser\resources\views/edit.blade.php ENDPATH**/ ?>
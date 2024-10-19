

<?php $__env->startSection('title','Create User'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Create A New Laravel User')); ?></div>

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

                <form action="<?php echo e(route(name: 'assessment_01.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="d-flex justify-content-center align-items-center vh-50">
                    <div class="row">
                            <div class="col-md-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="col-md-4">
                                <label for="age" class="form-label">Age</label>
                                <input type="text" name="age" class="form-control" id="age" required>
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>

                            <div class="col-md-4">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                            </div>
                            <div class="col-md-4">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" name="image" class="form-control" id="image" accept="image/*">
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="btn btn-primary">Create User</button>
                                <a href="<?php echo e(route('assessment_01.home')); ?>" class="btn btn-secondary ms-5">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelUser\resources\views/assessment_01/create.blade.php ENDPATH**/ ?>
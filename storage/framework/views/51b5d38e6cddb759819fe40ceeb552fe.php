

<?php $__env->startSection('title','User Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Laravel Single User Details')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e($user->name); ?></h5>
                    </div>
                    <div class="card-body d-flex">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <strong>Age:</strong> <?php echo e($user->age); ?>

                            </div>
                            <div class="mb-3">
                                <strong>Email:</strong> <?php echo e($user->email); ?>

                            </div>
                            <div class="mb-3">
                                <strong>Address:</strong> <?php echo e($user->address); ?>

                            </div>
                            <div class="mb-3">
                                <strong>Created At:</strong> <?php echo e($user->created_at->format('Y-m-d H:i:s')); ?>

                            </div>
                            <div class="mb-3">
                                <strong>Updated At:</strong> <?php echo e($user->updated_at->format('Y-m-d H:i:s')); ?>

                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <?php if($user->image): ?>
                            <img src="<?php echo e(asset('storage/' . $user->image)); ?>" height="150px" width="150px" alt="<?php echo e($user->name); ?>" class="img-fluid rounded">
                            <?php else: ?>
                            <img src="<?php echo e(asset('storage/images/user.jpeg')); ?>" height="150px" width="150px" alt="Placeholder Image" class="img-fluid rounded">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo e(route('assessment_01.home')); ?>" class="btn btn-secondary">Back to User List</a>
                        <a href="<?php echo e(route('assessment_01.edit', $user->id)); ?>" class="btn btn-warning">Edit</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelUser\resources\views/assessment_01/show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title','Users List'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Laravel Users List')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="col-md-1">Image</th>
                            <th class="col-md-2">Name</th>
                            <th class="col-md-1">Age</th>
                            <th class="col-md-2">Email</th>
                            <th class="col-md-3">Address</th>
                            <th class="col-md-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if($user->image): ?>
                                <img src="<?php echo e(asset('storage/' . $user->image)); ?>" height="50px" width="50px" alt="<?php echo e($user->name); ?>" class="img-fluid rounded">
                                <?php else: ?>
                                <img src="<?php echo e(asset('storage/images/user.jpeg')); ?>" height="50px" width="50px" alt="Placeholder Image" class="img-fluid rounded">
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->age); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><?php echo e($user->recentAddress ? $user->recentAddress->address_line : 'No address available'); ?></td>
                            <td>
                                <a href="<?php echo e(route('show', $user->id)); ?>" class="btn btn-info">View</a>
                                <a href="<?php echo e(route('edit', $user->id)); ?>" class="btn btn-primary">Edit</a>
                                <form action="<?php echo e(route('softDelete', $user->id)); ?>" method="POST" style="display:inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelUser\resources\views/home.blade.php ENDPATH**/ ?>
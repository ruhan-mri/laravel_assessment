

<?php $__env->startSection('title','Delete User'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Laravel Users Trash List')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                </div>
                <?php if($users->isEmpty()): ?>
                <div class="alert alert-info">
                    <h2 text-center>No Deleted User Found -_-</h2>
                </div>
                <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Adress</th>
                            <th>Deleted At</th>
                            <th>Actions</th>
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
                            <td><?php echo e($user->address); ?></td>
                            <td><?php echo e($user->deleted_at); ?></td>
                            <td>
                                <form action="<?php echo e(route('assessment_01.restore', $user->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                </form>
                                <form action="<?php echo e(route('assessment_01.force_delete', $user->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, you want to permanently delete this user?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php endif; ?>

                <a href="<?php echo e(route('assessment_01.home')); ?>" class="btn btn-primary">Back to User List</a>


            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelUser\resources\views/assessment_01/trash.blade.php ENDPATH**/ ?>
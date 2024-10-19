

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
                                <strong>Recent Address:</strong> <?php echo e($recentAddress ? $recentAddress->address_line : 'No address available'); ?>

                            </div>
                            <div class="mb-3">
                                <strong>Created At:</strong> <?php echo e($user->created_at->format('Y-m-d H:i:s')); ?>

                            </div>
                            <div class="mb-3">
                                <strong>Updated At:</strong> <?php echo e($user->updated_at->format('Y-m-d H:i:s')); ?>

                            </div>
                            <div class="container mt-4">
                                <h2>List of Addresses:</h2>

                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>Address</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $user->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e($address->address_line); ?>

                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('addresses.edit', $address)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="<?php echo e(route('addresses.destroy', $address)); ?>" method="POST" style="display:inline;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
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
                        <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary">Back to User List</a>
                        <a href="<?php echo e(route('edit', $user->id)); ?>" class="btn btn-warning ms-4">Edit</a>
                        <a href="<?php echo e(route('address.create', $user->id)); ?>" class="btn btn-primary ms-4">Add More Address</a>
                        <a href="<?php echo e(route('addresses.trash', $user->id)); ?>" class="btn btn-danger ms-4">Trash Address</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelUser\resources\views/show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class='text-center'>Registered Users</h1>
                <br>
                <table class="table table-bordered table-hover">
                    <thead>
                        <th class='text-center'>Name</th>
                        <th class='text-center'>Email</th>
                        <th class='text-center'>Role Name</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class='text-center'><?php echo e($user->name); ?></td>
                                <td class='text-center'><?php echo e($user->email); ?></td>
                                <td class='text-center'><?php echo e($user->role->role_name); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmer/EMF/resources/views/employeeFolder/users.blade.php ENDPATH**/ ?>
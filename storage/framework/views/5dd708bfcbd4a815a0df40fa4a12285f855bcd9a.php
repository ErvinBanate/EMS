<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class='text-center'>Incident Reports</h1>
            <br>
            <table class="table table-bordered table-hover">
                <thead>
                    <th class='text-center'>Barangay</th>
                    <th class='text-center'>Block Number</th>
                    <th class='text-center'>House Type</th>
                    <th class='text-center'>Date</th>
                    <th class='text-center'>Fire Alarm Level</th>
                    <th class='text-center'>Cause of Incident</th>
                    <th class='text-center'>Estimated Damage</th>
                    <th class='text-center'>Reported By</th>
                    <th class='text-center'>Status</th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($report['is_approved'] == 1 && $report['is_rejected'] == 0): ?>
                            <tr>
                                <td class='text-center'><?php echo e($report['barangay']); ?></td>
                                <td class='text-center'><?php echo e($report['block_no']); ?></td>
                                <td class='text-center'><?php echo e($report['house_type']); ?></td>
                                <td class='text-center'><?php echo e($report['date']); ?></td>
                                <td class='text-center'><?php echo e($report['fire_alarm_level']); ?></td>
                                <td class='text-center'><?php echo e($report['cause_of_incident']); ?></td>
                                <td class='text-center'><?php echo e($report['estimated_damage']); ?></td>
                                <td class='text-center'><?php echo e($report['reported_by']); ?></td>
                                <?php if($report['is_approved'] == 1 && $report['is_rejected'] == 0): ?>
                                    <td class='text-center'>Approved</td>
                                <?php else: ?> 
                                    <td class='text-center'>Data Error</td>
                                <?php endif; ?>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmer/EMF/resources/views/employee/home.blade.php ENDPATH**/ ?>
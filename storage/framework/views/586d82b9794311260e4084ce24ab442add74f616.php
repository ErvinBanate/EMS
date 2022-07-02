<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class='text-center'>Create Incident Reports</h1>
                <br>
                <form class="row g-3" method="POST" action="<?php echo e(route('store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-3">
                        <label class="form-label" for="input-barangay">Barangay</label>
                        <input class="form-control" type="text" name="input-barangay">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="input-block-no">Block Number</label>
                        <input class="form-control" type="text" name="input-block-no">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="input-house-type">House Type</label>
                        <input class="form-control" type="text" name="input-house-type">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="input-date">Date</label>
                        <input class="form-control" type="date" name="input-date">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="input-fire-alarm-level">Fire Alarm Level</label>
                        <input class="form-control" type="text" name="input-fire-alarm-level">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="input-cause-of-incident">Cause of Incident</label>
                        <input class="form-control" type="text" name="input-cause-of-incident">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="input-estimated-damage">Estimated Damage</label>
                        <input class="form-control" type="text" name="input-estimated-damage">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="input-reported-by">Reported By</label>
                        <input class="form-control" type="text" name="input-reported-by"
                            value="<?php echo e(Auth::user()->name); ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="input-description">Description</label>
                        <input class="form-control" type="text" name="input-description" rows="4">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class='text-center'>Pending Incident Reports</h1>
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
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($report['reported_by'] == Auth::user()->name): ?>
                                <?php if($report['is_approved'] == 0 && $report['is_rejected'] == 0): ?>
                                    <tr>
                                        <td class='text-center'><?php echo e($report['barangay']); ?></td>
                                        <td class='text-center'><?php echo e($report['block_no']); ?></td>
                                        <td class='text-center'><?php echo e($report['house_type']); ?></td>
                                        <td class='text-center'><?php echo e($report['date']); ?></td>
                                        <td class='text-center'><?php echo e($report['fire_alarm_level']); ?></td>
                                        <td class='text-center'><?php echo e($report['cause_of_incident']); ?></td>
                                        <td class='text-center'><?php echo e($report['estimated_damage']); ?></td>
                                        <td class='text-center'><?php echo e($report['reported_by']); ?></td>
                                        <?php if($report['is_approved'] == 0 && $report['is_rejected'] == 0): ?>
                                            <td class='text-center'>Pending</td>
                                        <?php else: ?>
                                            <td class='text-center'>Data Error</td>
                                        <?php endif; ?>
                                        <td class="text-center"><a href="<?php echo e(route('edit', $report['id'])); ?>">Edit</a>
                                        </td>
                                        <td class="text-center"><a href="<?php echo e(route('remove', $report['id'])); ?>">Remove</a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class='text-center'>Rejected Incident Reports</h1>
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
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($report['reported_by'] == Auth::user()->name): ?>
                                <?php if($report['is_approved'] == 0 && $report['is_rejected'] == 1): ?>
                                    <tr>
                                        <td class='text-center'><?php echo e($report['barangay']); ?></td>
                                        <td class='text-center'><?php echo e($report['block_no']); ?></td>
                                        <td class='text-center'><?php echo e($report['house_type']); ?></td>
                                        <td class='text-center'><?php echo e($report['date']); ?></td>
                                        <td class='text-center'><?php echo e($report['fire_alarm_level']); ?></td>
                                        <td class='text-center'><?php echo e($report['cause_of_incident']); ?></td>
                                        <td class='text-center'><?php echo e($report['estimated_damage']); ?></td>
                                        <td class='text-center'><?php echo e($report['reported_by']); ?></td>
                                        <?php if($report['is_approved'] == 0 && $report['is_rejected'] == 1): ?>
                                            <td class='text-center'>Rejected</td>
                                        <?php else: ?>
                                            <td class='text-center'>Data Error</td>
                                        <?php endif; ?>
                                        <td class="text-center"><a href="#">Edit</a></td>
                                        <td class="text-center"><a href="#">Remove</a></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmer/EMF/resources/views/employeeFolder/incidentReport.blade.php ENDPATH**/ ?>
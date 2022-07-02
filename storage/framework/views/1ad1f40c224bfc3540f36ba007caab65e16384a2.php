<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <?php if($action === 'approving'): ?>
                    <h1 class='text-center'>Confirm Fire Incident Report</h1>
                <?php endif; ?>
                <?php if($action === 'rejecting'): ?>
                    <h1 class='text-center'>Confirm Fire Incident Report</h1>
                <?php endif; ?>
                <?php if($action === 'show'): ?>
                    <h1 class='text-center'>Incident Report</h1>
                <?php endif; ?>
                <br>
                <?php if($action === 'approving'): ?>
                    <form class="row g-3" method="POST" action="<?php echo e(route('approve', $report->id)); ?>">
                <?php endif; ?>
                <?php if($action === 'rejecting'): ?>
                    <form class="row g-3" method="POST" action="<?php echo e(route('reject', $report->id)); ?>">
                <?php endif; ?>
                <?php if($action === 'show'): ?>
                    <form class="row g-3" method="POST" action="<?php echo e(route('update', $report->id)); ?>">
                <?php endif; ?>
                <?php echo csrf_field(); ?>
                <div class="col-md-3">
                    <label class="form-label" for="input-street">Street</label>
                    <p class="form-control"><?php echo e($report->street); ?></p>
                    <input class="form-control" type="hidden" name="input-street" value="<?php echo e($report->barangay); ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="input-block-no">Block Number</label>
                    <p class="form-control"><?php echo e($report->block_no); ?></p>
                    <input class="form-control" type="hidden" name="input-block-no" value="<?php echo e($report->block_no); ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="input-house-type">House Type</label>
                    <p class="form-control"><?php echo e($report->house_type); ?></p>
                    <input class="form-control" type="hidden" name="input-house-type" value="<?php echo e($report->house_type); ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="input-date">Date</label>
                    <p class="form-control"><?php echo e($report->date); ?></p>
                    <input class="form-control" type="hidden" name="input-date" value="<?php echo e($report->date); ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="input-fire-alarm-level">Fire Alarm Level</label>
                    <p class="form-control"><?php echo e($report->fire_alarm_level); ?></p>
                    <input class="form-control" type="hidden" name="input-fire-alarm-level"
                        value="<?php echo e($report->fire_alarm_level); ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="input-cause-of-incident">Cause of Incident</label>
                    <p class="form-control"><?php echo e($report->cause_of_incident); ?></p>
                    <input class="form-control" type="hidden" name="input-cause-of-incident"
                        value="<?php echo e($report->cause_of_incident); ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="input-estimated-damage">Estimated Damage</label>
                    <p class="form-control"><?php echo e($report->estimated_damage); ?></p>
                    <input class="form-control" type="hidden" name="input-estimated-damage"
                        value="<?php echo e($report->estimated_damage); ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="input-reported-by">Reported By</label>
                    <p class="form-control"><?php echo e($report->reportedBy->name); ?></p>
                    <input class="form-control" type="hidden" name="input-reported-by"
                        value="<?php echo e($report['reported_by']); ?>">
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="input-description">Description</label>
                    <p class="form-control"><?php echo e($report->description); ?><br></p>
                    <input class="form-control" type="hidden" name="input-description" rows="4"
                        value="<?php echo e($report->description); ?>">
                </div>
                <div class="col-12">
                    <?php if($action === 'edit'): ?>
                        <button class="btn btn-primary" type="submit">Update</button>
                    <?php endif; ?>
                    <?php if($action === 'approving'): ?>
                        <button class="btn btn-primary" type="submit">Approve</button>
                    <?php endif; ?>
                    <?php if($action === 'rejecting'): ?>
                        <button class="btn btn-primary" type="submit">Reject</button>
                    <?php endif; ?>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmer/EMF/resources/views/employeeFolder/show.blade.php ENDPATH**/ ?>
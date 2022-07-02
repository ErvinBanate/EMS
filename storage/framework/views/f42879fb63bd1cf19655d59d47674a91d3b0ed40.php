<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class='text-center'>Fire Incident Report</h1>
                <br>
                <form class="row g-3" method="POST" action="<?php echo e(route('update', $report->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-3">
                        <label class="form-label" for="input-street">Street</label>
                        <input class="form-control" type="text" name="input-street" value="<?php echo e($report->street); ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="input-block-no">Block Number</label>
                        <input class="form-control" type="text" name="input-block-no" value="<?php echo e($report->block_no); ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="input-house-type">House Type</label>
                        <input class="form-control" type="text" name="input-house-type"
                            value="<?php echo e($report->house_type); ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="input-date">Date</label>
                        <input class="form-control" type="date" name="input-date" value="<?php echo e($report->date); ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="input-fire-alarm-level">Fire Alarm Level</label>
                        <input class="form-control" type="text" name="input-fire-alarm-level"
                            value="<?php echo e($report->fire_alarm_level); ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="input-cause-of-incident">Cause of Incident</label>
                        <input class="form-control" type="text" name="input-cause-of-incident"
                            value="<?php echo e($report->cause_of_incident); ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="input-estimated-damage">Estimated Damage</label>
                        <input class="form-control" type="text" name="input-estimated-damage"
                            value="<?php echo e($report->estimated_damage); ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="input-reported-by">Reported By</label>
                        <input class="form-control" type="text" name="input-reported-by"
                            value="<?php echo e($report->reported_by); ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="input-description">Description</label>
                        <input class="form-control" type="text" name="input-description" rows="4"
                            value="<?php echo e($report->description); ?>">
                    </div>
                    <div class="col-12">
                        <?php if($action === 'edit'): ?>
                            <button class="btn btn-primary" type="submit">Update</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmer/EMF/resources/views/employeeFolder/edit.blade.php ENDPATH**/ ?>
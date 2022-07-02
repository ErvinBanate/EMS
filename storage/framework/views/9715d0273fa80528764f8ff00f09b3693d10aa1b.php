<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php if($role === 'Employee'): ?>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1 class='text-center'>Fire Incident Reports</h1>
                    <br>
                    <form class="row g-3" method="POST" action="<?php echo e(route('store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-3">
                            <label class="form-label" for="input-street">Street</label>
                            <input class="form-control" type="text" name="input-street">
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
                            <select class="form-control" name="input-fire-alarm-level">
                                <option value="First Alarm">First Alarm</option>
                                <option value="Second Alarm">Second Alarm</option>
                                <option value="Third Alarm">Third Alarm</option>
                                <option value="Fourth Alarm">Fourth Alarm</option>
                                <option value="Fifth Alarm">Fifth Alarm</option>
                                <option value="Task Force Alpha">Task Force Alpha</option>
                                <option value="Task Force Bravo">Task Force Bravo</option>
                                <option value="Task Force Charlie">Task Force Charlie</option>
                                <option value="Task Force Delta">Task Force Delta</option>
                            </select>
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
                            <p class="form-control"><?php echo e(Auth::user()->name); ?></p>
                            <input class="form-control" type="hidden" name="input-reported-by"
                                value="<?php echo e(Auth::user()->id); ?>">
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
                    <h1 class='text-center'>Pending Fire Incident Reports</h1>
                    <br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th class='text-center'>Street</th>
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
                                <?php if($report['is_approved'] == 0 && $report['is_rejected'] == 0): ?>
                                    <tr>
                                        <td class='text-center'><?php echo e($report['street']); ?></td>
                                        <td class='text-center'><?php echo e($report['block_no']); ?></td>
                                        <td class='text-center'><?php echo e($report['house_type']); ?></td>
                                        <td class='text-center'><?php echo e($report['date']); ?></td>
                                        <td class='text-center'><?php echo e($report['fire_alarm_level']); ?></td>
                                        <td class='text-center'><?php echo e($report['cause_of_incident']); ?></td>
                                        <td class='text-center'><?php echo e($report['estimated_damage']); ?></td>
                                        <td class='text-center'><?php echo e($report->reportedBy->name); ?></td>
                                        <?php if($report['is_approved'] == 0 && $report['is_rejected'] == 0): ?>
                                            <td class='text-center'>Pending</td>
                                        <?php else: ?>
                                            <td class='text-center'>Data Error</td>
                                        <?php endif; ?>
                                        <td class="text-center"><a href="<?php echo e(route('show', $report['id'])); ?>">View</a>
                                        </td>
                                        <td class="text-center"><a href="<?php echo e(route('edit', $report['id'])); ?>">Edit</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo e(route('remove', $report['id'])); ?>">Remove</a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1 class='text-center'>Rejected Fire Incident Reports</h1>
                    <br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th class='text-center'>Street</th>
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
                                <?php if($report['is_approved'] == 0 && $report['is_rejected'] == 1): ?>
                                    <tr>
                                        <td class='text-center'><?php echo e($report['street']); ?></td>
                                        <td class='text-center'><?php echo e($report['block_no']); ?></td>
                                        <td class='text-center'><?php echo e($report['house_type']); ?></td>
                                        <td class='text-center'><?php echo e($report['date']); ?></td>
                                        <td class='text-center'><?php echo e($report['fire_alarm_level']); ?></td>
                                        <td class='text-center'><?php echo e($report['cause_of_incident']); ?></td>
                                        <td class='text-center'><?php echo e($report['estimated_damage']); ?></td>
                                        <td class='text-center'><?php echo e($report->reportedBy->name); ?></td>
                                        <?php if($report['is_approved'] == 0 && $report['is_rejected'] == 1): ?>
                                            <td class='text-center'>Rejected</td>
                                        <?php else: ?>
                                            <td class='text-center'>Data Error</td>
                                        <?php endif; ?>
                                        <td class="text-center"><a href="<?php echo e(route('edit', $report['id'])); ?>">Edit</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo e(route('remove', $report['id'])); ?>">Remove</a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
        <?php if($role === 'Team Leader'): ?>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1 class='text-center'>Pending Fire Incident Reports</h1>
                    <br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th class='text-center'>Street</th>
                            <th class='text-center'>Block Number</th>
                            <th class='text-center'>House Type</th>
                            <th class='text-center'>Date</th>
                            <th class='text-center'>Fire Alarm Level</th>
                            <th class='text-center'>Cause of Incident</th>
                            <th class='text-center'>Estimated Damage</th>
                            <th class='text-center'>Reported By</th>
                            <th class='text-center'>Status</th>
                            <th class='text-center'>Approve</th>
                            <th class='text-center'>Reject</th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($report['is_approved'] == 0 && $report['is_rejected'] == 0): ?>
                                    <tr>
                                        <td class='text-center'><?php echo e($report['street']); ?></td>
                                        <td class='text-center'><?php echo e($report['block_no']); ?></td>
                                        <td class='text-center'><?php echo e($report['house_type']); ?></td>
                                        <td class='text-center'><?php echo e($report['date']); ?></td>
                                        <td class='text-center'><?php echo e($report['fire_alarm_level']); ?></td>
                                        <td class='text-center'><?php echo e($report['cause_of_incident']); ?></td>
                                        <td class='text-center'><?php echo e($report['estimated_damage']); ?></td>
                                        <td class='text-center'><?php echo e($report->reportedBy->name); ?></td>
                                        <?php if($report['is_approved'] == 0 && $report['is_rejected'] == 0): ?>
                                            <td class='text-center'>Pending</td>
                                        <?php else: ?>
                                            <td class='text-center'>Data Error</td>
                                        <?php endif; ?>
                                        <td class="text-center">
                                            <a href="<?php echo e(route('confirmApprove', $report['id'])); ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo e(route('confirmReject', $report['id'])); ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmer/EMF/resources/views/employeeFolder/create.blade.php ENDPATH**/ ?>
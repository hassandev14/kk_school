

<?php $__env->startSection('content'); ?>
<div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Teachr Salary History</h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">
 <?php if($errors->any()): ?>
<h4><?php echo e($errors->first()); ?></h4>
<?php endif; ?>
                        <div class="container-fluid">
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-b-30 m-t-0">Teachr Salary Data</h4>

                                            <div class="table-responsive">
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Teachr id</th>
                                                        <th>salary</th>
                                                        <th>apply_date</th>
                                                    </tr>
                                                    </thead>


                                                    <tbody>
                                                        <?php $__currentLoopData = $salary_history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($dat->teacher_id); ?></td>
                                                        <td><?php echo e($dat->salary); ?></td>
                                                        <td><?php echo e($dat->apply_date); ?></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div> <!-- End Row -->


                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                    © 2016 - 2018 Appzia - All Rights Reserved.
                </footer>

            </div>
            <!-- End Right content here -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\kk_school\resources\views/teacher_salary_history.blade.php ENDPATH**/ ?>
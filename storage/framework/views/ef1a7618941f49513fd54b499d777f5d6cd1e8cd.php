

<?php $__env->startSection('content'); ?>
<div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Teachers Data</h4>
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
                                            <h4 class="m-b-30 m-t-0">Teachers</h4>

                                            <div class="table-responsive">
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Teacher Name</th>
                                                        <th>Father name</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Salary</th>
                                                        <th>Gender</th>
                                                        <th>joining Date</th>
                                                        <th>Image</th>
                                                        <th>Action</th>
                                                        <th>More</th>
                                                    </tr>
                                                    </thead>


                                                    <tbody>
                                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($dat->teacher_name); ?></td>
                                                        <td><?php echo e($dat->father_name); ?></td>
                                                        <td><?php echo e($dat->phone); ?></td>
                                                        <td><?php echo e($dat->address); ?></td>
                                                        <?php $__currentLoopData = $teacher_saalry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <td><?php echo e($teacher->salary); ?></td>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <td><?php echo e($dat->gender); ?></td>
                                                        <td><?php echo e($dat->joining_date); ?></td>
                                                        <td><img src="teachers_images/<?php echo e($dat->image_name); ?>" width="80" height="50"></td>
                                                        <td>
                                                      <a href="edit_teacher/<?php echo e($dat->id); ?>"><i class= "fas fa-edit"></i></a> 
                                                      <a href="delete_teacher/<?php echo e($dat->id); ?>"><i class="fas fa-trash"></i></a> 
                                                    </td>
                                                    <td>
                                                    <a href="add_teacher_salary/<?php echo e($dat->id); ?>"><i></i>Add Teacher Salary</a><br>
                                                    <a href="teacher_salary_history/<?php echo e($dat->id); ?>"><i></i>See Teacher Salary History</a> 
                                                    </td>
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


<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\kk_school\resources\views/teacher.blade.php ENDPATH**/ ?>
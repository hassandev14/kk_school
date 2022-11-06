

<?php $__env->startSection('content'); ?>
<div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Students</h4>
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
                                            <h4 class="m-b-30 m-t-0">Students Data</h4>

                                            <div class="table-responsive">
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Roll No</th>
                                                        <th>Student Name</th>
                                                        <th>Father name</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Gender</th>
                                                        <th>Admission Date</th>
                                                        <th>Class</th>
                                                        <th>Image</th>
                                                        <th>Action</th>
                                                        <th>More</th>
                                                    </tr>
                                                    </thead>


                                                    <tbody>
                                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <?php $current_class = $dat->student_classes->keys()->last() ?>
                                                    <tr>
                                                        <td><?php echo e($dat->roll_no); ?></td>
                                                        <td><?php echo e($dat->student_name); ?></td>
                                                        <td><?php echo e($dat->father_name); ?></td>
                                                        <td><?php echo e($dat->phone); ?></td>
                                                        <td><?php echo e($dat->address); ?></td>
                                                        <td><?php echo e($dat->gender); ?></td>
                                                        <td><?php echo e($dat->admission_date); ?></td>
                                                        <td><a href = "subject?my_classes_id=<?php echo e($dat->class_id); ?>"><?php echo e($dat->class_name); ?></a></td>
                                                        <td><img src="students_images/<?php echo e($dat->image_name); ?>" width="80" height="50"></td>
                                                        <td>
                                                      <a href="edit_student/<?php echo e($dat->id); ?>"><i class= "fas fa-edit"></i></a> 
                                                      <a href="delete_student/<?php echo e($dat->id); ?>"><i class="fas fa-trash"></i></a> 
                                                     <?php if($dat->class_id): ?>
                                                      <a href="subject?my_classes_id=<?php echo e($dat->student_class_id); ?>">See Subjects</a>
                                                      <?php endif; ?>
                                                    </td>
                                                    <td>
                                                    <a href="add_student_fee/<?php echo e($dat->id); ?>"><i></i>Add Student Fee</a><br>
                                                      <a href="student_fee_history/<?php echo e($dat->id); ?>"><i></i>See Student Fee History</a> 
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


<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\kk_school\resources\views/students.blade.php ENDPATH**/ ?>
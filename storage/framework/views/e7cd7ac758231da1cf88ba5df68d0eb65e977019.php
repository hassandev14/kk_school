

<?php $__env->startSection('content'); ?>

<!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Students </h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">
                   
                        <div class="container-fluid">
                        <form action="/update_student" style="border:1px solid #ccc" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0 m-b-30">Update Student</h4>

                                            <form class="form-horizontal" role="form">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="student_name">Student Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="teacher_name" name="student_name" value="<?php echo e($data->student_name); ?> <?php echo e(old('student_name')); ?>">                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Father Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="father_name" name="father_name" class="form-control" value="<?php echo e($data->father_name); ?> <?php echo e(old('father_name')); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Phone">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e($data->phone); ?> <?php echo e(old('phone')); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Address">Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo e($data->address); ?> <?php echo e(old('address')); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Roll No</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="roll_no" name="roll_no" class="form-control"value="<?php echo e($data->roll_no); ?> <?php echo e(old('roll_no')); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="Address">Joining Date</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="admission_date" value="<?php echo e($data->admission_date); ?> <?php echo e(old('admission_date')); ?>">
                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Gender</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='gender' >
                                                        <option>Select Gender</option>
                                                            <option value="male">Men</option>
                                                            <option value="women">Women</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="image">image</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control" id="image_name" name="image_name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                    <input type="submit" value="submit" name="add_recored"> 
                                                    <input type="hidden" value="<?php echo e($data->id); ?>" name="id"> 
                                                    <input type="hidden" value="<?php echo e($data->image_name); ?>" name="old_image_name"> 
                                                    
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- card-body -->
                                    </div> <!-- card -->
                                </div> <!-- col -->
                            </div> 
                          </form><!-- End row -->



                        </div><!-- container-fluid -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                    © 2016 - 2018 Appzia - All Rights Reserved.
                </footer>

            </div>
            <!-- End Right content here -->
            <?php $__env->stopSection(); ?>      
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\kk_school\resources\views/update_student.blade.php ENDPATH**/ ?>
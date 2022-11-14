

<?php $__env->startSection('content'); ?>
<!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Student Class </h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">
                   
                        <div class="container-fluid">
                        <form action="<?php echo e(url('add_student_classes')); ?>" style="border:1px solid #ccc" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0 m-b-30">Add Student Class</h4>

                                            <form class="form-horizontal" role="form">
                                            <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Student Name</label>
                                                    <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="<?php echo e($student->student_name); ?>" name="student_name" readonly> 
                                                    <input type="hidden" class="form-control" value="<?php echo e($student->id); ?>" name="student_id" >
                                                </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Student Old Fee</label>
                                                    <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="<?php echo e($student->fee); ?>" name="old_fee" readonly> 
                                                    
                                                </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">New Class Name</label>
                                                    <div class="col-sm-10">

                                                        <?php
                                                        $cl_id;
                                                        $cl_name='';
                                                        $cl_fee;
                                                        if($student->new_class_id)
                                                        {
                                                            $cl_id = $student->new_class_id;
                                                            $cl_name = $student->new_class_name;
                                                            $cl_fee = $student->new_class_fee;
                                                        
                                                        }else{
                                                            $cl_id = $student->initial_class_id;
                                                            $cl_name = $student->initial_class_name;
                                                            $cl_fee = $student->initial_class_fee;
                                                        }
                                                        ?>

                                                    <input type="text" class="form-control" value="<?php echo e($cl_name); ?>" name="new_class" readonly> 
                                                    <input type="hidden" class="form-control" value="<?php echo e($cl_id); ?>" name="new_class">
                                                </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Name">New Fee Amount</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="<?php echo e($cl_fee); ?>" id="fee" name="fee" required>
                                                    </div>
                                                </div>        
                                                <div class="form-group row d-flex flex-row-reverse">
                                                    <div class="col-sm-10">
                                                    <input type="submit" value="submit" name="add_recored" class='btn btn-primary '> 
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
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\kk_school\resources\views/add_student_classes.blade.php ENDPATH**/ ?>
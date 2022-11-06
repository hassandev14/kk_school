

<?php $__env->startSection('content'); ?>
<!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Teacher salary</h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">
                   
                        <div class="container-fluid">
                        <form action="<?php echo e(url('add_teacher_salary')); ?>" style="border:1px solid #ccc" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0 m-b-30">Add Teacher salary</h4>

                                            <form class="form-horizontal" role="form">
                                            <div class="form-group row">
                                                <?php
                                                foreach($teacher_name[0] as $name){
                                                    ?>
                                                    <label class="col-sm-2 control-label" for="student_name">teacher Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="<?php echo e($name); ?>" name="teacher_id" readonly>                                                    </div>
                                                </div>
                                               <?php }
                                                ?>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Name">Fee</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="" name="salary">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="Address">Apply Date</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="apply_date">
                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                </div>
                                                <div class="form-group row  d-flex flex-row-reverse">
                                                    <div class="col-sm-10">
                                                    <input type="submit" value="submit" name="add_recored" class='btn btn-primary '>
                                                    <input type="hidden" value="<?php echo e($id); ?>" name="id">  
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
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\kk_school\resources\views/add_teacher_salary.blade.php ENDPATH**/ ?>
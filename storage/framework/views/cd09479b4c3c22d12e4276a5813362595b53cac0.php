

<?php $__env->startSection('content'); ?>

<!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Exams </h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">
                   
                        <div class="container-fluid">
                        <form action="/update_exam" style="border:1px solid #ccc" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0 m-b-30">Update Exams</h4>

                                            <form class="form-horizontal" role="form">
                                            <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Exam category</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='exam_category' >
                                                        <option>Select Category</option>
                                                            <option value="weekly exam">Weekly Exmas</option>
                                                            <option value="monthly exam">Monthly Exmas</option>
                                                            <option value="mid term">Mid Terms</option>
                                                            <option value="annual exam">Annual Exams</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="Address">Starting Date</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker-autoclose" name="starting_date">
                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="Address">Ending Date</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="yyyy/mm/dd"id="datepicker-autoclose" name="ending_date">
                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Address">Total marks</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="total_marks" name="total_marks" value="<?php echo e($data->total_marks); ?> <?php echo e(old('total_marks')); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                    <input type="submit" value="submit" name="add_recored">                                                     
                                                    <input type="hidden" value="<?php echo e($data->id); ?>" name="id">                                                    
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
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\kk_school\resources\views/update_exam.blade.php ENDPATH**/ ?>
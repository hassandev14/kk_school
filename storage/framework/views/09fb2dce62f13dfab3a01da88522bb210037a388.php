

<?php $__env->startSection('content'); ?>
<!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Subject </h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">
                   
                        <div class="container-fluid">
                        <form action="add_subject" style="border:1px solid #ccc" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0 m-b-30">Add Subject</h4>

                                            <form class="form-horizontal" role="form">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Name">Subject Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="" id="subject_name" name="subject_name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Class Id</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='my_classes_id' required>
                                                        <option value="">Select Class</option>
                                                            <?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($cal->id); ?>"><?php echo e($cal->class_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex flex-row-reverse">
                                                    <div class="col-sm-10 p-2">
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
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\kk_school\resources\views/add_subject.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>

<!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Teachers </h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">
                   
                        <div class="container-fluid">
                        <form action="<?php echo e(url('update_admin')); ?>" style="border:1px solid #ccc" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0 m-b-30">Update Admin</h4>

                                            <form class="form-horizontal" role="form">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="admin_name">Admin Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="<?php echo e($data->admin_name); ?> <?php echo e(old('admin_name')); ?>" id="admin_name" name="admin_name">                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="password">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo e($data->email); ?> <?php echo e(old('email')); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="password">password</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="phone" name="password" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="image">image</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control" id="image_name" name="image_name">
                                                        <?php
                                                         if($data->image_name!='')
                                                         {?>
                                                        <div><img src="admins_images/<?php echo e($data->image_name); ?>" width="40" height="50"></div>
                                                        <?php }
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="form-group row d-flex flex-row-reverse">
                                                    <div class="col-sm-10 ">
                                                    <input type="submit" value="submit" name="update_admin" class='btn btn-primary '> 
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
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\kk_school\resources\views/profile.blade.php ENDPATH**/ ?>
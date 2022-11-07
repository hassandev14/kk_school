

<?php $__env->startSection('content'); ?>

<!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Teachers Salary </h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">
                   
                        <div class="container-fluid">
                        <form action="/update_teacher_salary_paid" style="border:1px solid #ccc" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0 m-b-30">Update Teacher Salary</h4>

                                            <form class="form-horizontal" role="form">
                                            <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Select teacher</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='teacher_id'>
                                                            <option>Select teacher</option>
                                                            <?php
                                                            foreach($teacher as $teach)
                                                            { 
                                                                $selected="";
                                                                if($data->teacher_id==$teach->id)
                                                                {
                                                                  $selected= "selected=selected";
                                                                }?>
                                                            <option <?php echo e($selected); ?> value="<?php echo e($teach->id); ?>"><?php echo e($teach->teacher_name); ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Method</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='method' >
                                                        <option>Select Method</option>
                                                            <option value="cash" <?php                                                                                                  
                                                                                       if($data->method=='cash')
                                                                                   {
                                                                                      echo 'selected=selected';
                                                                                   }
                                                                                  
                                                                                                                 ?> >Cash</option>
                                                            <option value="cheque" <?php                                                                                                  
                                                                                       if($data->method=='cheque')
                                                                                   {
                                                                                      echo 'selected=selected';
                                                                                   }
                                                                                  
                                                                                                                 ?> >Cheque</option>
                                                            <option value="deposit" <?php                                                                                                  
                                                                                       if($data->method=='deposit')
                                                                                   {
                                                                                      echo 'selected=selected';
                                                                                   }
                                                                                  
                                                                                                                 ?>>Bank deposit</option>
                                                        </select>
                                                    </div> 
                                                </div>
                                                <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="Address">Pay Date</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="pay_date" value="<?php echo e($data->pay_date); ?> <?php echo e(old('pay_date')); ?>">
                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Status</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='status' >
                                                        <option>Select Status</option>
                                                            <option value="paid" <?php                                                                                                  
                                                                                       if($data->status=='paid')
                                                                                   {
                                                                                      echo 'selected=selected';
                                                                                   }
                                                                                  
                                                                                                                 ?>>Paid</option>
                                                            <option value="unpaid" <?php                                                                                                  
                                                                                       if($data->status=='unpaid')
                                                                                   {
                                                                                      echo 'selected=selected';
                                                                                   }
                                                                                  
                                                                                                                 ?>>Unpaid</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="image">image</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control" id="image_name" name="image_name">
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex flex-row-reverse">
                                                    <div class="col-sm-10">
                                                    <input type="submit" value="submit" name="add_recored" class='btn btn-primary '> 
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
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\kk_school\resources\views/update_teacher_salary_paid.blade.php ENDPATH**/ ?>
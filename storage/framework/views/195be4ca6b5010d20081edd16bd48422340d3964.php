

<?php $__env->startSection('content'); ?>
<!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Expense </h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">
                   
                        <div class="container-fluid">
                        <form action="add_expense" style="border:1px solid #ccc" enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0 m-b-30">Add Expense</h4>

                                            <form class="form-horizontal" role="form">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Name">Expense Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="" id="expense_name" name="expense_name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Name">Expense Detail</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="" id="expense_detail" name="expense_detail" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Name">Expense Amount</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="" id="expense_amount" name="expense_amount" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Given By</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='employe_id' id="employe_id"  required="required">
                                                        <option value="" >Select Employe</option>
                                                            <?php $__currentLoopData = $employe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($emp->id); ?>"><?php echo e($emp->employe_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Categoty</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='category_id' id='category_id' required="required">
                                                        <option  value="" >Select Category</option>
                                                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
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
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\kk_school\resources\views/add_expense.blade.php ENDPATH**/ ?>
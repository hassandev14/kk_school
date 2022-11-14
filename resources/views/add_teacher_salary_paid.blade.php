 @extends('layouts.default')

@section('content')
<!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Teachers Salary</h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">
                   
                        <div class="container-fluid">
                        <form action="{{url('add_teacher_salary_paid')}}" style="border:1px solid #ccc" enctype="multipart/form-data" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0 m-b-30">Add Teachers Salary</h4>

                                            <form class="form-horizontal" role="form">
                                            <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Select Teacher</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='teacher_id' required>
                                                        <option>Select Teacher</option>
                                                            @foreach($teacher as $teach)
                                                            <option value="{{$teach->id}}">{{$teach->teacher_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Method</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='method' required>
                                                        <option>Select Method</option>
                                                            <option value="cash">Cash</option>
                                                            <option value="cheque">Cheque</option>
                                                            <option value="deposit">deposit</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="Address">Pay Date</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="pay_date" required>
                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Status</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='status' required>
                                                        <option>Select Status</option>
                                                            <option value="paid">Paid</option>
                                                            <option value="unpaid">Unpaid</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="image">image</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control" id="image_name" name="image_name" required>
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
            @stop      
           
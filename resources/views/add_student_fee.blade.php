@extends('layouts.default')

@section('content')
<!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Student Fee</h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">
                   
                        <div class="container-fluid">
                        <form class="form-horizontal" action="{{url('add_student_fee')}}" style="border:1px solid #ccc" enctype="multipart/form-data" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0 m-b-30">Add Student Fee</h4>

                                            <form class="form-horizontal" role="form">
                                            <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="student_name">Student Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="{{$data->student_name}}" name="student_id" readonly>                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Fee">Current Fee</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="{{$data->fee}}" readonly name="fee">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Fee">New Fee</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="" name="fee" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="apply_date">Apply Date</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="apply_date" required>
                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                </div>
                                                <div class="form-group row  d-flex flex-row-reverse">
                                                    <div class="col-sm-10">
                                                    <input type="submit" value="submit" name="add_recored" class='btn btn-primary '>
                                                    <input type="hidden" value="{{$data->id}}" name="id">  
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
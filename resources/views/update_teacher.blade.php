@extends('layouts.default')

@section('content')

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
                        <form action="/update_teacher" style="border:1px solid #ccc" enctype="multipart/form-data" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0 m-b-30">Update Teacher</h4>

                                            <form class="form-horizontal" role="form">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="teacher_name">Teacher Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="{{$data->teacher_name}} {{old('teacher_name')}}" id="teacher_name" name="teacher_name">                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Father Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="father_name" name="father_name" class="form-control" value="{{$data->father_name}} {{old('father_name')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Phone">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="phone" name="phone" value="{{$data->phone}} {{old('phone')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Address">Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="address" name="address" value="{{$data->address}} {{old('address')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Salary</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="salary" name="salary" class="form-control" value="{{$data->salary}} {{old('salary')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="Address">Joining Date</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="joining_date" value="{{$data->joining_date}} {{old('joining_date')}}">
                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Gender</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='gender' >
                                                        <option>Select Gender</option>
                                                            <option value="men">Men</option>
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
                                                    <input type="hidden" value="{{$data->id}}" name="id"> 
                                                    <input type="hidden" value="{{$data->image_name}}" name="old_image_name"> 
                                                    
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
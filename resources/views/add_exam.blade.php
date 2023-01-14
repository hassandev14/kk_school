@extends('layouts.default')

@section('content')
<!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Exams Shedule </h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">
                   
                        <div class="container-fluid">
                        <form action="{{url('add_exam')}}" style="border:1px solid #ccc" enctype="multipart/form-data" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0 m-b-30">Add Exams Shedule</h4>

                                            <form class="form-horizontal" role="form">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Name">Class Name</label>
                                                    <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="{{$data->class_name}}"readonly>  
                                                    <input type="hidden" class="form-control" value="{{$data->id}}" id="class_id" name="class_id"> 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="Address">Start To End Date</label>
                                                <div class="col-sm-10">
                                                <div class="input-daterange input-group" id="date-range">
                                                                <input type="text" class="form-control" name="start_date" />
                                                                <span class="input-group-addon bg-primary text-white b-0">to</span>
                                                                <input type="text" class="form-control" name="end_date" />
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Exam Timing</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='timing' required>
                                                        <option>Select Exam Timimg</option>
                                                            <option value="1_hour">1 Hour</option>
                                                            <option value="2_hour">2 Hour</option>
                                                            <option value="3_hour">3 Hour</option>
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
            @stop      
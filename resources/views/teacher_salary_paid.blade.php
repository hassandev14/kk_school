@extends('layouts.default')

@section('content')
<div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Teachers Salary Data</h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">
 @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
                        <div class="container-fluid">
                        <div class="row">
                        <div class="form-group row">
                        <label class="col-sm-2 control-label" for="Address">Select Date</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="pay_date">
                                        <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i></span>
                                </div>
                        </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-b-30 m-t-0">Teachers Salary</h4>

                                            <div class="table-responsive">
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Teacher Name</th>
                                                        <th>Monnth</th>
                                                        <th>Year</th>
                                                        <th>Method</th>
                                                        <th>Pay Date</th>
                                                        <th>status</th>
                                                        <th>Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>


                                                    <tbody>
                                                        @foreach($data as $dat)
                                                    <tr>
                                                        <td>{{$teacher[0]->teacher_name}}</td>
                                                        <td>{{$dat->month}}</td>
                                                        <td>{{$dat->year}}</td>
                                                        <td>{{$dat->method}}</td>
                                                        <td>{{$dat->pay_date}}</td>
                                                        <td>{{$dat->status}}</td>
                                                        <td><img src="teacher_salary_images/{{$dat->image_name}}" width="80" height="50"></td>
                                                        <td>
                                                      <a href="edit_teacher_salary_paid/{{$dat->id}}"><i class= "fas fa-edit"></i></a> 
                                                      <a href="delete_teacher_salary_paid/{{$dat->id}}"><i class="fas fa-trash"></i></a> 
                                                    </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div> <!-- End Row -->


                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                    © 2016 - 2018 Appzia - All Rights Reserved.
                </footer>

            </div>
            <!-- End Right content here -->
@stop


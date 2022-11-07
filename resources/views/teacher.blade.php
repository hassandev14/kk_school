@extends('layouts.default')

@section('content')
<div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Teachers Data</h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">
 @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
                        <div class="container-fluid">
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-b-30 m-t-0">All Teachers</h4>

                                            <div class="table-responsive">
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Teacher Id</th>
                                                        <th>Teacher Name</th>
                                                        <th>Father name</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Gender</th>
                                                        <th>joining Date</th>
                                                        <th>Image</th>
                                                        <th>Salary</th>
                                                        <th>Action</th>
                                                        <th>More</th>
                                                    </tr>
                                                    </thead>


                                                    <tbody>
                                                        @foreach($data as $dat)
                                                    <tr>
                                                        <td>{{$dat->id}}</td>
                                                        <td>{{$dat->teacher_name}}</td>
                                                        <td>{{$dat->father_name}}</td>
                                                        <td>{{$dat->phone}}</td>
                                                        <td>{{$dat->address}}</td>
                                                        <td>{{$dat->gender}}</td>
                                                        <td>{{$dat->joining_date}}</td>
                                                        <td><img src="teachers_images/{{$dat->image_name}}" width="80" height="50"></td>
                                                        <td>{{$dat->salary}}</td>
                                                        <td>
                                                      <a href="edit_teacher/{{$dat->id}}"><i class= "fas fa-edit"></i></a> 
                                                      <a href="delete_teacher/{{$dat->id}}"><i class="fas fa-trash"></i></a> 
                                                    </td>
                                                    <td>
                                                    <a href="add_teacher_salary/{{$dat->id}}"><i></i>Add Teacher Salary</a><br>
                                                    <a href="teacher_salary_history/{{$dat->id}}"><i></i>See Teacher Salary History</a> 
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


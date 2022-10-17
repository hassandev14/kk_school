@extends('layouts.default')

@section('content')
@dd($data[0])
<div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Students</h4>
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
                                            <h4 class="m-b-30 m-t-0">Students Data</h4>

                                            <div class="table-responsive">
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Student Name</th>
                                                        <th>Student Class</th>
                                                        <th>Fee</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>


                                                    <tbody>
                                                        
                                                        @foreach($data as $dat)
                                                        
                                                    <tr>
                                                        <td>{{$dat->student->student_name}}</td>
                                                        <td>{{$dat->my_classes->class_name}}</td>
                                                        <td>{{$dat->fee}}</td>
                                                        <td>
                                                      <a href="edit_student_classes/{{$dat->id}}"><i class= "fas fa-edit"></i></a> 
                                                      <a href="delete_student_classes/{{$dat->id}}"><i class="fas fa-trash"></i></a> 
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


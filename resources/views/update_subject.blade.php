@extends('layouts.default')

@section('content')
<!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Subject </h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">
                   
                        <div class="container-fluid">
                        <form action="/update_subject" style="border:1px solid #ccc" enctype="multipart/form-data" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0 m-b-30">Update Subject</h4>

                                            <form class="form-horizontal" role="form">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Name">Subject Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="{{$data->subject_name}} {{old('subject_name')}}" id="subject_name" name="subject_name">                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Class</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='category_id' >
                                                        <option>Select Class</option>
                                                        @php
                                                            foreach($class as $cal)
                                                            {
                                                                $selected="";
                                                                if($data->class_id==$cal->id)
                                                             {
                                                                  $selected = "selected=selected";
                                                        }@endphp
                                                            <option {{$selected}} value="{{$cal->id}}">{{$cal->class_name}}</option>
                                                            @php
                                                            }
                                                            @endphp
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                    <input type="submit" value="submit" name="add_recored"> 
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
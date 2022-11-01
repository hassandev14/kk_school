@extends('layouts.default')

@section('content')

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
                        <form action="/update_teacher_salary" style="border:1px solid #ccc" enctype="multipart/form-data" method="POST">
                        @csrf
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
                                                            @php
                                                            foreach($teacher as $teach)
                                                            { 
                                                                $selected="";
                                                                if($data->teacher_id==$teach->id)
                                                                {
                                                                  $selected= "selected=selected";
                                                                }@endphp
                                                            <option {{$selected}} value="{{$teach->id}}">{{$teach->teacher_name}}</option>
                                                            @php
                                                            }
                                                            @endphp
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Method</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='method' >
                                                        <option>Select Method</option>
                                                            <option value="cash" @php                                                                                                  
                                                                                       if($data->method=='cash')
                                                                                   {
                                                                                      echo 'selected=selected';
                                                                                   }
                                                                                  
                                                                                                                 @endphp >Cash</option>
                                                            <option value="cheque" @php                                                                                                  
                                                                                       if($data->method=='cheque')
                                                                                   {
                                                                                      echo 'selected=selected';
                                                                                   }
                                                                                  
                                                                                                                 @endphp >Cheque</option>
                                                            <option value="deposit" @php                                                                                                  
                                                                                       if($data->method=='deposit')
                                                                                   {
                                                                                      echo 'selected=selected';
                                                                                   }
                                                                                  
                                                                                                                 @endphp>Bank deposit</option>
                                                        </select>
                                                    </div> 
                                                </div>
                                                <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="Address">Pay Date</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="pay_date" value="{{$data->pay_date}} {{old('pay_date')}}">
                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Status</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='status' >
                                                        <option>Select Status</option>
                                                            <option value="paid" @php                                                                                                  
                                                                                       if($data->status=='paid')
                                                                                   {
                                                                                      echo 'selected=selected';
                                                                                   }
                                                                                  
                                                                                                                 @endphp>Paid</option>
                                                            <option value="unpaid" @php                                                                                                  
                                                                                       if($data->status=='unpaid')
                                                                                   {
                                                                                      echo 'selected=selected';
                                                                                   }
                                                                                  
                                                                                                                 @endphp>Unpaid</option>
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
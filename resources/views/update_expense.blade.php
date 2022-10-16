@extends('layouts.default')

@section('content')

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
                        <form action="/update_expense" style="border:1px solid #ccc" enctype="multipart/form-data" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0 m-b-30">Update Expense</h4>

                                            <form class="form-horizontal" role="form">
                                            <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Name">Expense Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="{{$data->expense_name}} {{old('expense_name')}}"
                                                         id="expense_name" name="expense_name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Name">Expense Detail</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="{{$data->expense_detail}} {{old('expense_detail')}}"
                                                         id="expense_detail" name="expense_detail">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label" for="Name">Expense Amount</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="{{$data->expense_amount}} {{old('expense_amount')}}"
                                                         id="expense_amount" name="expense_amount">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Given By</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='employe_id'>
                                                            <option>Select Employe</option>
                                                            @php
                                                            foreach($employe as $emp)
                                                            { 
                                                                $selected="";
                                                                if($data->employe_id==$emp->id)
                                                                {
                                                                  $selected= "selected=selected";
                                                                }@endphp
                                                            <option {{$selected}} value="{{$emp->id}}">{{$emp->employe_name}}</option>
                                                            @php
                                                            }
                                                            @endphp
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label">Categoty</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name='category_id' >
                                                        <option>Select Category</option>
                                                        @php
                                                            foreach($category as $cat)
                                                            {
                                                                $selected="";
                                                                if($data->category_id==$cat->id)
                                                             {
                                                                  $selected = "selected=selected";
                                                        }@endphp
                                                            <option {{$selected}} value="{{$cat->id}}">{{$cat->name}}</option>
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
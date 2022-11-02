@extends('layouts.default')

@section('content')
       <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">

                        <form action="{{url('dashboard')}}" class="form-horizontal" role="form" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-1 control-label" for="Address">Select Date</label>
                            <input type="text" required value="{{$date_filter}}" class="form-control col-sm-3 control-label" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="date_filter">
                                            <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i></span>

                                            <input type="submit" value="Filter"  class='btn btn-primary'>
                                        </div>
                                </form>
                                <form action="{{url('dashboard')}}" class="form-horizontal" role="form" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-1 control-label" for="Address">Select Duration</label>
                           <select name='duration' class="form-control col-sm-3" required>
                            <option value="">Select Duration</option>
                            <option value="0" @php                                                                                                  
                                                                                       if($duration == "0")
                                                                                   {
                                                                                      echo 'selected=selected';
                                                                                   }
                                                                                  
                                                                                                                 @endphp>Current Month</option>
                            <option value="3"  @php                                                                                                  
                                                                                       if($duration == "3")
                                                                                   {
                                                                                      echo 'selected=selected';
                                                                                   }
                                                                                  
                                                                                                                 @endphp>Last 3 Months</option>
                            <option value="6"  @php                                                                                                  
                                                                                       if($duration == "6")
                                                                                   {
                                                                                      echo 'selected=selected';
                                                                                   }
                                                                                  
                                                                                                                 @endphp>Las 6 Months</option>
                            <option value="12"  @php                                                                                                  
                                                                                       if($duration == "12")
                                                                                   {
                                                                                      echo 'selected=selected';
                                                                                   }
                                                                                  
                                                                                                                 @endphp>This Year</option>
                            <option value="all"  @php                                                                                                  
                                                                                       if($duration == "all")
                                                                                   {
                                                                                      echo 'selected=selected';
                                                                                   }
                                                                                  
                                                                                                                 @endphp>All</option>
</select>
                                            <input type="submit" value="Filter"  class='btn btn-primary'>
                                        </div>
                                </form>
                                   <h1 style="text-align:center">Data for : {{$for}}</h1>      
                                <div class="row">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card text-center">
                                        <div class="card-heading">
                                            <h4 class="card-title text-muted mb-0">Total Teacher</h4>
                                        </div>
                                        <div class="card-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i ></i><b>{{$teacher}} Teacher</b></h2>
                                            <p class="text-muted m-b-0 m-t-20"><b>48%</b> From Last 24 Hours</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                    <div class="card text-center">
                                        <div class="card-heading">
                                            <h4 class="card-title text-muted mb-0">Total Student</h4>
                                        </div>
                                        <div class="card-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i ></i><b>{{$student}} Student</b></h2>
                                            <p class="text-muted m-b-0 m-t-20"><b>42%</b> Orders in Last 10 months</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                    <div class="card text-center">
                                        <div class="card-heading">
                                            <h4 class="card-title text-muted mb-0">Total Employe</h4>
                                        </div>
                                        <div class="card-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i ></i><b>{{$employe}} Employe</b></h2>
                                            <p class="text-muted m-b-0 m-t-20"><b>22%</b> From Last 24 Hours</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                    <div class="card text-center">
                                        <div class="card-heading">
                                            <h4 class="card-title text-muted mb-0">Monthly Earnings</h4>
                                        </div>
                                        <div class="card-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i class="mdi mdi-arrow-down text-danger m-r-10"></i><b>5621</b></h2>
                                            <p class="text-muted m-b-0 m-t-20"><b>35%</b> From Last 1 Month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card text-center">
                                        <div class="card-heading">
                                            <h4 class="card-title text-muted mb-0">{{$all_fee->count_paid}} Students Paid</h4>
                                        </div>
                                        <div class="card-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i ></i><b>Amount : {{$all_fee->total_paid}}</b></h2>
                                            <p class="text-muted m-b-0 m-t-20"><b></b> For</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                <div class="card text-center">
                                        <div class="card-heading">
                                            <h4 class="card-title text-muted mb-0">{{$all_fee->count_unpaid}} Students Unpaid</h4>
                                        </div>
                                        <div class="card-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i ></i><b>Amount : {{$all_fee->total_unpaid}}</b></h2>
                                            <p class="text-muted m-b-0 m-t-20"><b></b> For </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                    <div class="card text-center">
                                        <div class="card-heading">
                                            <h4 class="card-title text-muted mb-0">{{$all_pay_salary->count_paid}} Salaray Paid</h4>
                                        </div>
                                        <div class="card-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i ></i><b>Amount : {{$all_pay_salary->total_paid}}</b></h2>
                                            <p class="text-muted m-b-0 m-t-20"><b></b>For</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                    <div class="card text-center">
                                        <div class="card-heading">
                                            <h4 class="card-title text-muted mb-0">{{$all_un_pay_salary->count_unpaid}} Un Paid Salary</h4>
                                        </div>
                                        <div class="card-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i></i><b>Amount : {{$all_un_pay_salary->total_unpaid}}</b></h2>
                                            <p class="text-muted m-b-0 m-t-20"><b></b>For </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0">Revenue</h4>

                                            <ul class="list-inline widget-chart m-t-20 text-center">
                                                <li>
                                                    <h4 class=""><b>{{$all_expenses->exp_amount}}</b></h4>
                                                    <p class="text-muted m-b-0">Expenses</p>
                                                </li>
                                                <li>
                                                    <h4 class=""><b>954</b></h4>
                                                    <p class="text-muted m-b-0">Salaries</p>
                                                </li>
                                                <li>
                                                    <h4 class=""><b>8462</b></h4>
                                                    <p class="text-muted m-b-0">Total Fee</p>
                                                </li>
                                            </ul>
                                                <script>
                                                     const donutData ={'exp':{{$all_expenses->exp_amount}},'salaries':{{$all_pay_salary->total_paid}},'fee':{{$all_fee->total_paid}} }   
                                                     console.log(donutData);
                                                </script>    
                                            <div id="morris-donut-example" style="height: 300px"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0">Yearly Income</h4>

                                            <ul class="list-inline widget-chart m-t-20 text-center">
                                                <li>
                                                    <h4 class=""><b>5248</b></h4>
                                                    <p class="text-muted m-b-0">Marketplace</p>
                                                </li>
                                                <li>
                                                    <h4 class=""><b>321</b></h4>
                                                    <p class="text-muted m-b-0">Last week</p>
                                                </li>
                                                <li>
                                                    <h4 class=""><b>964</b></h4>
                                                    <p class="text-muted m-b-0">Last Month</p>
                                                </li>
                                            </ul>

                                            <div id="morris-bar-example" style="height: 300px"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-t-0">Email Sent</h4>

                                            <ul class="list-inline widget-chart m-t-20 text-center">
                                                <li>
                                                    <h4 class=""><b>3654</b></h4>
                                                    <p class="text-muted m-b-0">Marketplace</p>
                                                </li>
                                                <li>
                                                    <h4 class=""><b>954</b></h4>
                                                    <p class="text-muted m-b-0">Last week</p>
                                                </li>
                                                <li>
                                                    <h4 class=""><b>8462</b></h4>
                                                    <p class="text-muted m-b-0">Last Month</p>
                                                </li>
                                            </ul>

                                            <div id="morris-area-example" style="height: 300px"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-b-30 m-t-0">Recent Contacts</h4>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover m-b-0">
                                                            <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>

                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                                <td>$170,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>$162,700</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                                <td>$137,500</td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="m-b-30 m-t-0">Goal Completion</h4>

                                            <p class="font-600 m-b-5">Add Product to cart <span class="text-primary float-right"><b>80%</b></span></p>
                                            <div class="progress  m-b-20">
                                                <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                                </div><!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->

                                            <p class="font-600 m-b-5">Complete Purchases <span class="text-primary float-right"><b>50%</b></span></p>
                                            <div class="progress  m-b-20">
                                                <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                                </div><!-- /.progress-bar .progress-bar-pink -->
                                            </div><!-- /.progress .no-rounded -->

                                            <p class="font-600 m-b-5">Visit Premium plan <span class="text-primary float-right"><b>70%</b></span></p>
                                            <div class="progress  m-b-20">
                                                <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                                </div><!-- /.progress-bar .progress-bar-info -->
                                            </div><!-- /.progress .no-rounded -->

                                            <p class="font-600 m-b-5">Send Inquiries <span class="text-primary float-right"><b>65%</b></span></p>
                                            <div class="progress  m-b-20">
                                                <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%;">
                                                </div><!-- /.progress-bar .progress-bar-warning -->
                                            </div><!-- /.progress .no-rounded -->

                                            <p class="font-600 m-b-5">Monthly Purchases <span class="text-primary float-right"><b>25%</b></span></p>
                                            <div class="progress  m-b-20">
                                                <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                                </div><!-- /.progress-bar .progress-bar-warning -->
                                            </div><!-- /.progress .no-rounded -->

                                            <p class="font-600 m-b-5"> Daily Visits<span class="text-primary float-right"><b>40%</b></span></p>
                                            <div class="progress  m-b-0">
                                                <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                                </div><!-- /.progress-bar .progress-bar-success -->
                                            </div><!-- /.progress .no-rounded -->
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                        </div><!-- container-fluid -->


                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                     © 2016 - 2018 Appzia - All Rights Reserved.
                </footer>
                @stop

   
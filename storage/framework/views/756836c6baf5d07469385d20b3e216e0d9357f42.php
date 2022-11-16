            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--<div class="user-details">-->
                        <!--<div class="pull-left">-->
                            <!--<img src="assets/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">-->
                        <!--</div>-->
                        <!--<div class="user-info">-->
                            <!--<div class="dropdown">-->
                                <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">David Cooper <span class="caret"></span></a>-->
                                <!--<ul class="dropdown-menu">-->
                                    <!--<li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>-->
                                    <!--<li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>-->
                                    <!--<li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>-->
                                    <!--<li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>-->
                                <!--</ul>-->
                            <!--</div>-->

                            <!--<p class="text-muted m-0">Admin</p>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--- Divider -->


                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="dashboard" class="waves-effect"><i class="mdi mdi-home" ></i><span> Dashboard <span class="badge badge-pill badge-primary float-right"></span></span></a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers </span> <span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo e(url('teachers')); ?>">See Teachers</a></li>
                                    <li><a href="<?php echo e(url('add_teacher')); ?>">Add Teachers</a></li>
                                    <li><a href="<?php echo e(url('teacher_salary_paid')); ?>">See Teacher Salary Paid</a></li>
                                    <li><a href="<?php echo e(url('add_teacher_salary_paid')); ?>">Add Teacher Salary Paid</a></li>
                                </ul>
                            </li> 
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-child"></i> <span> Students </span> <span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo e(url('students')); ?>">See Students</a></li>
                                    <li><a href="<?php echo e(url('add_student')); ?>">Add Student</a></li>
                                    <li><a href="<?php echo e(url('student_fee_paid')); ?>">See Students Fess Paid</a></li>
                                    <li><a href="<?php echo e(url('add_students_fee_paid')); ?>">Add Student Fee Paid</a></li>
                                    <li><a href="<?php echo e(url('attendence')); ?>">See Attendence</a></li>
                                    <li><a href="<?php echo e(url('add_attendence')); ?>">Add Attendence</a></li>
                                </ul>
                            </li> 
                            <!-- <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-ios-document"></i> <span> Exams </span> <span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo e(url('exams')); ?>">See Exams</a></li>
                                    <li><a href="<?php echo e(url('add_exam')); ?>">Add Exams</a></li>
                                </ul>
                            </li>  -->
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-album"></i> <span> Category </span> <span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo e(url('category')); ?>">See Category</a></li>
                                    <li><a href="<?php echo e(url('add_category')); ?>">Add Category</a></li>
                                </ul>
                            </li> 
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-dollar-sign"></i> <span> Expense </span> <span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo e(url('expense')); ?>">See Expense</a></li>
                                    <li><a href="<?php echo e(url('add_expense')); ?>">Add Expense</a></li>
                                </ul>
                            </li> 
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-ios-man"></i> <span> Employe </span> <span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo e(url('employe')); ?>">See Employe</a></li>
                                    <li><a href="<?php echo e(url('add_employe')); ?>">Add Employe</a></li>
                                </ul>
                            </li> 
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-book"></i> <span> Subject </span> <span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo e(url('subject')); ?>">See Subject</a></li>
                                    <li><a href="<?php echo e(url('add_subject')); ?>">Add Subject</a></li>
                                </ul>
                            </li> 
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-school"></i> <span> Class </span> <span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo e(url('our_class')); ?>">See Class</a></li>
                                    <li><a href="<?php echo e(url('add_class')); ?>">Add Class</a></li>
                                    <li><a href="<?php echo e(url('class_fee_history')); ?>">See Class Fee</a></li>
                                    <li><a href="<?php echo e(url('student_classes')); ?>">See Student Class</a></li>
                                    <li><a href="<?php echo e(url('add_student_classes')); ?>">Add Student Class</a></li>
                                </ul>
                            </li> 
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End --><?php /**PATH D:\wamp\www\kk_school\resources\views/includes/leftbar.blade.php ENDPATH**/ ?>
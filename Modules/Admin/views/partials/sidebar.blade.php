<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container"> 
    
    <?php
        if (isset($hide) && is_array($hide)) {
            extract($hide);
        }
    ?>
   
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR --> 
        <div class="page-sidebar navbar-collapse collapse">

            <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="nav-item start active open">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item start active open">
                            <a href="{{ url('/')}}" class="nav-link " target="_blank">
                                <i class="icon-bar-chart"></i>
                                <span class="title">View Website</span>
                                <span class="selected"></span>
                            </a>
                        </li> 
                    </ul>
                </li> 

                <li class="nav-item start active {{$Users or null }} {{ (isset($page_title) && $page_title=='Role')?'open':'' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="glyphicon glyphicon-th"></i>
                        <span class="title">User Type</span>
                        <span class="arrow {{ (isset($page_title) && $page_title=='Blog')?'open':'' }}"></span>
                    </a>
                    <ul class="sub-menu" style="display: {{ (isset($page_title) && $page_title=='View Role')?'block':'none' }}">
                        <li class="nav-item  {{ (isset($page_title) && $page_action=='View Role')?'active':'' }}">
                            <a href="{{ route('role') }}" class="nav-link ">
                                <i class="glyphicon glyphicon-eye-open"></i>
                                <span class="title">
                                    View User Type
                                </span>
                            </a>
                        </li>

                        <li class="nav-item  {{ (isset($page_title) && $page_action=='Create Role')?'active':'' }}">
                            <a href="{{ route('role.create') }}" class="nav-link ">
                                <i class="glyphicon glyphicon-eye-open"></i>
                                <span class="title">
                                    Create User Type
                                </span>
                            </a>
                        </li>
                        <li class="nav-item  {{ (isset($page_title) && $page_action=='Update Permission')?'active':'' }}">
                            <a href="{{ url('admin/permission') }}" class="nav-link ">
                                <i class="glyphicon glyphicon-eye-open"></i>
                                <span class="title">
                                    Set Permission
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item {{$Users or null }}   start active  {{ (isset($page_title) && ($page_title=='Admin User' || $page_title=='Front User') )?'open':'' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="glyphicon glyphicon-user"></i>
                        <span class="title">Manage User</span>
                        <span class="arrow {{ (isset($page_title) && $page_title=='Admin User')?'open':'' }}"></span>
                    </a>

                    <ul class="sub-menu" style="display: {{ (isset($page_title) && ($page_title=='Admin User' OR $page_title=='Front User' ))?'block':'none' }}">

                        <li class="nav-item  {{ (isset($page_title) && $page_title=='Admin User')?'open':'' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">Admin User</span>
                                <span class="arrow {{ (isset($page_title) && $page_title=='Admin User')?'open':'' }}"></span>
                            </a>
                            <ul class="sub-menu" style="display: {{ (isset($page_title) && $page_title=='Admin User')?'block':'none' }}">
                                <li class="nav-item  {{ (isset($page_title) && $page_action=='Create Admin User')?'active':'' }}">
                                    <a href="{{ route('user.create') }}" class="nav-link ">
                                        <i class="glyphicon glyphicon-plus-sign"></i>
                                        <span class="title">
                                            Create User
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item  {{ (isset($page_title) && $page_action=='View Admin User')?'active':'' }}">
                                    <a href="{{ route('user') }}" class="nav-link ">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                        <span class="title">
                                            View Users
                                        </span>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        

                    </ul>
                </li> 
 
                
                
                <li class="nav-item start active {{$Press or null }} {{ (isset($page_title) && $page_title=='Category')?'open':'' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="glyphicon glyphicon-th"></i>
                        <span class="title">Product Category</span>
                        <span class="arrow {{ (isset($page_title) && $page_title=='Category')?'open':'' }}"></span>
                    </a>
                    <ul class="sub-menu" style="display: {{ (isset($page_title) && $page_title=='Category')?'block':'none' }}">
                        <li class="nav-item  {{ (isset($page_title) && $page_action=='View Category')?'active':'' }}">
                            <a href="{{ route('category') }}" class="nav-link ">
                                <i class="glyphicon glyphicon-eye-open"></i> 
                                <span class="title">
                                    View Category
                                </span>
                            </a>
                        </li> 
                        <li class="nav-item  {{ (isset($page_title) && $page_action=='Create Press')?'active':'' }}">
                            <a href="{{ route('category.create') }}" class="nav-link ">
                                <i class="glyphicon glyphicon-eye-open"></i> 
                                <span class="title">
                                    Create Category
                                </span>
                            </a>
                        </li> 
                    </ul>
                </li>  

                <li class="nav-item start   active {{ (isset($page_title) && $page_title=='Product')?'open':'' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="glyphicon glyphicon-th"></i>
                        <span class="title">Manage Products</span>
                        <span class="arrow {{ (isset($page_title) && $page_title=='Product')?'open':'' }}"></span>
                    </a>
                    <ul class="sub-menu" style="display: {{ (isset($page_title) && $page_title=='Product')?'block':'none' }}">

                        <li class="nav-item  {{ (isset($page_title) && $page_action=='Create Product')?'active':'' }}">
                            <a href="{{ route('product.create') }}" class="nav-link ">
                                <i class="glyphicon glyphicon-eye-open"></i> 
                                <span class="title">
                                    Add Product
                                </span>
                            </a>
                        </li> 
                        <li class="nav-item  {{ (isset($page_title) && $page_action=='View Product')?'active':'' }}">
                            <a href="{{ route('product') }}" class="nav-link ">
                                <i class="glyphicon glyphicon-eye-open"></i> 
                                <span class="title">
                                    View Product 
                                </span>
                            </a>
                        </li> 
 

                    </ul>
                </li>

              


                <li class="nav-item start active {{$Page or null }} {{ (isset($page_title) && $page_title=='Page')?'open':'' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="glyphicon glyphicon-th"></i>
                        <span class="title">Manage Pages </span>
                        <span class="arrow {{ (isset($page_title) && $page_title=='Page')?'open':'' }}"></span>
                    </a>
                    <ul class="sub-menu" style="display: {{ (isset($page_title) && $page_title=='Page')?'block':'none' }}">
                        <li class="nav-item  {{ (isset($page_title) && $page_action=='View Page')?'active':'' }}">
                            <a href="{{ route('content') }}" class="nav-link ">
                                <i class="glyphicon glyphicon-eye-open"></i> 
                                <span class="title">
                                    View Pages
                                </span>
                            </a>
                        </li>

                        <li class="nav-item  {{ (isset($page_title) && $page_action=='Create Page')?'active':'' }}">
                            <a href="{{ route('content.create') }}" class="nav-link ">
                                <i class="glyphicon glyphicon-eye-open"></i> 
                                <span class="title">
                                    Add Page
                                </span>
                            </a>
                        </li> 

                    </ul>
                </li>

              
                <li class="nav-item start active {{$Contact or null }} ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="glyphicon glyphicon-th"></i>
                        <span class="title"> Manage Contact </span>
                        <span class=""></span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu" style="display: {{ (isset($page_title) && $page_title=='Contact')?'block':'none' }}">
                        <li class="nav-item  {{ (isset($page_title) && $page_title=='Contact')?'open':'' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">Contacts</span>
                                <span class="arrow {{ (isset($page_title) && $page_title=='User')?'open':'' }}"></span>
                            </a>
                            <ul class="sub-menu" style="display: {{ (isset($page_title) && $page_title=='Contact')?'block':'none' }}">
                                <li class="nav-item  {{ (isset($page_title) && $page_action=='Create Contact')?'active':'' }}">
                                    <a href="{{ route('contact.create') }}" class="nav-link ">
                                        <i class="glyphicon glyphicon-plus-sign"></i> 
                                        <span class="title">
                                            Create Contact
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item  {{ (isset($page_title) && $page_action=='View Contact')?'active':'' }}">
                                    <a href="{{ route('contact') }}" class="nav-link ">
                                        <i class="glyphicon glyphicon-eye-open"></i> 
                                        <span class="title">
                                            View Contacts
                                        </span>
                                    </a>
                                </li> 
                            </ul>
                        </li> 



                    </ul>

                </li>
                
                 <li class="nav-item start active {{$Coupan or null }} {{ (isset($page_title) && $page_title=='Coupon')?'open':'' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="glyphicon glyphicon-th"></i>
                        <span class="title">Manage Coupon </span>
                        <span class="arrow {{ (isset($page_title) && $page_title=='Coupon')?'open':'' }}"></span>
                    </a>
                    <ul class="sub-menu" style="display: {{ (isset($page_title) && $page_title=='Coupon')?'block':'none' }}">
                        <li class="nav-item  {{ (isset($page_title) && $page_action=='View Coupon')?'active':'' }}">
                            <a href="{{ route('coupan') }}" class="nav-link ">
                                <i class="glyphicon glyphicon-eye-open"></i> 
                                <span class="title">
                                    View Coupon
                                </span>
                            </a>
                        </li>  
                        <li class="nav-item  {{ (isset($page_title) && $page_action=='Create Coupon')?'active':'' }}">
                            <a href="{{ route('coupan.create') }}" class="nav-link ">
                                <i class="glyphicon glyphicon-eye-open"></i> 
                                <span class="title">
                                    Create Coupon
                                </span>
                            </a>
                        </li> 

                    </ul>
                </li>

                <li class="nav-item start active {{$Setting or null }} {{ (isset($page_title) && $page_title=='Setting')?'open':'' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="glyphicon glyphicon-th"></i>
                        <span class="title">Website Setting </span>
                        <span class="arrow {{ (isset($page_title) && $page_title=='Setting')?'open':'' }}"></span>
                    </a>
                    <ul class="sub-menu" style="display: {{ (isset($page_title) && $page_title=='Setting')?'block':'none' }}">
                        <li class="nav-item  {{ (isset($page_title) && $page_action=='View Setting')?'active':'' }}">
                            <a href="{{ route('setting') }}" class="nav-link ">
                                <i class="glyphicon glyphicon-eye-open"></i> 
                                <span class="title">
                                    View Settings
                                </span>
                            </a>
                        </li> 

                    </ul>
                </li>

                 <li class="nav-item start active {{$Setting or null }} {{ (isset($page_title) && $page_title=='Transaction')?'open':'' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="glyphicon glyphicon-th"></i>
                        <span class="title"> Order & Transaction </span>
                        <span class="arrow {{ (isset($page_title) && $page_title=='Transaction')?'open':'' }}"></span>
                    </a>
                    <ul class="sub-menu" style="display: {{ (isset($page_title) && $page_title=='Transaction')?'block':'none' }}">
                        <li class="nav-item  {{ (isset($page_title) && $page_action=='View Transaction')?'active':'' }}">
                            <a href="{{ route('transaction') }}" class="nav-link ">
                                <i class="glyphicon glyphicon-eye-open"></i> 
                                <span class="title">
                                    View Order
                                </span>
                            </a>
                        </li> 

                    </ul>
                </li>

                

               


                <!-- posttask end-->
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ url('/admin/dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="../images/logo-dark.png" alt="">
                        <h3 href=""><b>aSquare</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ ($route == 'dashboard')? 'active':'' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ ($prefix == '/brand')? 'active':'' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Brands</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.brand')? 'active':'' }}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
                </ul>
            </li>
{{--            //Category--}}
            <li class="treeview {{ ($prefix == '/category')? 'active':'' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Categories</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.category')? 'active':'' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
                    <li class="{{ ($route == 'all.sub_category')? 'active':'' }}"><a href="{{ route('all.sub_category') }}"><i class="ti-more"></i>Sub Category</a></li>
                    <li class="{{ ($route == 'all.sub_sub_category')? 'active':'' }}"><a href="{{ route('all.sub_sub_category') }}"><i class="ti-more"></i>Sub_subCategory</a></li>
                </ul>
            </li>


            <li class="treeview {{ ($prefix == '/product')? 'active':'' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li> class="{{ ($route == 'add_product')? 'active':'' }}"<a href="{{ route('add_product') }}"><i class="ti-more"></i>Add Products</a></li>
                    <li> class="{{ ($route == 'product-manage')? 'active':'' }}" <a href="{{ route('product-manage') }}"><i class="ti-more"></i>Manage Products</a></li>
                </ul>
            </li>
            {{--Slider Option--}}
            <li class="treeview {{ ($prefix == '/slider')? 'active':'' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'slider-manage')? 'active':'' }}"> <a href="{{ route('slider-manage') }}"><i class="ti-more"></i>Manage Slider</a></li>
                </ul>
            </li>

            {{----------------Coupon Section Start ----------}}


            <li class="treeview {{ ($prefix == '/coupons')?'active':'' }} ">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Coupons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'coupon-manage')? 'active':'' }}">  <a href="{{ route('coupon-manage') }}"><i class="ti-more"></i>Manage Slider</a></li>
                </ul>
            </li>

            {{----------------Coupon Section End ----------}}

            {{----------------- Shipping Area section started ------------------------}}

            <li class="treeview {{ ($prefix == '/shipping')?'active':'' }} ">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Shipping Area</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'division-manage')? 'active':'' }}">  <a href="{{ route('division-manage') }}"><i class="ti-more"></i>Manage Division</a></li>
                    <li class="{{ ($route == 'district-manage')? 'active':'' }}">  <a href="{{ route('district-manage') }}"><i class="ti-more"></i>Manage District</a></li>
                    <li class="{{ ($route == 'state-manage')? 'active':'' }}">  <a href="{{ route('state-manage') }}"><i class="ti-more"></i>Manage State</a></li>
                </ul>
            </li>

            {{----------------- Shipping Area section end ------------------------}}

            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                    <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                    <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                </ul>
            </li>



        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>

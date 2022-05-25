
@php
    $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach($categories as $category)
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ $category->category_icon }}" width="20px" alt=""> @if(session()->get('language') == 'bangla') {{ $category->category_name_bn }} @else {{ $category->category_name_en }} @endif </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @php
                                    $subcategories = \App\Models\SubCategory::where('category_id',$category->id)->orderBy('sub_category_name_en','ASC')->get();
                                @endphp

                                @foreach($subcategories as $subcategory)

                                    <div class="col-sm-12 col-md-3">
                                        <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->sub_category_slug_en) }}">
                                        <h2 class="title"> @if(session()->get('language') == 'bangla') {{ $subcategory->sub_category_name_bn }} @else {{ $subcategory->sub_category_name_en }} @endif </h2> </a>
                                        @php
                                            $subsubcategories = \App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en','ASC')->get();
                                        @endphp
                                        <ul class="links list-unstyled">
                                            @foreach($subsubcategories as $subsub)
                                                <li><a href="#"> @if(session()->get('language') == 'bangla') {{ $subsub->subsubcategory_name_bn }} @else {{ $subsub->subsubcategory_name_en }} @endif  </a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach {{--end subCategory foreach--}}

                            </div>

                            <!-- /.row -->
                        </li>

                        <!-- /.yamm-content -->
                    </ul>
                    @endforeach
                    <!-- /.dropdown-menu --> </li>
                <!-- /.menu-item -->



                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-heartbeat"></i>Health and Beauty</a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-lg-4">
                                    <ul>
                                        <li><a href="#">Gaming</a></li>
                                        <li><a href="#">Laptop Skins</a></li>
                                        <li><a href="#">Apple</a></li>
                                        <li><a href="#">Dell</a></li>
                                        <li><a href="#">Lenovo</a></li>
                                        <li><a href="#">Microsoft</a></li>
                                        <li><a href="#">Asus</a></li>
                                        <li><a href="#">Adapters</a></li>
                                        <li><a href="#">Batteries</a></li>
                                        <li><a href="#">Cooling Pads</a></li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-4">
                                    <ul>
                                        <li><a href="#">Routers &amp; Modems</a></li>
                                        <li><a href="#">CPUs, Processors</a></li>
                                        <li><a href="#">PC Gaming Store</a></li>
                                        <li><a href="#">Graphics Cards</a></li>
                                        <li><a href="#">Components</a></li>
                                        <li><a href="#">Webcam</a></li>
                                        <li><a href="#">Memory (RAM)</a></li>
                                        <li><a href="#">Motherboards</a></li>
                                        <li><a href="#">Keyboards</a></li>
                                        <li><a href="#">Headphones</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="{{ asset('frontend/assets/images/banners/cat-banner.jpg') }}" /></a> </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu --> </li>
                <!-- /.menu-item -->

                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a>
                    <!-- /.dropdown-menu --> </li>
                <!-- /.menu-item -->

                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a>
                    <!-- ================================== MEGAMENU VERTICAL ================================== -->
                    <!-- /.dropdown-menu -->
                    <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
                <!-- /.menu-item -->

                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a>
                    <!-- /.dropdown-menu --> </li>
                <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>

@extends('admin.admin_master')
@section('admin')

    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">



            <!-- /.col -->
            {{--            ----------------------- add brandPage ----------------}}
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add sub sub Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('sub_sub_category.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $sub_sub_categories->id }}">
                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id"  required="" class="form-control" >
                                        <option value="" selected="" disabled="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $sub_sub_categories->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')

                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>subCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcategory_id"  required="" class="form-control" >
                                        @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}" {{ $sub_category->id == $sub_sub_categories->subcategory_id ? 'selected' : '' }}>{{ $sub_category->sub_category_name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')

                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <h5>subCategory Name English</h5>
                                <div class="controls">
                                    <input type="text" class="form-control "   name="subsubcategory_name_en" value="{{ $sub_sub_categories-> subsubcategory_name_en}}">
                                    @error('subsubcategory_name_en')

                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <h5>Sub_category Bangla</h5>
                                <div class="controls">
                                    <input type="text" class="form-control"  name="subsubcategory_name_bn" value="{{ $sub_sub_categories-> subsubcategory_name_bn}}" >
                                    @error('subsubcategory_name_bn')

                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>

                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <h5>Brand Image</h5>--}}
                            {{--                                <div class="controls">--}}
                            {{--                                    <input type="file" class="form-control "  name="category_icon"  >--}}
                            {{--                                    @error('category_icon')--}}
                            {{--                                    <span class="text-danger">{{ $message }}</span>--}}
                            {{--                                    @enderror--}}
                            {{--                                </div>--}}

                            {{--                            </div>--}}

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-danger" value="Add New"/>
                            </div>
                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    </div>

@endsection

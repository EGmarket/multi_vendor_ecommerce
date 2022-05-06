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
                        <h3 class="box-title">Edit SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('sub_category.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id"  required="" class="form-control" >
                                        <option value="" selected="" disabled="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $sub_categories->category_id ? 'selected': '' }}>{{ $category->category_name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')

                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Brand Name English</h5>
                                <div class="controls">
                                    <input type="text" class="form-control "   name="category_name_en" value="{{ $sub_categories->sub_category_name_en }}">
                                    @error('sub_category_name_en')

                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>

                            </div><div class="form-group">
                                <h5>Brand Name Bangla</h5>
                                <div class="controls">
                                    <input type="text" class="form-control"  name="category_name_bn" value="{{ $sub_categories->sub_category_name_bn }}">
                                    @error('sub_category_name_bn')

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
                                <input type="submit" class="btn btn-danger" value="Update"/>
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

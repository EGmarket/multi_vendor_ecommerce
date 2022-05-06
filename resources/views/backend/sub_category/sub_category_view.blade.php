@extends('admin.admin_master')
@section('admin')

    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sub Category List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>category</th>
                                    <th>Sub Category EN</th>
                                    <th>Sub Category BN</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sub_categories as $sub_category)
                                    <tr>
                                        <td>{{ $sub_category['category']['category_name_en']}}</td>
                                        <td>{{ $sub_category->sub_category_name_en }}</td>
                                        <td>{{ $sub_category->sub_category_name_bn }}</td>

                                        <td>
                                            <a href="{{ route('sub_category.edit',$sub_category->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('sub_category.delete',$sub_category->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>
            <!-- /.col -->
            {{--            ----------------------- add categoryPage ----------------}}
            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add sub Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('sub_category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id"  required="" class="form-control" >
                                        <option value="" selected="" disabled="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')

                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                   </div>
                            </div>


                            <div class="form-group">
                                <h5>subCategory Name English</h5>
                                <div class="controls">
                                    <input type="text" class="form-control "   name="sub_category_name_en">
                                    @error('sub_category_name_en')

                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <h5>Sub_category Bangla</h5>
                                <div class="controls">
                                    <input type="text" class="form-control"  name="sub_category_name_bn" >
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

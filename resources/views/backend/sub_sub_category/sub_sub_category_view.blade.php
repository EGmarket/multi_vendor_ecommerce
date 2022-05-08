@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sub subCategory List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>category</th>
                                    <th>subCategory</th>
                                    <th>Sub Category EN</th>
                                    <th>Sub Category BN</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sub_sub_categories as $sub_category)
                                    <tr>
                                        <td>{{ $sub_category['category']['category_name_en']}}</td>
                                        <td>{{ $sub_category['subcategory']['sub_category_name_en']}}</td>
                                        <td>{{ $sub_category->subsubcategory_name_en }}</td>
                                        <td>{{ $sub_category->subsubcategory_name_bn }}</td>

                                        <td>
                                            <a href="{{ route('sub_sub_category.edit',$sub_category->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('sub_sub_category.delete',$sub_category->id) }}" class="btn btn-danger" id="delete">Delete</a>
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
            {{--            ----------------------- add sub sub categoryPage ----------------}}
            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add sub sub Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('sub_sub_category.store') }}" method="POST" enctype="multipart/form-data">
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
                                <h5>subCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcategory_id"  required="" class="form-control" >
                                        <option value="" selected="" disabled="">Select subCategory</option>

                                    </select>
                                    @error('subcategory_id')

                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <h5>subCategory Name English</h5>
                                <div class="controls">
                                    <input type="text" class="form-control "   name="subsubcategory_name_en">
                                    @error('subsubcategory_name_en')

                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <h5>Sub_category Bangla</h5>
                                <div class="controls">
                                    <input type="text" class="form-control"  name="subsubcategory_name_bn" >
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

    <script type="text/javascript">
        $(document).ready(function (){
            $('select[name="category_id"]').on('change',function (){
                var category_id = $(this).val();
                if(category_id){
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                        type: "GET",
                        dataType:"json",
                        success:function (data){
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data,function (key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' +
                                    value.sub_category_name_en +' </option>');
                            });
                        },
                    });
                } else {
                    alert('danger')
                }
            });
        });
    </script>

@endsection

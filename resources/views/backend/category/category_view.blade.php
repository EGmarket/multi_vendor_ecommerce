@extends('admin.admin_master')
@section('admin')

    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Category List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Category EN</th>
                                    <th>Category BN</th>
                                    <th>Icon</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->category_name_en }}</td>
                                        <td>{{ $category->category_name_bn }}</td>
                                        <td><img src="{{ asset($category->	category_icon) }}" style="width: 70px; height: 40px;"></td>
                                        <td>
                                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('category.delete',$category->id) }}" class="btn btn-danger" id="delete">Delete</a>
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
                        <h3 class="box-title">Add Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Brand Name English</h5>
                                <div class="controls">
                                    <input type="text" class="form-control "   name="category_name_en">
                                    @error('category_name_en')

                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>

                            </div><div class="form-group">
                                <h5>Brand Name Bangla</h5>
                                <div class="controls">
                                    <input type="text" class="form-control"  name="category_name_bn" >
                                    @error('category_name_bn')

                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <h5>Brand Image</h5>
                                <div class="controls">
                                    <input type="file" class="form-control "  name="category_icon"  >
                                    @error('category_icon')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

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

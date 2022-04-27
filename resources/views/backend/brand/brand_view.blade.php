@extends('admin.admin_master')
@section('admin')

    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Brand List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Brand EN</th>
                                    <th>Brand BN</th>
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                <tr>
                                    <td>{{ $brand->brand_name_en }}</td>
                                    <td>{{ $brand->brand_name_bn }}</td>
                                    <td><img src="{{ asset($brand->brand_img) }}" style="width: 70px; height: 40px;"></td>
                                    <td>
                                        <a href="" class="btn btn-info">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
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
{{--            ----------------------- add brandPage ----------------}}
            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Brand</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Brand Name English</h5>
                                <div class="controls">
                                    <input type="text" class="form-control "   name="brand_name_en">
                                    @error('brand_name_en')

                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>

                            </div><div class="form-group">
                                <h5>Brand Name Bangla</h5>
                                <div class="controls">
                                    <input type="text" class="form-control"  name="brand_name_bn" >
                                    @error('brand_name_bn')

                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <h5>Brand Image</h5>
                                <div class="controls">
                                    <input type="file" class="form-control "  name="brand_img"  >
                                    @error('brand_img')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

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

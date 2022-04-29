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
                        <h3 class="box-title">Edit Brand</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('category.update',$categories->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $categories->id }}">
                            <input type="hidden" name="old_img" value="{{ $categories->category_icon }}">

                            <div class="form-group">
                                <h5>Brand Name English</h5>
                                <div class="controls">
                                    <input type="text" class="form-control "   name="category_name_en" value="{{ $categories->category_name_en }}">
                                    @error('category_name_en')

                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>

                            </div><div class="form-group">
                                <h5>Brand Name Bangla</h5>
                                <div class="controls">
                                    <input type="text" class="form-control"  name="category_name_bn" value="{{ $categories->category_name_bn }}">
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

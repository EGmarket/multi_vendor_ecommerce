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
                        <form action="{{ route('brand.update',$sliders->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $sliders->id }}">
                            <input type="hidden" name="old_img" value="{{ $sliders->slider_img }}">

                            <div class="form-group">
                                <h5>Brand Name English</h5>
                                <div class="controls">
                                    <input type="text" class="form-control "   name="title" value="{{ $sliders->title }}">

                                </div>

                            </div><div class="form-group">
                                <h5>Brand Name Bangla</h5>
                                <div class="controls">
                                    <input type="text" class="form-control"  name="description" value="{{ $sliders->description }}">

                                </div>

                            </div>
                            <div class="form-group">
                                <h5>Brand Image</h5>
                                <div class="controls">
                                    <input type="file" class="form-control "  name="slider_img"  >
                                    @error('slider_img')
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



@endsection

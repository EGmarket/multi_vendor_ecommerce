@extends('admin.admin_master')
@section('admin')

    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Slider List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Slider Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $slider)
                                    <tr>

                                        <td><img src="{{ asset($slider->slider_img) }}" style="width: 70px; height: 40px;"></td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->description }}</td>
                                        <td>
                                            @if($slider->status  == 1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td width="30%">
                                            <a href="{{ route('brand.edit',$slider->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('brand.delete',$slider->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            @if($slider->status == 1)
                                                <a href="{{ route('slider.inactive',$slider->id) }}" title="InActive Now" class="btn btn-primary"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                                <a href="{{ route('slider.active',$slider->id) }}" title="active Now" class="btn btn-danger"><i class="fa fa-arrow-up"></i></a>
                                            @endif
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
                        <h3 class="box-title">Add Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Title</h5>
                                <div class="controls">
                                    <input type="text" class="form-control "   name="title">

                                </div>

                            </div><div class="form-group">
                                <h5>Description</h5>
                                <div class="controls">
                                    <input type="text" class="form-control"  name="description" >

                                </div>

                            </div>
                            <div class="form-group">
                                <h5>Slider Image</h5>
                                <div class="controls">
                                    <input type="file" class="form-control "  name="slider_img"  >
                                    @error('slider_img')
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

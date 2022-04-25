@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Admin Profile Edit</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin User <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" required="" value="{{ $editData->name }}" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Email Field <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control" value="{{ $editData->email }}"  required="" data-validation-required-message="This field is required"> </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                    <h5>File Input Field <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="profile_photo_path" class="form-control" required="" id="image"></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                <img src="{{ (!empty($editData->profile_photo_path))?
                                                    url('upload/admin_images/'.$editData->profile_photo_path) :url('upload/no_image.jpg') }}" style="width: 100px; height: 100px" alt="" id="showImg">
                                            </div>


                                        </div>





                                    </div>

                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-4" value="update">
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#image').change(function (e){
               let reader = new FileReader();
               reader.onload = function (e){
                   $('#showImg').attr('src', e.target.result);
               }
               reader.readAsDataURL(e.target.files['0']);
            });

        });
    </script>
@endsection

@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row ">
                <div class="col-md-2 ">
                    <br>
                    <br>
                    <img class="card-img-top mb-4" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path))?
                                                    url('upload/user_images/'.$user->profile_photo_path) :url('upload/no_image.jpg') }}" height="100%" width="100%" alt="">
                    <br>
                    <br>
                    <ul class="list-group list-group-flush">
                        <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">profile</a>
                        <a href="" class="btn btn-primary btn-sm btn-block">change password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>

                    </ul>

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger">Hi....</span>
                             Change Your password
                        </h3>

                        <div class="card-body">
                            <form action="{{ route('update.password') }}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Current Password <span>*</span></label>
                                    <input type="password" class="form-control " id="current_password"  name="oldpassword" " >
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div><div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">New Password <span>*</span></label>
                                    <input type="password" class="form-control"  name="password" id="password" >
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                                    <input type="password" class="form-control "  name="password_confirmation" id="password_confirmation" value="{{ $user->phone }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-danger">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

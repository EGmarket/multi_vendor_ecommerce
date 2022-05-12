@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title"> Product Details</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="" >
                                @csrf
                                <input type="hidden" name="id"  value="{{ $products->id}}">
                                <div class="row">
                                    <div class="col-12">
                                        {{--                                            1st row--}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id"  required="" class="form-control" >
                                                            <option value="" selected="" disabled="">Select Category</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected': '' }}>{{ $category->category_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')

                                                        <span class="text-danger">{{ $message }}</span>

                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                                end 1st row--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Select Brand<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id"  required="" class="form-control" >
                                                            <option value="" selected="" disabled="">Select Brand</option>
                                                            @foreach($brands as $brand)
                                                                <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected' : '' }}>{{ $brand->brand_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('brand_id')

                                                        <span class="text-danger">{{ $message }}</span>

                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                                end 2nd row--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Select subCategory <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subcategory_id"  required="" class="form-control" >
                                                            <option value="" selected="" disabled="" >Select subCategory</option>

                                                            @foreach($subcategories as $subcategory)
                                                                <option value="{{ $subcategory->id }}" {{ $subcategory->id == $products->subcategory_id ? 'selected' : '' }}>{{ $subcategory->sub_category_name_en }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('subcategory_id')

                                                        <span class="text-danger">{{ $message }}</span>

                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                                end 3rd row--}}
                                        </div>

                                        {{--                                            ///////////////////2nd row ///////////////--}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id"  required="" class="form-control" >
                                                            <option value="" selected="" disabled="">SubSelect Category</option>
                                                            @foreach($subsubcategories as $subsubcategory)
                                                                <option value="{{ $subsubcategory->id }}" {{ $subsubcategory->id == $products->subsubcategory_id ? 'selected' : '' }}>{{ $subsubcategory->subsubcategory_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('subsubcategory_id')

                                                        <span class="text-danger">{{ $message }}</span>

                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                                end 1st row--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product_name English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_en" value="{{ $products->product_name_en }}" class="form-control" required data-validation-required-message="This field is required"> </div>
                                                    @error('product_name_en')

                                                    <span class="text-danger">{{ $message }}</span>

                                                    @enderror
                                                </div>
                                            </div>
                                            {{--                                                end 2nd row--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product_name Bangla <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_bn" class="form-control" value="{{ $products->product_name_bn }}" required data-validation-required-message="This field is required"> </div>
                                                    @error('product_name_bn')

                                                    <span class="text-danger">{{ $message }}</span>

                                                    @enderror
                                                </div>
                                            </div>
                                            {{--                                                end 3rd row--}}
                                        </div>

                                        {{--                                            //////////// 3rd row ////////////--}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product_code <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code" class="form-control" value="{{ $products->product_code }}" required data-validation-required-message="This field is required"> </div>
                                                    @error('product_code')

                                                    <span class="text-danger">{{ $message }}</span>

                                                    @enderror
                                                </div>
                                            </div>
                                            {{--                                                end 1st row--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product_qty <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_qty" class="form-control" value="{{ $products->product_qty }}"  required data-validation-required-message="This field is required"> </div>
                                                    @error('product_qty')

                                                    <span class="text-danger">{{ $message }}</span>

                                                    @enderror
                                                </div>
                                            </div>
                                            {{--                                                end 2nd row--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product_tags_en <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_en" class="form-control" value="{{ $products->product_tags_en }}" data-role="tagsinput" placeholder="add tags"> </div>
                                                    @error('product_tags_en')

                                                    <span class="text-danger">{{ $message }}</span>

                                                    @enderror
                                                </div>
                                            </div>
                                            {{--                                                end 3rd row--}}
                                        </div>

                                        {{--                                            //////////////// 4th row //////////////--}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product_tags_bn <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_bn" class="form-control" value="{{ $products->product_tags_bn }}" data-role="tagsinput" placeholder="add tags"> </div>
                                                    @error('product_tags_bn')

                                                    <span class="text-danger">{{ $message }}</span>

                                                    @enderror
                                                </div>
                                            </div>
                                            {{--                                                end 1st row--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product_size_en <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_en" class="form-control" value="{{ $products->product_size_en }}"data-role="tagsinput" placeholder="add tags"> </div>
                                                    @error('product_size_en')

                                                    <span class="text-danger">{{ $message }}</span>

                                                    @enderror
                                                </div>
                                            </div>
                                            {{--                                                end 2nd row--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product_size_bn <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_bn" class="form-control" value="{{ $products->product_size_bn }}" data-role="tagsinput" placeholder="add tags"> </div>
                                                    @error('product_size_bn')

                                                    <span class="text-danger">{{ $message }}</span>

                                                    @enderror
                                                </div>
                                            </div>
                                            {{--                                                end 3rd row--}}
                                        </div>

                                        {{--                                            ////////////////////// 5th row ///////////////// --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product_color_en <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_en" class="form-control" value="{{ $products->product_color_en }}" data-role="tagsinput" placeholder="add tags"> </div>
                                                    @error('product_color_en')

                                                    <span class="text-danger">{{ $message }}</span>

                                                    @enderror
                                                </div>
                                            </div>
                                            {{--                                                end 1st row--}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product_color_bn <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_bn" class="form-control" value="{{ $products->product_color_bn }}" data-role="tagsinput" placeholder="add tags"> </div>
                                                    @error('product_color_bn')

                                                    <span class="text-danger">{{ $message }}</span>

                                                    @enderror
                                                </div>
                                            </div>
                                            {{--                                                end 2nd row--}}

                                            {{--                                                end 3rd row--}}
                                        </div>
                                        {{--                                            ////////////////////////// 6th Row ////////////////// --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product_selling_price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price" class="form-control" value="{{ $products->selling_price }}" placeholder=""> </div>
                                                    @error('selling_price')

                                                    <span class="text-danger">{{ $message }}</span>

                                                    @enderror
                                                </div>
                                            </div>
                                            {{--                                                end 1st row--}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product_Discount_price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price" class="form-control" value="{{ $products->discount_price }}"  placeholder=""> </div>
                                                    @error('discount_price')

                                                    <span class="text-danger">{{ $message }}</span>

                                                    @enderror
                                                </div>
                                            </div>
                                            {{--                                                end 2nd row--}}

                                            {{--                                                end 3rd row--}}
                                        </div>

                                        {{--                                            ////////////////////////////// 7th Row //////////////--}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Add Product short_desc en <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_desc_en" id="textarea" class="form-control" required placeholder="Textarea text"> {!! $products->short_desc_en !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                                end 1st row--}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Add Product short_desc bn </h5>
                                                    <div class="controls">
                                                        <textarea name="short_desc_bn" id="textarea" class="form-control"  placeholder="Textarea text">{!! $products->short_desc_bn !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                                end 2nd row--}}

                                            {{--                                                end 3rd row--}}
                                        </div>

                                        {{--                                            /////////////////////// 8th Row ///////////////// --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Add Product short_desc en <span class="text-danger">*</span></h5>

                                                    <textarea id="editor1" name="long_desc_en" rows="10" cols="80">
												{!! $products->long_desc_en !!}
						                        </textarea>

                                                </div>
                                            </div>
                                            {{--                                                end 1st row--}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Add Product short_desc bn </h5>
                                                    <div class="controls">
                                                            <textarea id="editor2" name="long_desc_bn" rows="10" cols="80">
												{!! $products->long_desc_bn !!}
						                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                                end 2nd row--}}

                                            {{--                                                end 3rd row--}}
                                        </div>


                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input type="checkbox" id="checkbox_1" value="1" name="hot_deals" {{ $products->hot_deals == 1 ? 'checked' : '' }}>
                                                <label for="checkbox_1">Hot Deals</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <input type="checkbox" id="checkbox_2"  value="1" name="featured" {{ $products->featured == 1 ? 'checked' : '' }}>
                                                <label for="checkbox_2">Featured</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3"  value="x" name="special_offer" {{ $products->special_offer == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_3">Special_offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_4" value="y" name="special_deals" {{ $products->special_deals == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_4">Special_deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
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
        {{--////////////// Multiple image update part ///////--}}
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Multiple <strong>Image</strong></h4>
                        </div>
                        <form method="post" action=""  enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm mt-5 ml-5">
                                @foreach($multiImgs as $multiImg)
                                    <div class="col-md-3">

                                        <div class="card" style="height: 50%; width: 50%;">
                                            <img class="card-img-top" src="{{ asset($multiImg->photo_name) }}">
                                            <div class="card-body">
                                                <a href="" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                                                <p class="card-text">
                                                <div class="form-group">
                                                    <label for="" class="form-control-label"> Change Image</label>
                                                    <input type="file" class="form-control" name="multi_img[ {{$multiImg->id}} ]">
                                                </div>
                                                </p>

                                            </div>
                                        </div>
                                    </div> {{--end col-md-3--}}
                                @endforeach
                            </div>

                        </form>

                    </div>
                </div>


            </div> {{--end row--}}
        </section>

        {{-- Main Thumbnail Image Update Area --}}
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Thumbnail<strong>Image</strong></h4>
                        </div>
                        <form method="post" action=""  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $products->id }}">
                            <input type="hidden" name="old_img" value="{{ $products->product_thumbnail }}">
                            <div class="row row-sm mt-5 ml-5">

                                <div class="col-md-3">

                                    <div class="card" style="height: 50%; width: 50%;">
                                        <img class="card-img-top" src="{{ asset($products->product_thumbnail) }}">
                                        <div class="card-body">
                                            <a href="" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                                            <p class="card-text">
                                            <div class="form-group">
                                                <label for="" class="form-control-label"> Change Image</label>
                                                <input type="file" class="form-control" name="product_thumbnail" onChange="mainThumbnailUrl(this)">
                                                <img src="" id="mainThmb" alt="">
                                            </div>
                                            </p>

                                        </div>
                                    </div>
                                </div> {{--end col-md-3--}}

                            </div>

                        </form>

                    </div>
                </div>


            </div> {{--end row--}}
        </section>
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
                            $('select[name="subsubcategory_id"]').html('');
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
            $('select[name="subcategory_id"]').on('change',function () {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            var d = $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' +
                                    value.subsubcategory_name_en + ' </option>');
                            });
                        },
                    });
                } else {
                    alert('danger')
                }

            });
        });
    </script>

    <script type="text/javascript">

        function mainThumbnailUrl(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }

        }



    </script>

    <script>

        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>



@endsection

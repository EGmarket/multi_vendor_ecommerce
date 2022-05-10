@extends('admin.admin_master')
@section('admin')

    <!-- Content Wrapper. Contains page content -->

        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Product</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form novalidate>
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
                                                                    <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
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
                                                                    <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>
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
                                                                <option value="" selected="" disabled="">Select subCategory</option>

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
                                                            <input type="text" name="product_name_en" class="form-control" required data-validation-required-message="This field is required"> </div>
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
                                                            <input type="text" name="product_name_bn" class="form-control" required data-validation-required-message="This field is required"> </div>
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
                                                            <input type="text" name="product_code" class="form-control" required data-validation-required-message="This field is required"> </div>
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
                                                            <input type="text" name="product_qty" class="form-control" required data-validation-required-message="This field is required"> </div>
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
                                                            <input type="text" name="product_tags_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add tags"> </div>
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
                                                            <input type="text" name="product_tags_bn" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add tags"> </div>
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
                                                            <input type="text" name="product_size_en" class="form-control" value="sm,md,lg" data-role="tagsinput" placeholder="add tags"> </div>
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
                                                            <input type="text" name="product_size_bn" class="form-control" value="sm,md,lg" data-role="tagsinput" placeholder="add tags"> </div>
                                                        @error('product_size_bn')

                                                        <span class="text-danger">{{ $message }}</span>

                                                        @enderror
                                                    </div>
                                                </div>
                                                {{--                                                end 3rd row--}}
                                            </div>

{{--                                            ////////////////////// 5th row ///////////////// --}}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product_color_en <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_color_en" class="form-control" value="red,black,white" data-role="tagsinput" placeholder="add tags"> </div>
                                                        @error('product_color_en')

                                                        <span class="text-danger">{{ $message }}</span>

                                                        @enderror
                                                    </div>
                                                </div>
{{--                                                end 1st row--}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product_color_bn <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_color_bn" class="form-control" value="red,black,white" data-role="tagsinput" placeholder="add tags"> </div>
                                                        @error('product_color_bn')

                                                        <span class="text-danger">{{ $message }}</span>

                                                        @enderror
                                                    </div>
                                                </div>
                                                {{--                                                end 2nd row--}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product_sellin_price <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="selling_price" class="form-control" value=""  placeholder=""> </div>
                                                        @error('selling_price')

                                                        <span class="text-danger">{{ $message }}</span>

                                                        @enderror
                                                    </div>
                                                </div>
                                                {{--                                                end 3rd row--}}
                                            </div>
{{--                                            ////////////////////////// 6th Row ////////////////// --}}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product_Discount_price <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="discount_price" class="form-control" value=""  placeholder=""> </div>
                                                        @error('discount_price')

                                                        <span class="text-danger">{{ $message }}</span>

                                                        @enderror
                                                    </div>
                                                </div>
{{--                                                end 1st row--}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product_main_img <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="product_thumbnail" class="form-control" value=""  placeholder=""> </div>
                                                        @error('product_thumbnail')

                                                        <span class="text-danger">{{ $message }}</span>

                                                        @enderror
                                                    </div>
                                                </div>
                                                {{--                                                end 2nd row--}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product_multi_img <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="multi_img[]" class="form-control" value=""  placeholder=""> </div>
                                                        @error('multi_img[]')

                                                        <span class="text-danger">{{ $message }}</span>

                                                        @enderror
                                                    </div>
                                                </div>
                                                {{--                                                end 3rd row--}}
                                            </div>

{{--                                            ////////////////////////////// 7th Row //////////////--}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Add Product short_desc en <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="short_desc_en" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
{{--                                                end 1st row--}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Add Product short_desc bn </h5>
                                                        <div class="controls">
                                                            <textarea name="short_desc_bn" id="textarea" class="form-control"  placeholder="Textarea text"></textarea>
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
												add long description english
						                        </textarea>

                                                    </div>
                                                </div>
{{--                                                end 1st row--}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Add Product short_desc bn </h5>
                                                        <div class="controls">
                                                            <textarea id="editor2" name="long_desc_bn" rows="10" cols="80">
												add long description bangla
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
                                                    <input type="checkbox" id="checkbox_1" value="single" name="hot_deals">
                                                    <label for="checkbox_1">Hot Deals</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <input type="checkbox" id="checkbox_2"  value="single" name="featured">
                                                    <label for="checkbox_2">Featured</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_3"  value="x" name="special_offer">
                                                        <label for="checkbox_3">Special_offer</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_4" value="y" name="special_deals">
                                                        <label for="checkbox_4">Special_deals</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-danger" value="Add Product"/>
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








@endsection

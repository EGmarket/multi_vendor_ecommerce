@extends('admin.admin_master')
@section('admin')

    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td><img src="{{ asset($product->product_thumbnail) }}" style="width: 70px; height: 40px;"></td>
                                        <td>{{ $product->product_name_en }}</td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>
                                        @if($product->discount_price == NULL )
                                            <span class="badge badge-pill">No Discount</span>
                                        @else
                                        @php
                                          $amount =  $product->selling_price - $product->discount_price;
                                          $discount =($amount/$product->selling_price) * 100;
                                        @endphp
                                                <span class="badge badge-pill badge-success">{{ round($discount) }}%</span>
                                        @endif

                                        </td>


                                        <td>{{ $product->product_qty }}</td>
                                        <td>
                                            @if($product->status == 1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif
                                        </td>

                                        <td width="30%">
                                            <a href="{{ route('product.details',$product->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('product.edit',$product->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('category.delete',$product->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                            @if($product->status == 1)
                                                <a href="{{ route('product.inactive',$product->id) }}" title="InActive Now" class="btn btn-primary"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                                <a href="{{ route('product.active',$product->id) }}" title="active Now" class="btn btn-danger"><i class="fa fa-arrow-up"></i></a>
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
            {{--            ----------------------- add categoryPage ----------------}}
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    </div>

@endsection

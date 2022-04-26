@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ul class="list-group list-group-horizontal float-md-right mt-2">
                        <li class="list-group-item">
                            <a href="#" class="text-secondary">Export</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('add-new-product') }}" class="text-secondary">Add Product</a>
                        </li>
                    </ul>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <form action="">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Filter Products">
                                </div>
                            </form>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-valign-middle table-hover cursor-pointer">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>SKU</th>
                                        <th>Status</th>
                                        <th>Product Image</th>
                                        <th>Product Orientation</th>
                                        <th>Category</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>${{ $product->price }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->status }}</td>
                                        <td>
                                            <a href="{{ asset(config('file-upload-paths.products').'/'.$product->product_image) }}" target="_blank">
                                                <img class="product-listing-thumb" src="{{ asset(config('file-upload-paths.products').'/'.$product->product_image) }}" />
                                            </a>
                                        </td>
                                        <td>{{ $product->orientation }}</td>
                                        <td>{{ optional($product->categoryData)->name }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            <a href="{{ route('update-product', ['product_id' => $product->id]) }}" ><i class="far fa-edit"></i></a>
                                            <a href="{{ route('delete-product', ['product_id' => $product->id]) }}" onclick="return confirm('Are you sure.')" >
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
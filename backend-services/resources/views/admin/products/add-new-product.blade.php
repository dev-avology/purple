@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add New Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ul class="list-group list-group-horizontal float-md-right mt-2">
                        <li class="list-group-item">
                            <a href="{{ route('products') }}" class="text-secondary">Products Listing</a>
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

            <form action="{{ route('save-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Product Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Add product title">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Add product price without currency sign">
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sku">Product SKU</label>
                    <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror" id="sku" placeholder="Add product sku">
                    @error('sku')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Product Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="in_stock">In Stock</option>
                        <option value="out_of_stock">Out Of Stock</option>
                        <option value="discontinued">Discontinued</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product-image">Product Image</label>
                    <input type="file" name="product_image" class="form-control-file @error('product_image') is-invalid @enderror" id="product-image">
                    @error('product_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Product Category</label>
                    <select class="form-control" id="category" name="sub_category">
                        <option value="1">Wall Art</option>
                        <option value="2">Art prints</option>
                        <option value="3">Others</option>
                    </select>
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save Product" />
                </div>
            </form>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('pagescripts')

<script>
    $(document).ready(function(){ 
        $('input').on('keypress change', function() {
            $(this).removeClass('is-invalid');
            $(this).next().empty();
        });
    });
</script>

@endsection
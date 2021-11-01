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
            @error('orientation')
                <div class="text-danger">{{ strtoupper($message) }}</div>
            @enderror
            <form action="{{ route('save-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Product Title</label>
                    <input type="text" name="title" value="{{old('title', optional($product)->title)}}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Add product title">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="number" name="price" value="{{old('price', optional($product)->price)}}" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Add product price without currency sign">
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sku">Product SKU</label>
                    <input type="text" name="sku" value="{{old('sku', optional($product)->sku)}}" class="form-control @error('sku') is-invalid @enderror" id="sku" placeholder="Add product sku">
                    @error('sku')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Product Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="in_stock"  @if(optional($product)->status == 'in_stock') selected @endif>In Stock</option>
                        <option value="out_of_stock" @if(optional($product)->status == 'out_of_stock') selected @endif>Out Of Stock</option>
                        <option value="discontinued" @if(optional($product)->status == 'discontinued') selected @endif>Discontinued</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product-image">Product Image</label>
                    <input type="file" name="product_image"  class="form-control-file @error('product_image') is-invalid @enderror" id="product-image">
                    @error('product_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @if (optional($product)->product_image)
                    <span>
                        <a href="{{ asset(config('file-upload-paths.products').'/'.$product->product_image) }}" target="_blank">
                            <img class="product-listing-thumb" src="{{ asset(config('file-upload-paths.products').'/'.$product->product_image) }}" />
                        </a>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="category">Product Category</label>
                    <select class="form-control" id="category" name="sub_category">
                        @foreach($categories as $category)
                            <option 
                                value="{{$category['id']}}" 
                                @if(optional($product)->sub_category == $category['id']) selected @endif >
                                {{$category['name']}}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="orientation">Prouct Orientation</label>
                    <select class="form-control" id="orientation" name="orientation">
                        @foreach($orientationType as $orientation)
                            <option 
                                value="{{$orientation['value']}}" 
                                @if(optional($product)->orientation == $orientation['value']) selected @endif >
                                {{$orientation['name']}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="product_id" value="{{optional($product)->id}}" />
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
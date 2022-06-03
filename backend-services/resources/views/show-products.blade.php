@extends('layouts.frontend')
@section('content')

<div id="main-container">
    <!--h3 id="clothing">Clothing Designer</h3-->
    <h1>Shop Page</h1>
    <!-- <div class="row">
    @foreach($products as $product)

        <div class="col-lg-6">
            <img src="{{asset('public/artist-designs/'.$product->art_photo_path)}}"  />
        </div>
    @endforeach
    </div> -->

<div class="art_category_inner">
    <div class="row">
        @foreach($products as $product)
        <?php
            // echo "<pre>";
            // print_r($product);
            // die;
        ?>
            <div class="col-lg-4 col-sm-6">
                <div class="art_category_item">
                    <div class="art_category_item_img">
                        <a href="product-details.html"><img src="{{asset('public/artist-designs/'.$product->art_photo_path)}}" alt=""></a>
                        <div class="art_category_item_hover">
                            <a 
                                class="shop_btn" 
                                href="{{route('product-detail-copy', 
                                    [
                                        'art_id' => $product['art_id'],
                                        'userId' => session()->get('userId'),
                                        'slug' => $product['slug'],
                                        'product_id' => 31,
                                        'category' => $product['category_id'],
                                    ])
                                }}">
                                View Shop
                            </a>
                            <a class="heart" href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="art_category_item_text">
                        <h4><a href="product-details.html">{{$product['title']}}</a></h4>
                        <span class="price">${{$product['price']}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
  


</div>
@endsection

@push('scripts')

@endpush
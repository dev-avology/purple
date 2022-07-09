@php $product_count = 1; @endphp
@foreach($products as $product)
        
    <div class="col-lg-6">
        <div 
            id="designer-tool-{{$product_count}}" 
            data-frame="{{$product['frame_image']}}"
            class="
                fpd-container 
                fpd-shadow-2 
                fpd-topbar 
                fpd-tabs 
                fpd-tabs-side 
                fpd-top-actions-centered 
                fpd-bottom-actions-centered 
                fpd-views-inside-left
                frame-custom-class
            "
        >
        </div>
    </div>
@php $product_count++; @endphp
@endforeach

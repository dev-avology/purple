@extends('layouts.frontend')
@section('content')


<div id="main-container">
    <!--h3 id="clothing">Clothing Designer</h3-->

    <form method="POST" enctype="multipart/form-data" id="image-upload" action="javascript:void(0)">
        <input type="file" class="form-control" name="image" placeholder="Upload Design Image" id="image"  />
        <!-- <div class="col-md-12 mb-2">
            <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
            alt="preview image" style="max-height: 250px;">
        </div> -->
        <button id="save-artist-designs" class="btn btn-primary">Save Work</button>
    </form>
    <button class="btn btn-primary"><a style="text-decoration: none; color: white;" href="{{route('show-products')}}">Show Products</a></button>
    @php $product_count = 1; @endphp
    <div class="row">
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
                "
            >
            </div>
        </div>
    @php $product_count++; @endphp
    @endforeach
    </div>
    @php $product_count = $product_count-1; @endphp

    <!--div class="fpd-clearfix" style="margin-top: 30px;">
        <div class="api-buttons fpd-container fpd-left">
            <a href="#" id="print-button" class="fpd-btn">Print</a>
            <a href="#" id="image-button" class="fpd-btn">Create Image</a>
            <a href="#" id="checkout-button" class="fpd-btn">Checkout</a>
            <a href="#" id="recreation-button" class="fpd-btn">Recreate product</a>
        </div>
        <div class="fpd-right">
            <span class="price badge badge-inverse"><span id="thsirt-price"></span> $</span>
        </div>
    </div-->

    <!--p class="fpd-container">
        Only working on a webserver:<br />
        <span class="fpd-btn" id="save-image-php">Save image with php</span>
        <span class="fpd-btn" id="send-image-mail-php">Send image to mail</span>
    </p-->

</div>
@endsection

@push('scripts')

<!-- Include required jQuery files -->
<script src="{{asset('public/product-designer/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/product-designer/js/jquery-ui.min.js')}}" type="text/javascript"></script>

<!-- HTML5 canvas library - required -->
<script src="{{asset('public/product-designer/js/fabric.min.js')}}" type="text/javascript"></script>
<!-- The plugin itself - required -->
<script src="{{asset('public/product-designer/js/FancyProductDesigner-all.min.js')}}" type="text/javascript"></script>

<script type="text/javascript">
jQuery(document).ready(function(){

var product_count = '{{$product_count}}';

var productDesigner = [];
for (let i = 1; i <= product_count; i++) {
    
    var $yourDesigner = $('#designer-tool-'+i);

    let frame_image = $('#designer-tool-'+i).data('frame');

    pluginOpts = {
        productsJSON: [
                        [
                            {
                                "title": "Front",
                                "thumbnail": frame_image,
                                "options": {
                                    "stageWidth": "800"
                                },
                                "elements": [
                                    {
                                        "title": "Design",
                                        "source": frame_image,
                                        "type": "image",
                                        "parameters": {
                                            "left": 400,
                                            "top": 300,
                                            "originX": "center",
                                            "originY": "center",
                                            "z": -1,
                                            "fill": false,
                                            "colors": false,
                                            "colorLinkGroup": false,
                                            "draggable": false,
                                            "rotatable": false,
                                            "resizable": false,
                                            "removable": false,
                                            "zChangeable": false,
                                            "scaleX": 1,
                                            "scaleY": 1,
                                            "lockUniScaling": false,
                                            "uniScalingUnlockable": false,
                                            "angle": 0,
                                            "price": 0,
                                            "autoCenter": false,
                                            "replaceInAllViews": false,
                                            "autoSelect": false,
                                            "topped": true,
                                            "boundingBoxMode": "inside",
                                            "opacity": 1,
                                            "excludeFromExport": false,
                                            "locked": false,
                                            "showInColorSelection": false,
                                            "boundingBox": false,
                                            "resizeToW": 0,
                                            "resizeToH": 0,
                                            "filter": null,
                                            "scaleMode": "fit",
                                            "minScaleLimit": 0.01,
                                            "advancedEditing": false,
                                            "uploadZone": false,
                                        }
                                    }
                                ]
                            }
                        ]
                    ], //see JSON folder for products sorted in categories
        //designsJSON: 'json/designs.json', //see JSON folder for designs sorted in categories
        stageWidth: 1200,
        editorMode: false,
        smartGuides: true,
        //uiTheme: 'doyle',
        fonts: [
            {name: 'Helvetica'},
            {name: 'Times New Roman'},
            //{name: 'Pacifico', url: 'Enter_URL_To_Pacifico_TTF'},
            {name: 'Arial'},
            {name: 'Lobster', url: 'google'}
        ],
        customTextParameters: {
            colors: false,
            removable: true,
            resizable: true,
            draggable: true,
            rotatable: true,
            autoCenter: true,
            boundingBox: "Base",
            curvable: true
        },
        customImageParameters: {
            z:-1,
            draggable: true,
            removable: true,
            minW:50,
            minH:50,
            maxW:10000,
            maxH:10000,
            minDPI:40,
            maxSize:10,
            resizable: true,
            rotatable: true,
            colors: '#000',
            autoCenter: true,
            boundingBox: "Base",
            boundingBox: {
                x: 260,
                y: 120,
                width: 300,
                height: 400
            }
        },
        actions:  {
            'top': ['download','print', 'snap', 'preview-lightbox'],
            'right': ['magnify-glass', 'zoom', 'reset-product', 'qr-code', 'ruler'],
            'bottom': ['undo','redo'],
            'left': ['manage-layers','info','save','load']
        }
    };

    productDesigner[i] = new FancyProductDesigner($yourDesigner, pluginOpts);

    $yourDesigner.on('ready', function() { 
        var design_title = 'design_'+i;

        $('#image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => { 
                productDesigner[i].addCustomImage(e.target.result, design_title, {});
            }
            reader.readAsDataURL(this.files[0]); 
        });

    });

}

$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//save image on webserver
$('#save-artist-designs').click(function() {

    for (let i = 1; i <= productDesigner.length; i++) {
        
        productDesigner[i].getProductDataURL(function(dataURL) {
            
            $.ajax({
                type:'POST',
                url: "{{ route('upload-artist-design')}}",
                data: { 'image': dataURL},
                success: (data) => {
                    alert('Your Designs has been saved.');
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    }
});


// $('#image-upload').submit(function(e) {
// 	e.preventDefault();
// 	var formData = new FormData(this);
// 	$.ajax({
// 	type:'POST',
// 	url: "{{ route('upload-artist-design')}}",
// 	data: formData,
// 	cache:false,
// 	contentType: false,
// 	processData: false,
// 	success: (data) => {
// 	this.reset();
// 	alert('Image has been uploaded using jQuery ajax successfully');
// 	},
// 	error: function(data){
// 	    console.log(data);
// 	}
// 	});
// });

 
/*
//print button
$('#print-button').click(function(){
    yourDesigner.print();
    return false;
});

//create an image
$('#image-button').click(function(){
    var image = yourDesigner.createImage();
    return false;
});

//checkout button with getProduct()
$('#checkout-button').click(function(){
    var product = yourDesigner.getProduct();
    console.log(product);
    return false;
});

//event handler when the price is changing
$yourDesigner.on('priceChange', function(evt, price, currentPrice) {
    $('#thsirt-price').text(currentPrice);
});


//send image via mail
$('#send-image-mail-php').click(function() {

    yourDesigner.getProductDataURL(function(dataURL) {
        $.post( "php/send_image_via_mail.php", { base64_image: dataURL} );
    });

});*/

});
</script>


@endpush
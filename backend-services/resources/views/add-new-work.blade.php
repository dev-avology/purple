@extends('layouts.frontend')
@section('content')

<div class="container">
    <div class="dashboard_sec add_new_work_sec add_new_work_step_one">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="add_new_work">
                        <h2>Add new work</h2>
                        <div class="uplaod-fils">
                            <label class="custom-file-upload">
                                <input id="image" type="file" name="image" class="image" required />
                                <span><img class="black_img" src="{{asset('public/frontend/images/new-upload-02c611d3b1eeb6ad555ff842020b9c23990ec9833a7605a66ad6504ba8a480e8.svg')}}" alt="" />
                                <img class="white_img" src="{{asset('public/frontend/images/white-new-upload-02c611d3b1eeb6ad555ff842020b9c23990ec9833a7605a66ad6504ba8a480e8.svg')}}" alt="" /> <span>Upload new work</span></span>
                            </label>
                        </div>
                        <div class="uplaod-fils_text">
                            <h3>File requirements</h3>
                            <p>We recommend high-resolution JPEG, PNG or GIF files with a minimum of 1000px resolution. For more help, check out our <a href="#">design guide</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard_sec add_new_work_sec add_new_work_step_two" style="display:none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="add_new_work">
                        <h2>Add new work</h2>
                        <div class="uplaod_images_main">
                            <div class="uplaod_images">
                                <div class="uplaod_images_inner">
                                    <img id="preview-image-before-upload" src="{{asset('public/frontend/images/dark_deer_icon.png')}}" alt="">
                                    <!-- <div class="uplaod_images_hover">
                                        <div class="uplaod-fils">
                                            <label class="custom-file-upload">
                                                <input id="replace_image"  type="file" name="image" class="image"/>
                                                <span><span>Replace Image</span></span>
                                            </label>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="language-tab">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="new-english-tab" data-toggle="tab" href="#new-english" role="tab" aria-controls="new-english" aria-selected="true">English</a>
                                        <a class="nav-item nav-link" id="nav-french-tab" data-toggle="tab" href="#nav-french" role="tab" aria-controls="nav-french" aria-selected="false">French</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="new-english" role="tabpanel" aria-labelledby="new-english-tab">
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label>Title (required) </label>
                                                    <input id="design-title" required type="text" placeholder="Use 4 to 8 words to describe your work " class="">
                                                </div>
                                                <div class="col-lg-12">
                                                    <label>Tags</label>
                                                    <textarea placeholder="Separate tags with commas." required id="design-tags"></textarea>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label>Description</label>
                                                    <textarea required placeholder="Describe your work to get your audience excited" id="design-description" ></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="container-fluid">
    <div class="add_new_work_step_three" style="display: none;">
        <!--h3 id="clothing">Clothing Designer</h3-->
        <!-- <button class="btn btn-primary"><a style="text-decoration: none; color: white;" href="{{route('show-products')}}">Show Products</a></button> -->
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
    </div>
</div>

<div class="container add_new_work_step_two" style="display: none;"> 

    <div class="media_select_sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="media_select">
                        <h2>Select Media</h2>
                        <div class="media_select_checkbox">
                            <label class="select_checkbox">Photography
                                <input type="checkbox" id="photography_media" name="photography_media" value="1" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="select_checkbox">Design &amp; illustration
                                <input id="design_illustration_media" type="checkbox" name="design_illustration_media" value="2" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="select_checkbox">Painting &amp; Mixed Media
                                <input id="mixed_media_media" type="checkbox" name="mixed_media_media" value="3" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="select_checkbox">Drawing
                                <input type="checkbox" id="drawing_media" name="drawing_media" value="4" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="select_checkbox">Digital Art
                                <input type="checkbox" id="digital_art_media" name="digital_art_media" value="5" />
                                <span class="checkmark"></span>
                            </label>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="media_select">
                        <h2>Select Category</h2>
                        <div class="custom_check_work">
                            <label class="check_work">Art Board Prints
                                <input type="radio" id="art_board_prints" name="category" value="1" checked />
                                <span class="radiobtn"></span>
                            </label>
                            <label class="check_work">Art Prints
                                <input id="art_prints" type="radio" name="category" value="2" />
                                <span class="radiobtn"></span>
                            </label>
                            <label class="check_work">Canvas Prints
                                <input id="canvas_prints" type="radio" name="category" value="3" />
                                <span class="radiobtn"></span>
                            </label>
                            <label class="check_work">Framed Prints
                                <input type="radio" id="framed_prints" name="category" value="4" />
                                <span class="radiobtn"></span>
                            </label>
                            <label class="check_work">Metal Prints
                                <input type="radio" id="metal_prints" name="category" value="5" />
                                <span class="radiobtn"></span>
                            </label>
                            <label class="check_work">Mounted Prints
                                <input type="radio" id="mounted_prints" name="category" value="6" />
                                <span class="radiobtn"></span>
                            </label>
                            <label class="check_work">Photographic Prints
                                <input type="radio" id="photographics_prints" name="category" value="7" />
                                <span class="radiobtn"></span>
                            </label>
                            <label class="check_work">Posters
                                <input type="radio" id="posters" name="category" value="8" />
                                <span class="radiobtn"></span>
                            </label>
                            <label class="check_work">Wall Art
                                <input type="radio" id="wall_art" name="category" value="9" />
                                <span class="radiobtn"></span>
                            </label>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="who_can_work_sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="who_can_work">
                        <h3>Who can view this work?</h3>
                        <div class="custom_check_work">
                            <label class="check_work">Anybody (public)<input type="radio" name="is_public" checked /><span class="radiobtn"></span></label>
                            <label class="check_work">Only You (private)<input type="radio" name="is_public" /><span class="radiobtn"></span></label><span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mature_content">
                        <h3>Is this mature content?</h3>
                        <p>Nudity or lingerie, adult language, alcohol or drugs, blood, guns or violence. <a href="/add-new-work">Not sure? See guidelines</a>.</p>
                        <div class="custom_check_work">
                            <label class="check_work">Yes<input type="radio" name="is_mature_content" /><span class="radiobtn"></span></label>
                            <label class="check_work">No<input type="radio" name="is_mature_content" checked/><span class="radiobtn"></span></label><span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rights_declaration_sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rights_declaration">
                        <label class="declaration_checkbox">
                            I have the right to sell products containing this artwork, including (1) any featured company’s name or logo, (2) any featured person’s name or face, and (3) any featured words or images created by someone else.
                            <input type="checkbox" required/><span class="checkmark"></span>
                        </label>
                        <button type="submit" id="save_artist_work" class="btn">Save work</button><span class="text-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

//$('.uplaod-fils').click(function() {

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

        $('.image').change(function(){
            
            $('.add_new_work_step_one').hide();
            $('.add_new_work_step_two').show();
            $('.add_new_work_step_three').show();			
            
            let reader = new FileReader();

            reader.onload = (e) => { 
                $('#preview-image-before-upload').attr('src', e.target.result); 
                productDesigner[i].addCustomImage(e.target.result, design_title, {});
            }
            reader.readAsDataURL(this.files[0]); 
        });

    });

}

//});



$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//save image on webserver
$('#save_artist_work').click(function() {

    for (let i = 1; i <= productDesigner.length; i++) {
        
        productDesigner[i].getProductDataURL(function(dataURL) {

            let title = $('#design-title').val();
            let tags = $('#design-tags').val();
            let design_description = $('#design-description').val();

            let media_data = {};

            media_data['photography_media'] = $('input[name=photography_media]:checked').val();
            media_data['design_illustration_media'] = $('input[name=design_illustration_media]:checked').val();
            media_data['mixed_media_media'] = $('input[name=mixed_media_media]:checked').val();
            media_data['drawing_media'] = $('input[name=drawing_media]:checked').val();
            media_data['digital_art_media'] = $('input[name=digital_art_media]:checked').val();


            let category_id = $('input[name=category]:checked').val();

            let is_public = $("input[name=is_public]").val();
            let is_mature_content = $("input[name=is_mature_content]").val();

            if (i == productDesigner.length - 1) {
                if(title == '' || tags =='' || design_description == '') {
                    alert('Please fill up all the required fields');
                    return false;
                }
            } else {
                if(title == '' || tags =='' || design_description == '') {
                    return false;
                }
            }



            // console.log('Title '+title);
            // console.log('tags '+tags);
            // console.log('design_description '+design_description);

            //console.log('media_data '+JSON.stringify(media_data));

            // console.log('is_public '+is_public);
            // console.log('is_mature_content '+is_mature_content);
            
            $.ajax({
                type:'POST',
                url: "{{ route('upload-artist-design')}}",
                data: { 
                    image: dataURL, 
                    title: title, 
                    tags: tags, 
                    design_description: design_description, 
                    media_data: media_data,
                    is_public: is_public,
                    is_mature_content: is_mature_content,
                    category_id: category_id,
                },
                beforeSend: function() {
                    $('#save_artist_work').text("Saving Work");
                },
                success: (data) => {
                    if (i == productDesigner.length - 1) {
                        $('#save_artist_work').text("Save Work");
                        window.location.href = 'http://146.190.226.38/backend-services/show-products';
                    }   
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    }
});
 
});
</script>

@endpush
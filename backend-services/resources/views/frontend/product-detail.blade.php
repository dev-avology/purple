@extends('layouts.frontend')
@section('content')

		<div class="product_details_sec">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="product_details_main">
							<div class="singel_product_image">
								<ul>
									<li>
										<a href="{{$product['art_photo_path']}}" alt="" class="image" title="">
											<img src="{{$product['art_photo_path']}}" alt="Alt text" style="" />
										</a>
										<a href="{{$product['art_photo_path']}}" alt="" class="image" title="">
											<img src="{{$product['art_photo_path']}}" alt="Alt text" style="" />
										</a>
									</li>
									<li class="htmlToImageVis" id="final-product-image">
										<a href="{{$product['art_photo_path']}}" alt="" class="image" title="">
											<img src="{{$product['art_photo_path']}}" alt="Alt text" style="" />
											<img  class="product_frame" src="{{$productImage}}" alt="Product Image" />
										</a>
									</li>
								</ul>
							</div>
							<div class="singel_product_details">
								<h2>{{$product['title']}}</h2>
								<p>Designed and sold by uellaaa</p>
								<span class="price">${{$product['price']}}</span>
								<!-- <h5>$16.37 when you buy 2+</h5> -->
								<!-- <div class="size">
									<h4>Size</h4>
									<ul>
										<li>
											<label class="custom_check active">
												S
												<input type="radio" name="radio" />
												<span class="radiobtn"></span>
											</label>
											<label class="custom_check">
												M
												<input type="radio" name="radio" />
												<span class="radiobtn"></span>
											</label>
											<label class="custom_check">
												L
												<input type="radio" name="radio" />
												<span class="radiobtn"></span>
											</label>
											<label class="custom_check">
												XL
												<input type="radio" name="radio" />
												<span class="radiobtn"></span>
											</label>
										</li>
										
									</ul>
								</div> -->
								<!-- <div class="quantity_btn">
									<h4>quantity</h4>
									<div class="quantity buttons_added">
										<input type="button" value="-" class="minus quantity_button" />
										<input type="text" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" />
										<input type="button" value="+" class="plus quantity_button" />
									</div>
                                </div> -->
								<div class="cart_size_btn">
									<!-- <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M21 4H3a1 1 0 00-1 1v14a1 1 0 001 1h18a1 1 0 001-1V5a1 1 0 00-1-1zm-1 14H4V6h2v5a1 1 0 002 0V6h3v7a1 1 0 002 0V6h3v5a1 1 0 002 0V6h2z"></path></svg> View size guide</a> -->
									<button type="button" class="styles_button" >
										<!-- <span class="iconBefore"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><circle cx="8" cy="20" r="2"></circle><circle cx="18" cy="20" r="2"></circle><path d="M19 17H7a1 1 0 01-1-.78L3.2 4H2a1 1 0 010-2h2a1 1 0 011 .78L7.8 15h10.4L20 6.78a1 1 0 012 .44l-2 9a1 1 0 01-1 .78z"></path><path d="M16 6h-2V4a1 1 0 00-2 0v2h-2a1 1 0 000 2h2v2a1 1 0 002 0V8h2a1 1 0 000-2z"></path></svg></span> -->
										<a class="children" href='javascript:void();' id="add-item-to-cart"  data-buyer='{{session()->get("userId")}}' data-seller-id='{{$product["user_id"]}}' data-product-id='{{$product["id"]}}' data-quantity="1">Add to cart</a>
									</button>
								</div>
								<!-- <div class="delivery_main">
									<div class="country_flags">
										<img src="{{asset('public/frontend/images/e4ab7bd057c6d49f21b3460a1bf914a9.svg')}}" alt="">
									</div>
									<div class="delivery_text">
										<span>Delivery</span>
										<p>Express by 21 September<br />
										Standard between 4 - 6 October</p>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="features_reviews_sec">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="features_reviews">
							<div class="features">
								<h3>Features</h3>
								<ul>
									<li>Gallery-grade prints on high-quality paper, this is the real deal</li>
									<li>Lightly textured 100% cotton paper</li>
									<li>Custom sizes, based on artwork dimensions. Check size chart if self-framing</li>
									<li>Dimensions include a 1 - 2 inch (2.5 - 5.0cm) white border to assist in framing</li>
									<li>Large prints shipped in tubes, small & medium prints in protective flat mailers</li>
								</ul>
							</div>
							<div class="reviews">
								<h3>Reviews</h3>
								<div class="range-slider_main">
									<div class="range_icon">
										<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
										</ul>
									</div>
									<div class="range-slider">
										<input class="range-slider__range" type="range" value="95" min="0" max="100%">
										<span class="range-slider__value">0</span>
									</div>
								</div>
								
								<div class="range-slider_main">
									<div class="range_icon">
										<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li class="gray"><i class="fa fa-star" aria-hidden="true"></i></li>
										</ul>
									</div>
									<div class="range-slider">
										<input class="range-slider__range" type="range" value="2.5" min="0" max="100%">
										<span class="range-slider__value">0</span>
									</div>
								</div>
								
								<div class="range-slider_main">
									<div class="range_icon">
										<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li class="gray"><i class="fa fa-star" aria-hidden="true"></i></li>
											<li class="gray"><i class="fa fa-star" aria-hidden="true"></i></li>
										</ul>
									</div>
									<div class="range-slider">
										<input class="range-slider__range" type="range" value="0" min="0" max="100%">
										<span class="range-slider__value">0</span>
									</div> 
								</div> 
								
								<div class="range-slider_main">
									<div class="range_icon">
										<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li class="gray"><i class="fa fa-star" aria-hidden="true"></i></li>
											<li class="gray"><i class="fa fa-star" aria-hidden="true"></i></li>
											<li class="gray"><i class="fa fa-star" aria-hidden="true"></i></li>
										</ul>
									</div>	
									<div class="range-slider">
										<input class="range-slider__range" type="range" value="2.5" min="0" max="100%">
										<span class="range-slider__value">0</span>
									</div> 
								</div> 
								
								<div class="range-slider_main">
									<div class="range_icon">
										<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li class="gray"><i class="fa fa-star" aria-hidden="true"></i></li>
											<li class="gray"><i class="fa fa-star" aria-hidden="true"></i></li>
											<li class="gray"><i class="fa fa-star" aria-hidden="true"></i></li>
											<li class="gray"><i class="fa fa-star" aria-hidden="true"></i></li>
										</ul>
									</div>	
									<div class="range-slider">
										<input class="range-slider__range" type="range" value="0" min="0" max="100%">
										<span class="range-slider__value">0</span>
									</div> 
								</div> 
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary all_reviews" data-toggle="modal" data-target="#exampleModalLong">+ Read all 40 reviews</button>

								<!-- Modal -->
								<div class="modal fade reviews_modal" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLongTitle">Reviews</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="read_reviews">
													<div class="read_reviews_item">
														<ul>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
														</ul>
														<h3>Amazing!</h4>
														<span>by Alison B. on Jul 26, 2021</span>
														<p>Swift arrival and pristine condition on all prints. Very happy with order, excited to order more.</p>
													</div>
													<div class="read_reviews_item">
														<ul>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
														</ul>
														<h3>Happy with the quality of</h4>
														<span>by Lawrence B. on May 8, 2021</span>
														<p>Happy with the quality of the prints that I ordered</p>
													</div>
													<div class="read_reviews_item">
														<ul>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
														</ul>
														<h3>Perfect</h4>
														<span>by MISS L. on May 6, 2021</span>
														<p>Perfect</p>
													</div>
													<div class="read_reviews_item">
														<ul>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
														</ul>
														<h3>Super</h4>
														<span>by Daniel on Apr 11, 2021</span>
														<p>Super</p>
													</div>
													<div class="read_reviews_item">
														<ul>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
														</ul>
														<h3>Great quality and design!</h4>
														<span>by Melissa G. on Mar 4, 2021</span>
														<p>Great quality and design!</p>
													</div>
													<div class="read_reviews_item">
														<ul>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
														</ul>
														<h3>Amazing</h4>
														<span>by Judy A. on Dec 15, 2020</span>
														<p>Quality and selection at Redbubble that is hard to believe at these prices.</p>
													</div>
													<div class="read_reviews_item">
														<ul>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
															<li><i class="fa fa-star" aria-hidden="true"></i></li>
														</ul>
														<h3>Nice prints, good support</h4>
														<span>by Stefanini on Oct 19, 2020</span>
														<p>First package got lost, finally receive an other one, thanks a lot ! Prints a really nice.</p>
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
			</div>
		</div>
		
@endsection

@push('scripts')

<script>

	$(document).ready(function() {
		$('#add-item-to-cart').click(()=> {
			var node = document.getElementById('final-product-image');
			$('#add-item-to-cart').text('Processing')
			var buyer_id = $('#add-item-to-cart').data('buyer')
			var seller_id = $('#add-item-to-cart').data('seller-id')
			var product_id = $('#add-item-to-cart').data('product-id')
			var quantity = $('#add-item-to-cart').data('quantity')

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			domtoimage.toBlob(node)
			.then(function (blob) {

				var formData = new FormData()

				formData.append('final_product_image', blob)
				formData.append('buyer_id', buyer_id)
				formData.append('seller_id', seller_id)
				formData.append('product_id', product_id)
				formData.append('quantity', quantity)

				$.ajax({
					type:'POST',
					url:"{{ route('add-to-cart') }}",
					data:formData,
					beforeSend: function() {
						$('#add-item-to-cart').text('Processing')
					},
					processData: false,
					contentType: false,
					success:function(data){
						location.href = "{{url('/cart')}}";
					}
				});

			});
		});
	});
	
</script>

@endpush
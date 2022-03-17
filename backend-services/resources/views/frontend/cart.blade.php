@extends('layouts.frontend')
@section('content')
		
		<div class="shopping_cart_sec">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="shopping_cart">
							<h2>Your shopping cart</h2>
							<table class="shop_table shop_table_responsive cart" cellspacing="0">
								<thead>
									<tr>
										<th class="product-remove">&nbsp;</th>
										<th colspan="2" class="product-thumbnail">Item</th>
										<!-- <th class="product-name">Product</th> -->
										<th class="product-quantity">Quantity</th>
										<th class="product-price">Price</th>
										<!-- <th class="product-subtotal">Subtotal</th> -->
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="product-remove">
											<a href="javascript:void(0)" class="remove" aria-label="Remove this item" data-product_id="" data-product_sku="">
												×
											</a>
										</td>
										<td class="product-thumbnail">
											<a href="#">
												<img width="300" height="300" src="{{asset('public/frontend/images/HXoibBrEOmdBu10n.jpg')}}" class="" alt="" loading="" />
											</a>
										</td>
										<td class="product-name" data-title="Product">
											<a href="#">Sexy mushrooms tattoo flash Art</a>
										</td>
										<td class="product-quantity" data-title="Quantity">
										   <div class="quantity buttons_added">
												<input type="button" value="-" class="minus quantity_button" />
												<input type="text" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" />
												<input type="button" value="+" class="plus quantity_button" />
											</div>
										</td>
										<td class="product-price" data-title="Price">
											<span class="amount">
												<span class="">$</span>19.26
											</span>
										</td>
										<!--<td class="product-subtotal" data-title="Subtotal">
											<span class="amount">
												<span class="">$</span>19.26
											</span>
										</td>-->
									</tr>
									<tr>
										<td class="product-remove">
											<a href="javascript:void(0)" class="remove" aria-label="Remove this item" data-product_id="" data-product_sku="">
												×
											</a>
										</td>
										<td class="product-thumbnail">
											<a href="#">
												<img width="300" height="300" src="{{asset('public/frontend/images/Toddler-Riding.jpg')}}" class="" alt="" loading="" />
											</a>
										</td>
										<td class="product-name" data-title="Product">
											<a href="#">Sexy mushrooms tattoo flash Art</a>
										</td>
										<td class="product-quantity" data-title="Quantity">
										   <div class="quantity buttons_added">
												<input type="button" value="-" class="minus quantity_button" />
												<input type="text" step="1" min="1" max="" name="quantity" value="2" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" />
												<input type="button" value="+" class="plus quantity_button" />
											</div>
										</td>
										<td class="product-price" data-title="Price">
											<span class="amount">
												<span class="">$</span>38.52
											</span>
										</td>
										<!---<td class="product-subtotal" data-title="Subtotal">
											<span class="amount">
												<span class="">$</span>38.52
											</span>
										</td>-->
									</tr>
									<tr>
										<td class="product-remove">
											<a href="javascript:void(0)" class="remove" aria-label="Remove this item" data-product_id="" data-product_sku="">
												×
											</a>
										</td>
										<td class="product-thumbnail">
											<a href="#">
												<img width="300" height="300" src="{{asset('public/frontend/images/retro3.png')}}" class="" alt="" loading="" />
											</a>
										</td>
										<td class="product-name" data-title="Product">
											<a href="#">Sexy mushrooms tattoo flash Art</a>
										</td>
										
										<td class="product-quantity" data-title="Quantity">
										   <div class="quantity buttons_added">
												<input type="button" value="-" class="minus quantity_button" />
												<input type="text" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" />
												<input type="button" value="+" class="plus quantity_button" />
											</div>
										</td>
										<td class="product-price" data-title="Price">
											<span class="amount">
												<span class="">$</span>19.26
											</span>
										</td>
										<!--<td class="product-subtotal" data-title="Subtotal">
											<span class="amount">
												<span class="">$</span>19.26
											</span>
										</td>-->
									</tr>
									<!--<tr>
										<td colspan="6" class="actions">
											<div class="coupon">
												<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code" />
												<button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
											</div>
											<button type="submit" class="button" name="update_cart" value="Update cart" disabled="" aria-disabled="true">Update cart</button>
											
										</td>
									</tr>-->
								</tbody>
							</table>
							<div class="cart-collaterals">
								<div class="cart_totals">
									<!-- <h2>Cart totals</h2> -->
									<table cellspacing="0" class="shop_table">
										<tbody>
											<tr>
												<td colspan="2" class="actions">
													<div class="coupon">
														<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code" />
														<button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
													</div>
												</td>
											</tr>
											<tr class="cart-subtotal">
												<th>3 item</th>
												<td data-title="Subtotal">
													<span class="amount">
														<span class="">$</span>77.04
													</span>
												</td>
											</tr>
											<tr class="cart-subtotal">
												<th>Shipping</th>
												<td data-title="Subtotal">
													<span class="amount">
														<span class="">$</span>24.80
													</span>
												</td>
											</tr>
											<tr class="order-total">
												<th>Subtotal</th>
												<td data-title="Total">
													<strong>
														<span class="amount">
															<span class="">$</span>101.84
														</span>
													</strong>
												</td>
											</tr>
										</tbody>
									</table>
									<!--<div class="proceed-to-checkout">
										<a href="checkout.html" class="checkout-button button"> Proceed to checkout</a>
									</div>-->

									<div class="gift_order">
										<label class="gift_checkbox"><svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M4 4.5A3.5 3.5 0 0 0 4.338 6H2a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1v9a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-9h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2.338A3.5 3.5 0 0 0 16.5 1c-2.306 0-3.693 1.662-4.439 3.018a9.66 9.66 0 0 0-.061.113 9.66 9.66 0 0 0-.061-.113C11.193 2.662 9.806 1 7.5 1A3.5 3.5 0 0 0 4 4.5zM7.5 3a1.5 1.5 0 0 0 0 3h3.154a8.208 8.208 0 0 0-.468-1.018C9.557 3.838 8.694 3 7.5 3zm5.846 3H16.5a1.5 1.5 0 0 0 0-3c-1.194 0-2.057.838-2.686 1.982A8.208 8.208 0 0 0 13.346 6zM13 8v3h8V8zm-2 0v3H3V8zm2 13h6v-8h-6zm-2-8v8H5v-8z" fill="#fff" fill-rule="evenodd"></path></svg> This order is a gift
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</div>
									
									<div class="cart_checkout_stap">
										<div id="checkout_stap_one" class="checkout_stap">
											<span class="checkout_stap_number">1</span>
											<button class="edit">EDIT</button>
											<div class="checkout_stap_text">
												<div id="checkout_shipping_text_one">
													<h3>Shipping to India</h3>
													<p>Delivers between 8 - 12 October Using Standard Shipping</p>
													<div class="shipped_responsibly">
														<svg viewBox="0 0 182.1 178.51" xmlns="http://www.w3.org/2000/svg"><path d="M181.28 88.56c0 36.25-20.1 67.54-53.58 82.16s-75 4.36-102-18.8C-5.69 125.05-5.76 79.06 11.7 44 30.64 6 77.85-6.82 116.7 3.36c17.3 4.52 32.3 15.26 43.64 28.8 5.74 6.84 11.17 14.55 14.45 22.92 1.11 3.04 9.37 33.36 6.49 33.48z" fill="#ededf2"></path><g fill="#9cb"><path d="M180.63 104.65l-7.77 2.54a23.45 23.45 0 0 1-8.66.88 10.38 10.38 0 0 0-6.06 1.89 29.41 29.41 0 0 1-4.19 2.22c-1.83.75-3.77 1.24-5.61 2a12.26 12.26 0 0 1-5.35.47c-1.2-.08-2.36-.62-3.56-.82-2.06-.33-4.12-.65-6.2-.81a8.85 8.85 0 0 1-6.23-3.26 11.94 11.94 0 0 1-2.77-7.73 54.77 54.77 0 0 0-.31-6.14 36.26 36.26 0 0 0-1.8-7.55c-.88-2.64-1.86-5.25-2.92-7.82-1.35-3.29-2.81-6.53-4.24-9.78a62.34 62.34 0 0 1-3.75-9.74 21 21 0 0 1-.8-5.62c.07-2.2.09-4.41 0-6.62a26.73 26.73 0 0 1 1.53-9.34c.55-1.67.86-3.43 1.56-5a69.87 69.87 0 0 1 3.76-7.49 78 78 0 0 1 5.28-7.93 52.68 52.68 0 0 1 4.95-5.18 35.74 35.74 0 0 1 3.27-2.82 3.21 3.21 0 0 1 1.55-.51 12.6 12.6 0 0 1 8.27 2.24c3.08 1.94 6.28 3.67 9.3 5.68a49.91 49.91 0 0 1 13.53 13.1c1.88 2.71 3.79 5.4 5.45 8.24a53.69 53.69 0 0 1 3.43 7.25c1.11 2.77 2 5.63 2.94 8.46.81 2.43 1.6 4.86 2.34 7.31 1.08 3.59 2.21 7.18 3.13 10.82a57.08 57.08 0 0 1 1.16 7 32.83 32.83 0 0 1 .22 5.15c-.09 2.81-.42 5.62-.48 8.43a42.2 42.2 0 0 1-.86 8.53 14.37 14.37 0 0 0-.11 1.95zM91.68 178.51l-11.4-1q-3.9-.37-7.82-.87a49.1 49.1 0 0 1-10.38-2.77c-3.59-1.29-7.21-2.54-10.76-4a91.3 91.3 0 0 1-13.69-6.61c-2.08-1.26-4.27-2.37-6.28-3.74a72.62 72.62 0 0 1-7-5.28 44.36 44.36 0 0 1-8.08-9.11 9.64 9.64 0 0 1-1.6-4.67 32.37 32.37 0 0 1 1.48-11.4c.72-2.46 1.29-5 2-7.41a41.54 41.54 0 0 1 2.12-6.26c1.41-2.88 2.77-5.93 6.05-7.26a22.49 22.49 0 0 1 4.71-1.45 14.1 14.1 0 0 1 6.2 0 13.52 13.52 0 0 1 6.27 3.82c1.92 2 3.57 4.31 5.4 6.43 2.42 2.8 4 6.11 5.74 9.32a13.89 13.89 0 0 1 .88 2.24c.82 2.36 1.5 4.78 2.49 7.07a17.65 17.65 0 0 0 2.73 4.44 22.81 22.81 0 0 0 8.1 5.7c2.19 1 4.19 2.41 6.31 3.59 1.78 1 3.62 1.9 5.42 2.88 2.74 1.51 5.52 3 8.17 4.62a23.36 23.36 0 0 1 5.26 3.8c1.34 1.48 2.83 2.83 3.64 4.69.58 1.33 1.48 2.55 1.61 4.05s.73 3.25.32 4.94a5.09 5.09 0 0 1-4.78 4c-1 .06-2.11 0-3.16 0zM47.62 29.8v2a31.85 31.85 0 0 1-1.85 12c-.88 2.74-1.71 5.5-2.56 8.25-.54 1.76-1.16 3.5-1.62 5.28a8.68 8.68 0 0 0-.35 4.32 4.4 4.4 0 0 1-.54 2.58 32 32 0 0 1-2.36 4.39 42.94 42.94 0 0 1-2.87 3.47A12.11 12.11 0 0 1 34 74a30.36 30.36 0 0 1-3.4 2.54 19.5 19.5 0 0 1-8.8 3.33 30.81 30.81 0 0 1-4.07.52c-2.74-.14-5.45-.45-7.66-2.49a18.18 18.18 0 0 1-5.21-7.33 17.16 17.16 0 0 1-1.15-3.67 11.82 11.82 0 0 1 .48-3.65C5 59.67 5.82 56.1 6.8 52.56a42.79 42.79 0 0 1 2-4.91c1.32-3.07 2.52-6.2 4-9.19A32.3 32.3 0 0 1 21.19 28c1.8-1.51 3.39-3.25 5.17-4.78 3.85-3.29 7.51-6.81 11.79-9.56a9.5 9.5 0 0 1 5.48-1.82 3.08 3.08 0 0 0 .43 0c1.72-.3 1.76-.31 2.26 1.37A13.16 13.16 0 0 1 46.8 16c.15 1.76-.08 3.6.38 5.26.82 2.87.16 5.74.44 8.54z"></path></g><path d="M93.33 70.87a23 23 0 0 0 1.49-3.23 97.08 97.08 0 0 1 5.48-14.5c3-6.72 6.64-13 12.19-18a39.71 39.71 0 0 1 3.1-2.56 18.82 18.82 0 0 1 10.09-3.76 33.83 33.83 0 0 1 9.74.48 15.71 15.71 0 0 1 9.91 6.38 45.77 45.77 0 0 1 3.24 5.43 23.15 23.15 0 0 1 1.56 4.29c1.62 5.81 1.43 11.78 1.47 17.72a65.18 65.18 0 0 1-3.6 20.93 133.47 133.47 0 0 1-11.57 25.65c-5 8.62-10.39 17-16.1 25.19-3.07 4.41-6.09 8.83-9.5 13a6.65 6.65 0 0 1-7.63 2.42 29.35 29.35 0 0 1-6.81-3.06 206.89 206.89 0 0 1-26.26-17.63 296.64 296.64 0 0 1-23-20c-7.12-7.08-13.42-14.76-18-23.76-1-2-1.91-4.19-2.73-6.33A22.09 22.09 0 0 1 25.05 70c.16-1.91.43-3.81.57-5.72A15.4 15.4 0 0 1 29 55.81a29 29 0 0 1 13.15-9.94 21.71 21.71 0 0 1 9.62-1.09 36 36 0 0 1 13.12 4 101.49 101.49 0 0 1 15.83 10.44 57.34 57.34 0 0 1 10.44 9.85 14.92 14.92 0 0 0 2.17 1.8z" fill="#865cd0"></path></svg>
														<p>Made one at a time and shipped responsibly. For a happy planet.</p>
													</div>
												</div>
												<div id="checkout_shipping_text_two">
													<h3>When would you like your order by? </h3>
													<p>Shipping to <a href="#">INDIA</a></p>
													<p>Delivers between 8 - 12 October</p>
													<a class="checkout_btn" href="javascript:void(0)"><span>Checkout <span>$101.84</span></span></a>
													<p>Includes standard shipping</p>
													<h5><span>or</span></h5>
													<p>Get it sooner 27 September</p>
													<a class="checkout_btn" href="javascript:void(0)"><span>Checkout <span>$101.84</span></span></a>
													<p>Includes express shipping</p>
												</div>
											</div>
											<div class="continue_checkout_btn">
												<a class="continue_checkout" href="javascript:void(0)">Continue</a>
											</div>
										</div>
										
										
										
										<!--<div id="checkout_stap_two" class="checkout_stap">
											<span class="checkout_stap_number">2</span>
											<div class="checkout_stap_text">
												<div id="checkout_payment_method_one">
													<h3>Payment Method</h3>
													
												</div>
												<div id="checkout_payment_method_two">
													<h3>How would you like to checkout?</h3>
													<a class="credit_card" href="javascript:void(0)">Pay by Credit Card</a>
													<ul>
														<li><a href="#"><img src="images/visac9f74d1d54e61ab2c748f45a4bdface0.png" alt=""></a></li>
														<li><a href="#"><img src="images/mastercard1fcd14928245139962b72f9368bdbe32.png" alt=""></a></li>
														<li><a href="#"><img src="images/amex6b6f405105413b0723a62ee498f88bf6.png" alt=""></a></li>
													</ul>
												</div>
											</div>
										</div>-->
										
										<div id="checkout_stap_three" class="checkout_stap">
											<span class="checkout_stap_number">2</span>
											<div class="checkout_stap_text">
												<div id="checkout_shipping_details_one">
													<h3>Shipping details</h3>
												</div>
												<div id="checkout_shipping_details_two">
													<h3>What are the shipping details?</h3>
													<form>
														<p>
															<label>Email Address</label>
															<input type="email" class="input-text" name="" placeholder="e.g. you@email.com" />
														</p>
														<span class="app-entries-cart">(For receipt and order confirmation)</span>
														<div class="offers">
															<label class="offers_checkbox"> Also send me offers & updates
																<input type="checkbox">
																<span class="checkmark"></span>
															</label>
														</div>
														<h3>Delivery Details</h3>
														<p>
															<label>Name</label>
															<input type="text" class="input-text" name="" placeholder="e.g. John Smith" />
														</p>
														<p>
															<label>Phone Number</label>
															<input type="number" class="input-text" name="" placeholder="e.g. 123-456-7890" />
														</p>
														<p>
															<label>Street Address</label>
															<input type="text" class="input-text" name="" placeholder="e.g. 111 Sutter St" />
														</p>
														<p>
															<label>Street Address 2 (optional)</label>
															<input type="text" class="input-text" name="" placeholder="Apartment, suite, unit, building, floor, etc." />
														</p>
														<p>
															<label>ZIP or Postcode</label>
															<input type="text" class="input-text" name="" placeholder="e.g. 94104" />
														</p>
														<p>
															<label>City or Suburb</label>
															<input type="text" class="input-text" name="" placeholder="e.g. San Francisco" />
														</p>
														<p>
															<label>State, Region or Province</label>
															<input type="text" class="input-text" name="" placeholder="e.g. California" />
														</p>
														<p class="continue_btn">
															<a class="continue_button btn" href="javascript:void(0)">Continue</a>
														</p>
													</form>
												</div>
											</div>
										</div>
										
										<div id="checkout_stap_four" class="checkout_stap">
											<span class="checkout_stap_number">3</span>
											<div class="checkout_stap_text">
												<div id="checkout_credit_card_one">
													<h3>Review and pay</h3>
													
												</div>
												<div id="checkout_credit_card_two">
													<h3>What are your credit card details?</h3>
														<span><svg style="width: px; max-width: px; min-width: px; height: px;" fill="" stroke="" xmlns="http://www.w3.org/2000/svg" viewBox="-404 579.5 32 32"><path d="M-375.9 585.1h-24.2c-1.6 0-2.9 1.3-2.9 2.9v15c0 1.6 1.3 2.9 2.9 2.9h24.2c1.6 0 2.9-1.3 2.9-2.9v-15c0-1.6-1.3-2.9-2.9-2.9zm-6.3 16.3h-7.1v-.8h7.1v.8zm4.2 0h-3.3v-.8h3.3v.8zm0-2.1h-11.2v-.8h11.2v.8zm4.2-6.3h-28.3v-4.2h28.3v4.2z"></path></svg></span>
													<form class="credit_card_form">
														<p>
															<label>Credit Card Number</label>
															<input type="text" class="input-text" name="cardnumber" placeholder="1234 1234 1234 1234" />
														</p>
														<p class="exp-date">
															<label>Expiry Date</label>
															<input type="text" class="input-text" name="exp-date" placeholder="MM / YY" />
														</p>
														<p class="cvc">
															<label>CVC</label>
															<input type="text" class="input-text" name="cvc" placeholder="CVC" />
														</p>
														<div class="offers">
															<label class="offers_checkbox">Same billing & shipping info
																<input type="checkbox">
																<span class="checkmark"></span>
															</label>
														</div>
													</form>
													<ul>
														<li><span>3 ITEMS</span><span>$77.04</span></li>
														<li><span>SHIPPING</span><span>$24.80</span></li>
														<li><span>TOTAL</span><span>$101.84</span></li>
													</ul>
													<p>By clicking pay, I agree to Redbubble’s <a href="#">User Agreement</a></p>
													<button type="submit" class="btn">Pay <span>$101.84</span></button>
													<ul class="Pay_icon">
														<li><a href="#"><img src="{{asset('public/frontend/images/visac9f74d1d54e61ab2c748f45a4bdface0.png')}}" alt=""></a></li>
														<li><a href="#"><img src="{{asset('public/frontend/images/mastercard1fcd14928245139962b72f9368bdbe32.png')}}" alt=""></a></li>
													</ul>
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
		
		<div class="purple_artist_sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="purple_artist">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="purple_artist_item">
                                        <img src="{{asset('public/frontend/images/purple_artist1.png')}}" alt="" />
                                        <h3>Carbon Neutrality</h3>
                                        <p>Investing in programs that help the environment</p>
                                        <a href="#">Learn more</a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="purple_artist_item">
                                        <img src="{{asset('public/frontend/images/purple_artist2.png')}}" alt="" />
                                        <h3>Worldwide Shipping</h3>
                                        <p>Available as Standard or Express delivery</p>
                                        <a href="#">Learn more</a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="purple_artist_item">
                                        <img src="{{asset('public/frontend/images/purple_artist3.png')}}" alt="" />
                                        <h3>Secure Payments</h3>
                                        <p>100% Secure payment with 256-bit SSL Encryption</p>
                                        <a href="#">Learn more</a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="purple_artist_item">
                                        <img src="{{asset('public/frontend/images/purple_artist4.png')}}" alt="" />
                                        <h3>Super Service</h3>
                                        <p>Hassle-free returns and friendly customer support</p>
                                        <a href="#">Submit a request</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
			
@endsection
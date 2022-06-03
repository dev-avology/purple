<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="icon" href="{{asset('public/frontend/images/favicon.png')}}" type="image/x-icon" />
        <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.css')}}" />
		<link href="{{asset('public/frontend/css/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/frontend/css/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontend/css/responsive.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontend/css/magnific-popup.min.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontend/fonts/stylesheet.css')}}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.1/css/flag-icon.min.css" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

		<!-- Style sheets -->
		<link rel="stylesheet" type="text/css" href="{{asset('public/product-designer/css/main.css')}}">

		<!-- The CSS for the plugin itself - required -->
		<link rel="stylesheet" type="text/css" href="{{asset('public/product-designer/css/FancyProductDesigner-all.min.css')}}" />
       
        <title>Product Details</title>
    </head>
    <body>
		<div class="searching_result_sec">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="searching_result">
							<a href="javascript:void(0)" class="closebutton">×</a>
							<div class="mobile_search_form">
								<input type="text" placeholder="Search design and products" name="search" />
								<button class="submit_btn" type="submit"><img src="{{asset('public/frontend/images/search_icon.png')}}" alt="" /></button>
							</div>
							<div class="row">
								<div class="col-lg-4">
									<div class="searching_result_left text-left">
										<h3>Trending searches</h3>
										<ul>
											<li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M16.85 6.85l1.44 1.44-4.88 4.88-3.29-3.29a.996.996 0 00-1.41 0l-6 6.01a.996.996 0 101.41 1.41L9.41 12l3.29 3.29c.39.39 1.02.39 1.41 0l5.59-5.58 1.44 1.44a.5.5 0 00.85-.35V6.5a.48.48 0 00-.49-.5h-4.29a.5.5 0 00-.36.85z"></path></svg> Trending searches</a></li>
											<li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M16.85 6.85l1.44 1.44-4.88 4.88-3.29-3.29a.996.996 0 00-1.41 0l-6 6.01a.996.996 0 101.41 1.41L9.41 12l3.29 3.29c.39.39 1.02.39 1.41 0l5.59-5.58 1.44 1.44a.5.5 0 00.85-.35V6.5a.48.48 0 00-.49-.5h-4.29a.5.5 0 00-.36.85z"></path></svg> metallic</a></li>
											<li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M16.85 6.85l1.44 1.44-4.88 4.88-3.29-3.29a.996.996 0 00-1.41 0l-6 6.01a.996.996 0 101.41 1.41L9.41 12l3.29 3.29c.39.39 1.02.39 1.41 0l5.59-5.58 1.44 1.44a.5.5 0 00.85-.35V6.5a.48.48 0 00-.49-.5h-4.29a.5.5 0 00-.36.85z"></path></svg> dog</a></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-8">
									<div class="searching_result_right">
										<h3>Top artists</h3>
										<div id="top_artists" class="owl-carousel">
											<div class="item">
												<div class="top_artists_item">
													<a href="#">
														<img src="{{asset('public/frontend/images/product_range1.png')}}" alt="" />
														<span>stevenrhodes</span>
													</a>
												</div>
											</div>

											<div class="item">
												<div class="top_artists_item">
													<a href="#">
														<img src="{{asset('public/frontend/images/product_range2.png')}}" alt="" />
														<span>Ilustrata</span>
													</a>
												</div>
											</div>

											<div class="item">
												<div class="top_artists_item">
													<a href="#">
														<img src="{{asset('public/frontend/images/product_range3.png')}}" alt="" />
														<span>pikaole</span>
													</a>
												</div>
											</div>
											<div class="item">
												<div class="top_artists_item">
													<a href="#">
														<img src="{{asset('public/frontend/images/product_range2.png')}}" alt="" />
														<span>thepapercrane</span>
													</a>
												</div>
											</div>
										</div>
										<h3>Popular products</h3>
										<div class="Popular_prod">
											<ul>
												<li><a href="#"><img src="{{asset('public/frontend/images/our_product1.png')}}" alt=""><span>Wall Art</span></a></li>
												<li><a href="#"><img src="{{asset('public/frontend/images/our_product2.png')}}" alt=""><span>Art Board Prints</span></a></li>
												<li><a href="#"><img src="{{asset('public/frontend/images/our_product3.png')}}" alt=""><span>Art Prints</span></a></li>
												<li><a href="#"><img src="{{asset('public/frontend/images/our_product4.png')}}" alt=""><span>Canvas Prints</span></a></li>
											</ul>
										</div>
										<h3>Quick links</h3>
										<div class="quick_links">
											<ul>
												<li><a href="#"><img src="{{asset('public/frontend/images/featured_products1.png')}}" alt=""><span>Fan Art Merch</span></a></li>
												<li><a href="#"><img src="{{asset('public/frontend/images/featured_products2.png')}}" alt=""><span>Gift cards</span></a></li>
												<li><a href="#"><img src="{{asset('public/frontend/images/featured_products3.png')}}" alt=""><span>Gift ideas</span></a></li>
												<li><a href="#"><img src="{{asset('public/frontend/images/featured_products4.png')}}" alt=""><span>Wall Art</span></a></li>
											</ul>
										</div>
										<div class="quick_links_order">
											<ul>
												<li><a href="#"><svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9.296 5.704c0 .56.45 1 1 1h5.59l-10.89 10.89a.996.996 0 101.41 1.41l10.89-10.89v5.59c0 .55.45 1 1 1s1-.45 1-1v-8c0-.55-.45-1-1-1h-8c-.55 0-1 .45-1 1z" fill="#currentColor"></path></svg> Where's my order?</a></li>
												<li><a href="#"><svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9.296 5.704c0 .56.45 1 1 1h5.59l-10.89 10.89a.996.996 0 101.41 1.41l10.89-10.89v5.59c0 .55.45 1 1 1s1-.45 1-1v-8c0-.55-.45-1-1-1h-8c-.55 0-1 .45-1 1z" fill="#currentColor"></path></svg> Worldwide shipping</a></li>
												<li><a href="#"><svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9.296 5.704c0 .56.45 1 1 1h5.59l-10.89 10.89a.996.996 0 101.41 1.41l10.89-10.89v5.59c0 .55.45 1 1 1s1-.45 1-1v-8c0-.55-.45-1-1-1h-8c-.55 0-1 .45-1 1z" fill="#currentColor"></path></svg> Customer support</a></li>
												<li><a href="#"><svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9.296 5.704c0 .56.45 1 1 1h5.59l-10.89 10.89a.996.996 0 101.41 1.41l10.89-10.89v5.59c0 .55.45 1 1 1s1-.45 1-1v-8c0-.55-.45-1-1-1h-8c-.55 0-1 .45-1 1z" fill="#currentColor"></path></svg> Coupons and promos</a></li>
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
        <header>
            <div class="header_top_section">
				<div class="container">
					<div class="row">
						<div class="col-lg-3">
							<div class="site-logo">
								<a href="http://146.190.226.38/"><img src="{{asset('public/frontend/images/logo.png')}}" alt="site-logo" /></a>
								<div class="mobile_header_icon">
									<a class="mobile_serch_icon" href="javascript:void(0)"><img src="{{asset('public/frontend/images/search_icon.png')}}" alt="" /></a>
									<h1 class="mobile-menu" onclick="openNav()">
										<span><i class="fa fa-bars"></i></span>
									</h1>
								</div>
							</div>
						</div>

						<div class="col-lg-9">
							
							<div class="middle_navigation">
								<ul>
									<li>
										<div class="search_design_form">
											<input type="text" placeholder="Search design and products" name="search" />
											<button class="submit_btn" type="submit"><img src="{{asset('public/frontend/images/search_icon.png')}}" alt="" /></button>
										</div>
									</li>
									@if (empty(session()->get('userId')))
									<li><a href="http://146.190.226.38/login">Sell your art</a></li>
									<li><a href="http://146.190.226.38/login">Login</a></li>
									<li><a href="http://146.190.226.38/signup">Signup</a></li>
									<li>
										<a href="http://146.190.226.38/wishlist"> <img class="color_icon" src="{{asset('public/frontend/images/heart_icon.png')}}" alt="" /></a>
									</li>
									<li>
										<a href="{{route('cart')}}"><img class="color_icon" src="{{asset('public/frontend/images/cart_icon.png')}}" alt="" /></a>
									</li>
									@else 
									<li>
										<div class="profile">
											<a class="account_profile" href="javascript:void(0)">
												<img src="{{asset('public/frontend/images/rb-default-avatar.png')}}" alt="">
											</a>
											<div class="account_category">
												<a href="#" class="account_category_profile">
													<div class="account_profile">
														<img src="{{asset('public/frontend/images/rb-default-avatar.png')}}" alt="">
														<span>Avology</span>
													</div>
												</a>
												<a href="#">Dashboard</a>
												<a href="#">View Shop</a>
												<a href="#">Activity Feed</a>
												<a href="#">Manage Portfolio</a>
												<span class="new_work"><a href="{{route('add-new-work')}}">Add New Work</a></span>
												<span class="order_history">
													<a href="#">Order History</a>
													<a href="#">BubbleMail</a>
													<a href="#">Account Settings</a>
												</span>
												<a href="#">RB Blog</a>
												<a class="account_logout" href="#">Logout</a>
											</div>
										</div>
									</li>
									@endif
								</ul>
							</div>
							
						</div>
					</div>
				</div>
            </div>
			<div class="header_navigation_section">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="header_navigation">
								<div class="navigation" id="mySidenav">
									<!-- <div class="middle_navigation">
										<ul>
											<li>
												<div class="search_design_form">
													<input type="text" placeholder="Search design and products" name="search" />
													<button class="submit_btn" type="submit"><img src="{{asset('public/frontend/images/search_icon.png')}}" alt="" /></button>
												</div>
											</li>
											<li><a href="#">Sell your art</a></li>
											<li><a href="#">Login</a></li>
											<li><a href="#">Signup</a></li>
											<li>
												<a href="#"> <img class="color_icon" src="{{asset('public/frontend/images/heart_icon.png')}}" alt="" /></a>
											</li>
											<li>
												<a href="{{route('cart')}}"><img class="color_icon" src="{{asset('public/frontend/images/cart_icon.png')}}" alt="" /></a>
											</li>
										</ul>
									</div> -->
									<div class="nav-main">
										<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
										<ul class="menu1 text-center">
											<li class="active"><a href="http://146.190.226.38/product-category/wall-art">Wall Art</a></li>
											<li><a href="http://146.190.226.38/product-category/art-board-prints">Art Board Prints </a></li>
											<li><a href="http://146.190.226.38/product-category/art-prints">Art Prints</a></li>
											<li><a href="http://146.190.226.38/product-category/canvas-prints">Canvas Prints</a></li>
											<li><a href="http://146.190.226.38/product-category/framed-prints">Framed Prints</a></li>
											<li><a href="http://146.190.226.38/product-category/metal-prints">Metal Prints</a></li>
											<li><a href="http://146.190.226.38/product-category/mounted-prints">Mounted Prints</a></li>
											<li><a href="http://146.190.226.38/product-category/photographic-prints">Photographic Prints</a></li>
											<li><a href="http://146.190.226.38/product-category/posters">Posters</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </header>



        @yield('content')

        <div class="subscribe_sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="subscriber">
                            <h2>10% off, promos, and the best indie art ever!</h2>
                            <div class="subscriber_form">
                                <input title="email" class="" type="email" placeholder="Your Email Address" required="" />
                                <button class="submit_btn" type="submit"><img src="{{asset('public/frontend/images/subscriber_icon.png')}}" alt="" /></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
			
		 <div class="footer_sec">
            <div class="footer">
                <div class="container">
                    <div class="mobile_footer_logo text-center">
                        <a href="http://146.190.226.38/"><img src="{{asset('public/frontend/images/footer_logo.png')}}" alt="" /></a>
                    </div>
					<!-- <div class="footer_language mobile_footer_language text-center">
						<ul>
						<li>
						<div class="dropdown_language">
						<div class="language-picker js-language-picker" data-trigger-class="btn btn--subtle">
						<form action="" class="language-picker__form">
						<label for="language-picker-select">Select your language</label>
						<select name="language-picker-select" id="language-picker-select">
							<option lang="en" value="english" selected>English</option>
							<option lang="fr" value="francais">French</option>
						</select>
						</form>
						</div>
						</div>
						</li>
						<li><a class="dollar_btn" href="#">DOLLAR($)</a></li>
						<li><a class="euro_btn" href="#">EURO(€)</a></li>
						</ul>
					</div> -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer_item">
                                <h3>Shop</h3>
                                <ul>
								<li class="active"><a href="http://146.190.226.38/product-category/wall-art">Wall Art</a></li>
								<li><a href="http://146.190.226.38/product-category/art-board-prints">Art Board Prints </a></li>
								<li><a href="http://146.190.226.38/product-category/art-prints">Art Prints</a></li>
								<li><a href="http://146.190.226.38/product-category/canvas-prints">Canvas Prints</a></li>
								<li><a href="http://146.190.226.38/product-category/framed-prints">Framed Prints</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer_item">
                                <h3>About</h3>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Social Responsibility</a></li>
                                    <li><a href="#">Sell your art</a></li>
                                    <li><a href="#">Jobs</a></li>
                                    <li><a href="#">Artist Blog</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer_item">
                                <h3>Help</h3>
                                <ul>
                                    <li><a href="#">Delivery</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Guidelines</a></li>
                                    <li><a href="#">Copyright</a></li>
                                    <li><a href="#">Investor Center</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer_item">
                                <h3>Social</h3>
                                <ul>
									<li>
                                        <a href="https://www.instagram.com/" target="_blank"><i className="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank"><i className="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com/" target="_blank"><i className="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                                    </li>
                                    <li>
                                        <a href="https://www.tumblr.com/" target="_blank"><i className="fa fa-tumblr" aria-hidden="true"></i> Tumblr</a>
                                    </li>
                                    <li>
                                        <a href="https://www.pinterest.com/" target="_blank"><i className="fa fa-pinterest" aria-hidden="true"></i> Pinterest</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
					<div class="row footer_logo">
						<div class="col-lg-6">
							<div class="desktop_footer_logo text-left">
								<a href="http://146.190.226.38/"><img src="{{asset('public/frontend/images/footer_logo.png')}}" alt="" /></a>
							</div>
						</div>
						<!-- <div class="col-lg-6">
							<div class="footer_language text-right">
							<ul>
							<li>
							<div class="dropdown_language">
							<div class="language-picker js-language-picker" data-trigger-class="btn btn--subtle">
							<form action="" class="language-picker__form">
							<label for="language-picker-select">Select your language</label>
							<select name="language-picker-select" id="language-picker-select">
								<option lang="en" value="english" selected>English</option>
								<option lang="fr" value="francais">French</option>
							</select>
							</form>
							</div>
							</div>
							</li>
							<li><a class="dollar_btn" href="#">DOLLAR($)</a></li>
							<li><a class="euro_btn" href="#">EURO(€)</a></li>
							</ul>
							</div>
						</div> -->
					</div>
                </div>
            </div>
            <div class="footer_middle_sec">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="footer_middle_left text-left">
                                <a href="#"><img src="{{asset('public/frontend/images/visa.png')}}" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer_middle_right text-right">
                                <ul>
                                    <li><a href="#">User Agreement</a></li>
                                    <li><a href="#">Privacy Policy </a></li>
                                    <li><a href="#">Cookie Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom_sec">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyrights text-center">
                                <p>PurpleArtistAll Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
        <script src="{{asset('public/frontend/js/bootstrap.js')}}"></script>
        <script src="{{asset('public/frontend/js/magnific-popup.min.js')}}"></script>
		<script src="{{asset('public/frontend/js/owl.carousel.js')}}" type="text/javascript"></script>
		<script src="{{asset('public/frontend/js/custom-jquery.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="{{asset('public/frontend/js/htmltocanvas.min.js')}}"></script>
		@stack('scripts');
    </body>
</html>

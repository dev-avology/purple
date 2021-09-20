import React, { Component } from "react";

export default class Footer extends Component {
    render(){
        return(
            <div class="footer_sec">
            <div class="footer">
                <div class="container">
                    <div class="mobile_footer_logo text-center">
                        <a href="index.html"><img src="images/footer_logo.png" alt="" /></a>
                    </div>
					<div class="footer_language mobile_footer_language text-center">
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
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer_item">
                                <h3>Shop</h3>
                                <ul>
                                    <li><a href="fan-art.html">Fan Art</a></li>
                                    <li><a href="new-works.html">New Works</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="signup.html">Signup</a></li>
                                    <li><a href="#">Bulk orders</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer_item">
                                <h3>About</h3>
                                <ul>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="social-responsibility.html">Social Responsibility</a></li>
                                    <li><a href="sell-your-art.html">Sell your art</a></li>
                                    <li><a href="jobs.html">Jobs</a></li>
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
                                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i> Tumblr</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i> Pinterest</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
					<div class="row footer_logo">
						<div class="col-lg-6">
							<div class="desktop_footer_logo text-left">
								<a href="index.html"><img src="images/footer_logo.png" alt="" /></a>
							</div>
						</div>
						<div class="col-lg-6">
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
						</div>
					</div>
                </div>
            </div>
            <div class="footer_middle_sec">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="footer_middle_left text-left">
                                <a href="#"><img src="images/visa.png" alt="" /></a>
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
        )
    }
}
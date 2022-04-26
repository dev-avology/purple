import React, { Component } from "react"
import { Link } from "react-router-dom";
import VisaImg from "../assets/images/visa.png"
import FooterLogo from "../assets/images/footer_logo.png"

export default class Footer extends Component {
    render(){
        return(
            <div className="footer_sec">
            <div className="footer">
                <div className="container">
                    <div className="mobile_footer_logo text-center">
                        <Link to="#"><img src="../images/footer_logo.png" alt="" /></Link>
                    </div>
					<div className="footer_language mobile_footer_language text-center">
						<ul>
						<li>
						<div className="dropdown_language">
						<div className="language-picker js-language-picker">
						<form action="" className="language-picker__form">
						<label>Select your language</label>
						<select name="language-picker-select">
							<option lang="en" value="english" defaultValue>English</option>
							<option lang="fr" value="francais">French</option>
						</select>
						</form>
						</div>
						</div>
						</li>
						<li><Link className="dollar_btn" to="#">DOLLAR($)</Link></li>
						<li><Link className="euro_btn" to="#">EURO(€)</Link></li>
						</ul>
					</div>
                    <div className="row">
                        <div className="col-lg-3 col-md-6">
                            <div className="footer_item">
                                <h3>Shop</h3>
                                <ul>
                                    <li><a href="#">Fan Art</a></li>
                                    <li><a href="#">New Works</a></li>
                                    <li><Link to={`${process.env.PUBLIC_URL}/login`}>Login</Link></li>
                                    <li><Link to={`${process.env.PUBLIC_URL}/signup`}>Signup</Link></li>
                                    <li><a href="#">Bulk orders</a></li>
                                </ul>
                            </div>
                        </div>
                        <div className="col-lg-3 col-md-6">
                            <div className="footer_item">
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
                        <div className="col-lg-3 col-md-6">
                            <div className="footer_item">
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
                        <div className="col-lg-3 col-md-6">
                            <div className="footer_item">
                                <h3>Social</h3>
                                <ul>
                                    <li>
                                        <a href="https://www.instagram.com/"><i className="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/"><i className="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com/"><i className="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                                    </li>
                                    <li>
                                        <a href="https://www.tumblr.com/"><i className="fa fa-tumblr" aria-hidden="true"></i> Tumblr</a>
                                    </li>
                                    <li>
                                        <a href="https://www.pinterest.com/"><i className="fa fa-pinterest" aria-hidden="true"></i> Pinterest</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
					<div className="row footer_logo">
						<div className="col-lg-6">
							<div className="desktop_footer_logo text-left">
								<a href="#"><img src={FooterLogo} alt="" /></a>
							</div>
						</div>
						<div className="col-lg-6">
                            <div class="footer_language text-right">
								<ul>
								<li>
								<div class="dropdown_language">
								<div class="language-picker js-language-picker" data-trigger-class="btn btn--subtle">
								<form action="" class="language-picker__form">
								<label for="language-picker-select">Select your language</label>
								<select name="language-picker-select" id="language-picker-select">
									<option lang="en" value="english" selected="">English</option>
									<option lang="fr" value="francais">French</option>
								</select>
								</form>
								<button class="language-picker__button btn btn--subtle" aria-label="english Select your language" aria-expanded="false" aria-contols="language-picker-select-dropdown"><span aria-hidden="true" class="language-picker__label language-picker__flag language-picker__flag--english"><em>English</em><svg viewBox="0 0 16 16" class="icon"><polygon points="3,5 8,11 13,5 "></polygon></svg></span></button><div class="language-picker__dropdown" aria-describedby="language-picker-select-description" id="language-picker-select-dropdown"><p class="sr-only" id="language-picker-select-description">Select your language</p><ul class="language-picker__list" role="listbox"><li><a lang="en" hreflang="en" href="#" aria-selected="true" role="option" data-value="english" class="language-picker__item language-picker__flag language-picker__flag--english"><span>English</span></a></li><li><a lang="fr" hreflang="fr" href="#" role="option" data-value="francais" class="language-picker__item language-picker__flag language-picker__flag--francais"><span>French</span></a></li></ul></div></div>
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
            <div className="footer_middle_sec"> 
                <div className="container">
                    <div className="row">
                        <div className="col-lg-6">
                            <div className="footer_middle_left text-left">
                                <a href="#"><img alt="Visa" src={VisaImg} /></a>
                            </div>
                        </div>
                        <div className="col-lg-6">
                            <div className="footer_middle_right text-right">
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
            <div className="footer_bottom_sec">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-12">
                            <div className="copyrights text-center">
                                <p>Purple Artist All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        )
    }
}
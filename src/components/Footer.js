import React, { Component } from "react";
import { Link } from "gatsby"
import { StaticImage } from "gatsby-plugin-image"

export default class Footer extends Component {
    render(){
        return(
            <div className="footer_sec">
            <div className="footer">
                <div className="container">
                    <div className="mobile_footer_logo text-center">
                        <Link to="#"><StaticImage src="../images/footer_logo.png" alt="" /></Link>
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
                                    <li><Link to="#">Fan Art</Link></li>
                                    <li><Link to="#">New Works</Link></li>
                                    <li><Link to="#">Login</Link></li>
                                    <li><Link to="#">Signup</Link></li>
                                    <li><Link to="#">Bulk orders</Link></li>
                                </ul>
                            </div>
                        </div>
                        <div className="col-lg-3 col-md-6">
                            <div className="footer_item">
                                <h3>About</h3>
                                <ul>
                                    <li><Link to="#">About Us</Link></li>
                                    <li><Link to="#">Social Responsibility</Link></li>
                                    <li><Link to="#">Sell your art</Link></li>
                                    <li><Link to="#">Jobs</Link></li>
                                    <li><Link to="#">Artist Blog</Link></li>
                                </ul>
                            </div>
                        </div>
                        <div className="col-lg-3 col-md-6">
                            <div className="footer_item">
                                <h3>Help</h3>
                                <ul>
                                    <li><Link to="#">Delivery</Link></li>
                                    <li><Link to="#">Returns</Link></li>
                                    <li><Link to="#">Guidelines</Link></li>
                                    <li><Link to="#">Copyright</Link></li>
                                    <li><Link to="#">Investor Center</Link></li>
                                    <li><Link to="#">Contact Us</Link></li>
                                </ul>
                            </div>
                        </div>
                        <div className="col-lg-3 col-md-6">
                            <div className="footer_item">
                                <h3>Social</h3>
                                <ul>
                                    <li>
                                        <Link to="#"><i className="fa fa-instagram" aria-hidden="true"></i> Instagram</Link>
                                    </li>
                                    <li>
                                        <Link to="#"><i className="fa fa-facebook" aria-hidden="true"></i> Facebook</Link>
                                    </li>
                                    <li>
                                        <Link to="#"><i className="fa fa-twitter" aria-hidden="true"></i> Twitter</Link>
                                    </li>
                                    <li>
                                        <Link to="#"><i className="fa fa-tumblr" aria-hidden="true"></i> Tumblr</Link>
                                    </li>
                                    <li>
                                        <Link to="#"><i className="fa fa-pinterest" aria-hidden="true"></i> Pinterest</Link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
					<div className="row footer_logo">
						<div className="col-lg-6">
							<div className="desktop_footer_logo text-left">
								<Link to="#"><StaticImage src="../images/footer_logo.png" alt="" /></Link>
							</div>
						</div>
						<div className="col-lg-6">
							<div className="footer_language text-right">
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
						</div>
					</div>
                </div>
            </div>
            <div className="footer_middle_sec"> 
                <div className="container">
                    <div className="row">
                        <div className="col-lg-6">
                            <div className="footer_middle_left text-left">
                                <Link to="#"><StaticImage alt="" src='../images/visa.png'/></Link>
                            </div>
                        </div>
                        <div className="col-lg-6">
                            <div className="footer_middle_right text-right">
                                <ul>
                                    <li><Link to="#">User Agreement</Link></li>
                                    <li><Link to="#">Privacy Policy </Link></li>
                                    <li><Link to="#">Cookie Policy</Link></li>
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
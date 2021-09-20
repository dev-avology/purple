import React from "react";
import Logo from './Logo';
import './Style.css';
import Navigation from './Navigation';
const Header = () => {
    return (
        <header>
        <div className="header_top_section">
            <div className="container">
                <div className="row">
                    <div className="col-lg-3">
                        <div className="site-logo">
                            <Logo />
                            <div className="mobile_header_icon">
                                <a className="mobile_serch_icon"><img src="images/search_icon.png" alt="" /></a>
                                <h1 className="mobile-menu">
                                    <span><i className="fa fa-bars"></i></span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <div className="col-lg-9">
                        <div className="middle_navigation">
                                <Navigation />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div className="header_navigation_section">
            <div className="container">
                <div className="row">
                    <div className="col-lg-12">
                        <div className="header_navigation">
                            <div className="navigation" id="mySidenav">
                                <div className="middle_navigation">
                                        <Navigation />
                                </div>
                                <div className="nav-main">
                                    <a className="closebtn">×</a>
                                    <ul className="menu1 text-center">
                                        <li className="active"><a href="fan-art.html">Wall Art</a></li>
                                        <li><a to="#">Art Board Prints </a></li>
                                        <li><a to="#">Art Prints</a></li>
                                        <li><a to="#">Canvas Prints</a></li>
                                        <li><a to="#">Framed Prints</a></li>
                                        <li><a to="#">Metal Prints</a></li>
                                        <li><a to="#">Mounted Prints</a></li>
                                        <li><a to="#">Photographic Prints</a></li>
                                        <li><a to="#">Posters</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    );
}
 
export default Header;
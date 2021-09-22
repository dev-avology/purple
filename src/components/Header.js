import React from "react"
import { Link } from "gatsby"
import { StaticImage } from "gatsby-plugin-image"
import LoginMenu from "./LoginMenu"
import PrimaryMenu from "./PrimaryMenu"
import SearchIcon from '../images/search_icon.png'
import AccountMenu from "./AccountMenu"

const login = typeof window !== 'undefined' ? localStorage.getItem('isLoggedIn') : null
const Header = () => {
    return (
    <header>
        <div className="header_top_section">
            <div className="container">
                <div className="row">
                    <div className="col-lg-3">
                        <div className="site-logo">
                            <Link to="/"><StaticImage alt="" src='../images/logo.png'/></Link>
                            <div className="mobile_header_icon">
                                <Link href="/" onClick="return false" className="mobile_serch_icon"><img src={SearchIcon} /></Link>
                                <h1 className="mobile-menu">
                                    <span><i className="fa fa-bars"></i></span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <div className="col-lg-9">
                        <div className="middle_navigation">
                        {login ? (
                                <>
                                <AccountMenu />
                                </>
                            ) : (
                                <>
                                <LoginMenu />
                                </>
                            )
                        }
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
                                </div>
                                <PrimaryMenu />
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
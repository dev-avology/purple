import React from "react"
import { Link } from "gatsby"
import { StaticImage } from "gatsby-plugin-image"
import LoginMenu from "src/components/LoginMenu"
import PrimaryMenu from "src/components/PrimaryMenu"
import SearchIcon from 'src/images/search_icon.png'
import AccountMenu from "src/components/AccountMenu"
import { isAuthenticated } from "src/hooks/UserAuth"

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
                                <Link to="/" className="mobile_serch_icon"><img alt="" src={SearchIcon} /></Link>
                                <h1 className="mobile-menu">
                                    <span><i className="fa fa-bars"></i></span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <div className="col-lg-9">
                        <div className="middle_navigation">
                        {isAuthenticated() ? (
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
 
export default Header
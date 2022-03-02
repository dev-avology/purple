import React from "react"
import { Link } from "react-router-dom";
import { useSelector } from "react-redux";
import LoginMenu from "./LoginMenu"
import PrimaryMenu from "./PrimaryMenu"
import AccountMenu from "./AccountMenu"
//import SearchIcon from 'src/images/search_icon.png'
//import { isAuthenticated } from "src/hooks/UserAuth"

import logo from "../assets/images/logo.png"
const Header = () => {

const { isLoggedIn } = useSelector(state => state.auth);

    return (
    <header>
        <div className="header_top_section">
            <div className="container">
                <div className="row">
                    <div className="col-lg-3">
                        <div className="site-logo">
                            <Link to="/"><img alt="" src={logo}/></Link>
                            <div className="mobile_header_icon">
                                <Link to="/" className="mobile_serch_icon"><img alt="" src="" /></Link>
                                <h1 className="mobile-menu">
                                    <span><i className="fa fa-bars"></i></span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <div className="col-lg-9">
                        <div className="middle_navigation">
                        {isLoggedIn ? (
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
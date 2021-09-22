import React from "react"
import { Link } from "gatsby"
import { StaticImage } from "gatsby-plugin-image"
import Search from "./Search"
const AccountMenu = () => {
    return (
        <>
            <ul>
                <li>
                    <Search />
                </li>
                <li><Link to="sell-your-art.html">Sell your art</Link></li>
                <li><Link to="/login">My Account</Link>
                    <ul className="sub-menu">
                        <li><Link to="/login">Logout</Link></li>
                    </ul>
                </li>
                
                <li>
                    <Link to="/login"> <StaticImage alt="" src="../images/heart_icon.png" /></Link>
                </li>
                <li>
                    <Link to="/login"><StaticImage alt="" src="../images/cart_icon.png" /></Link>
                </li>
            </ul>
        </>
    )
}
export default AccountMenu;
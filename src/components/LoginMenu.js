import React from "react"
import { Link } from "gatsby"
import { StaticImage } from "gatsby-plugin-image"
import Search from "./Search"
const LoginMenu = () => {
    return (
        <>
            <ul>
                <li>
                    <Search />
                </li>
                <li><Link to="sell-your-art.html">Sell your art</Link></li>
                <li><Link to="/login">Login</Link></li>
                <li><Link to="/signup">Signup</Link></li>
                <li>
                    <Link to="/login"> <StaticImage alt="" src="../images/heart_icon.png"  /></Link>
                </li>
                <li>
                    <Link to="cart.html"><StaticImage alt="" src="../images/cart_icon.png"  /></Link>
                </li>
            </ul>
        </>
    )
}
export default LoginMenu;
import React from "react"
import { Link } from "react-router-dom"
import HeartIcon from "../assets/images/heart_icon.png"
import CartIcon from "../assets/images/cart_icon.png"
const LoginMenu = () => {
    return (
        <>
            <ul>
                <li><Link to={`${process.env.PUBLIC_URL}/login`}>Login</Link></li>
                <li><Link to={`${process.env.PUBLIC_URL}/signup`}>Signup</Link></li>
                <li>
                    <Link to={`${process.env.PUBLIC_URL}/wishlist`}> <img alt="" src={HeartIcon}  /></Link>
                </li>
                <li>
                    <a href="http://146.190.226.38/backend-services/cart"><img alt="" src={CartIcon} /></a>
                </li>
            </ul>
        </>
    )
}
export default LoginMenu;
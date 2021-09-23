import React from "react"
import { Link } from "gatsby"
import { StaticImage } from "gatsby-plugin-image"
import { logout } from "src/hooks/UserAuth"
import Search from "src/components/Search"
const AccountMenu = () => {
    return (
        <>
            <ul>
                <li>
                    <Search />
                </li>
                <li><Link to="#">Sell your art</Link></li>
                <li><Link to="/account">My Account</Link>
                    <ul className="sub-menu">
                        <li><Link to="#login" onClick={e => {
            logout()
            e.preventDefault()
          }}>Logout</Link></li>
                    </ul>
                </li>
                
                <li>
                    <Link to="#"> <StaticImage alt="" src="../images/heart_icon.png" /></Link>
                </li>
                <li>
                    <Link to="#"><StaticImage alt="" src="../images/cart_icon.png" /></Link>
                </li>
            </ul>
        </>
    )
}
export default AccountMenu;
import React, {useState} from "react"
import { Link } from "gatsby"
import { StaticImage } from "gatsby-plugin-image"
import { logout } from "src/hooks/UserAuth"
import Search from "src/components/Search"
const AccountMenu = () => {
    const [toggle, setToggle] = useState('0')
    return (
        <>
            <ul>
                <li>
                    <Search />
                </li>
                <li>
                    <div className="profile">
                        <Link className="account_profile" to="#" onClick={() => {toggle === '0' ? setToggle('1') : setToggle('0')}}>
                            <StaticImage src="../images/rb-default-avatar.png" alt="" />
                        </Link>
                        <div className={`account_category ${toggle === '0' ? 'closed' :  'opened' }`}>
                            <Link to="#" className="account_category_profile">
                                <div className="account_profile" onClick={() => {toggle === '0' ? setToggle('1') : setToggle('0')}}>
                                    <StaticImage src="../images/rb-default-avatar.png" alt="" />
                                    <span>Avology</span>
                                </div>
                            </Link>
                            <Link to="/account">Dashboard</Link>
                            <Link to="#">View Shop</Link>
                            <Link to="#">Activity Feed</Link>
                            <Link to="#">Manage Portfolio</Link>
                            <span className="new_work"><Link to="#">Add New Work</Link></span>
                            <span className="order_history">
                                <Link to="#">Order History</Link>
                                <Link to="#">BubbleMail</Link>
                                <Link to="account-details.html">Account Settings</Link>
                            </span>
                            <Link to="#">RB Blog</Link>
                            <Link to="#login" className="account_logout" onClick={e => {
                                logout()
                                e.preventDefault()
                            }}>Logout</Link>
                        </div>
                    </div>
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
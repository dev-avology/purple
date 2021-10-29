import React, {useState} from "react"
import { Link } from "gatsby"
import { StaticImage } from "gatsby-plugin-image"
import { logout,isAuthenticated, getProfile } from "src/hooks/UserAuth"
import Search from "src/components/Search"
const AccountMenu = () => {
    const [toggle, setToggle] = useState('0')

    const [userData, setuserData] = React.useState([]);

React.useEffect(() => {
    if(isAuthenticated){
        getProfile()
        .then(result => {
            setuserData(result.data);
        })
        .catch(error => {
            // Handle/report error
        })
    }
  }, []);
    return (
        <>
            <ul>
                <li>
                    <Search />
                </li>
                <li>
                    <div key={userData.id} className="profile">
                        <Link className="account_profile" to="#" onClick={(e) => { e.preventDefault(); toggle === '0' ? setToggle('1') : setToggle('0')}}>
                        {userData.user_avatar ? (<img src={userData.user_avatar} alt="" />): (<StaticImage src="../images/rb-default-avatar.png" alt="" />)}
                        </Link>
                        <div className={`account_category ${toggle === '0' ? 'closed' :  'opened' }`}>
                            <Link to="#" className="account_category_profile">
                                <div className="account_profile" onClick={(e) => { e.preventDefault(); toggle === '0' ? setToggle('1') : setToggle('0')}}>
                                {userData.user_avatar ? (<img src={userData.user_avatar} alt="" />): (<StaticImage src="../images/rb-default-avatar.png" alt="" />)}
                                    <span>{userData.display_name === 'username' ? (userData.name) : (userData.first_name +' '+userData.last_name)}</span>
                                </div>
                            </Link>
                            <Link to="/dashboard">Dashboard</Link>
                            <Link to="#">View Shop</Link>
                            <Link to="#">Activity Feed</Link>
                            <Link to="#">Manage Portfolio</Link>
                            <span className="new_work"><Link to="/add-new-work">Add New Work</Link></span>
                            <span className="order_history">
                                <Link to="#">Order History</Link>
                                <Link to="#">BubbleMail</Link>
                                <Link to="/account">Account Settings</Link>
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
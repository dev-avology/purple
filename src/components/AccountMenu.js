import React, {useState, useEffect} from "react"
import { useDispatch, useSelector,connect } from "react-redux";
import { Link } from "react-router-dom"
import { logout, getProfileFetch } from "../actions/auth"
import UserService from "../services/user.service"
import ImagePlaceholder from "../assets/images/rb-default-avatar.png"
import HeartIcon from "../assets/images/heart_icon.png"
import CartIcon from "../assets/images/cart_icon.png"
function AccountMenu ({currentUser}) {
    const [toggle, setToggle] = useState('0')
    const dispatch = useDispatch();
    const logOut = () => {
        dispatch(logout());
        window.location.href="/login"
      };
      useEffect(() => {
        dispatch(getProfileFetch())
      }, [dispatch])
      
    return (
        <>
            <ul>
                <li>

                </li>
                <li>
                    <div className="profile">
                    <Link className="account_profile" to="#" onClick={(e) => { e.preventDefault(); toggle === '0' ? setToggle('1') : setToggle('0')}}>
                        {currentUser.user_avatar ? (<img src={currentUser.user_avatar} alt="" />): (<img src={ImagePlaceholder} alt="" />)}
                        </Link>
                        <div className={`account_category ${toggle === '0' ? 'closed' :  'opened' }`}>
                        <Link to="#" className="account_category_profile">
                                <div className="account_profile" onClick={(e) => { e.preventDefault(); toggle === '0' ? setToggle('1') : setToggle('0')}}>
                                {currentUser.user_avatar ? (<img src={currentUser.user_avatar} alt="" />): (<img src={ImagePlaceholder} alt="" />)}
                                    <span>{currentUser.display_name ? (currentUser.display_name === 'username' ? (currentUser.name) : (currentUser.first_name +' '+currentUser.last_name)):(currentUser.name)}</span>
                                </div>
                            </Link>
                            <Link to="/dashboard">Dashboard</Link>
                            <Link to="#">View Shop</Link>
                            <Link to="#">Activity Feed</Link>
                            <Link to="#">Manage Portfolio</Link>
                            <span className="new_work"><Link to="/add-new-work">Add New Work</Link></span>
                            <span className="order_history">
                                <Link to="#">Order History</Link>
                                <Link to="/account">Account Settings</Link>
                            </span>
                            <Link to="#">RB Blog</Link>
                            <Link to="#login" className="account_logout" onClick={logOut}>Logout</Link>
                        </div>
                    </div>
                </li>                
                <li>
                    <Link to="/wishlist"> <img alt="" src={HeartIcon} /></Link>
                </li>
                <li>
                    <a href='http://146.190.226.38/backend-services/cart'><img alt="" src={CartIcon} /></a>
                </li>
            </ul>
        </>
    )
}
const mapStateToProps = state => ({
    currentUser: state.currentUser.currentUser,
  }) 
export default connect(mapStateToProps)(AccountMenu)
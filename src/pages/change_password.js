import React, {Component} from "react"
import { Helmet } from 'react-helmet';
import Layout from "src/components/Layout"
import { login, isAuthenticated } from "src/hooks/UserAuth"
import { Newsletter } from "src/components/NewsletterForm"
import { Link } from "gatsby"
export default class ChangepPassword extends Component {
    componentDidMount() {
        document.body.classList.add('signup_body');
    }
    componentWillUnmount() {
        document.body.classList.remove('signup_body');
    }
  
  constructor(props) {
    super(props);
  }

    render(){
        if (!isAuthenticated()) {
            login()
            return null
        }
        return(
            <Layout>
                <Helmet>
                    <title>Change Password | Splashen</title>
                </Helmet>
                <div className="account_details_sec payment-details_sec">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-4">
                                <div className="account_details_nav">
                                    <h3>ARTIST TOOLS</h3>
                                    <ul>
                                        <li><Link to="/dashboard">Dashboard</Link></li>
                                    </ul>
                                    <h3>ACCOUNT SETTINGS</h3>
                                    <ul>
                                        <li><Link to="/account">Edit Profile</Link></li>
                                        <li><Link to="#">Edit Payment Details <span>!</span></Link></li>
                                        <li className="active"><Link to="/Password">Change Password</Link></li>
                                        <li><Link to="#">Cancel Account</Link></li>
                                    </ul>
                                    
                                </div>
                            </div>
                            <div className="col-lg-8">
                                <div className="account_details">
                                    <div className="profile_form">
                                        <h2>Change Your Password</h2>
                                        <div className="edit_profile_form">
                                            <h3>Give Yourself a Shiny New Password</h3>
                                            <form>
                                                <div className="row">
                                                    <div className="col-lg-12">
                                                        <label>Current Password</label>
                                                        <input type="text" className="form-control" placeholder="" />
                                                    </div>
                                                    <div className="col-lg-12">
                                                        <label>New Password</label>
                                                        <input type="text" className="form-control" placeholder=""/>
                                                    </div>
                                                </div>
                                            </form>
                                            <p>Password Strength: Empty</p>
                                        </div>
                                    </div>
                                    <button className="submit_btn" type="submit" form="form1" value="Submit">Change Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <Newsletter />
            </Layout>
        )
    } 
}
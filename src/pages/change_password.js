import React, {Component} from "react"
import { Helmet } from 'react-helmet';
import Layout from "src/components/Layout"
import { login, isAuthenticated, CurrentUserToken } from "src/hooks/UserAuth"
import { Newsletter } from "src/components/NewsletterForm"
import { Link } from "gatsby"
import axios from "axios"
import swal from 'sweetalert'
export default class ChangepPassword extends Component {
    componentDidMount() {
        document.body.classList.add('signup_body');
    }
    componentWillUnmount() {
        document.body.classList.remove('signup_body');
    }
  
  constructor(props) {
    super(props)
    this.state = {
        isLoading: false,
        current_pass: "",
        new_pass: "",
        cpError: "",
        npError: ""
    }
  }

  onChangehandler = (e) => {
    let name = e.target.name;
    let value = e.target.value;
    let data = {};
    data[name] = value;
    this.setState(data);
  }

  onSubmitHandler = (e) => {
    e.preventDefault()
    if (this.validateForm()) {
        
        let token = CurrentUserToken()
        token = JSON.parse(token)
        
        this.setState({ isLoading: true })
        axios
      .post(process.env.GATSBY_API_URL+"/api/change-password", {
        current_password: this.state.current_pass,
        new_password: this.state.new_pass,
      },
      {
        headers: {
            Accept: 'application/json',
            Authorization: 'Bearer '+token.token
        }
    })
      .then((response) => {
        this.setState({ isLoading: false })

        if (response.status === 200) {
        swal({
            title: "Saved",
            text: response.data.message,
            icon: "success",
            timer: 2000,
            button: false
          })
        }else if(response.status === 'error') {
            swal({
                title: "Error",
                text: response.data.message,
                icon: "error",
                timer: 2000,
                button: false
              })
        }
      })
      .catch((error) => {
        this.setState({ isLoading: false });
        if(error.response.status === 401){
            //redirect to login
            swal({
                title: error.response.data.message,
                text: "",
                icon: "error",
                timer: 2000,
                button: false
              })
        }
      })
      
    }
  }

  validateForm() {
    let formIsValid = true
    if (!this.state.current_pass) {
        formIsValid = false
        this.setState({
            cpError: "*Please enter your current password.",
        });
        setTimeout(() => {
          this.setState({ cpError: "" })
        }, 2000);
      }
    
    if (!this.state.new_pass) {
        formIsValid = false;
        this.setState({
            npError: "*Please enter your new password.",
        });
        setTimeout(() => {
          this.setState({ npError: "" })
        }, 2000);
      }
  
      if (typeof this.state.new_pass !== "undefined") {
        if (!this.state.new_pass.match(/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).*$/)) {
          formIsValid = false;
          //errors["password"] = "*Please enter secure and strong password.";
          this.setState({
            npError: "*Please enter secure and strong password.",
            });
            setTimeout(() => {
              this.setState({ npError: "" })
            }, 2000);
        }
      }
      return formIsValid
  }

    render(){
        if (!isAuthenticated()) {
            login()
            return null
        }
        const isLoading = this.state.isLoading
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
                                                        <input type="password" className="form-control" placeholder="" name="current_pass" value={this.state.current_pass}
                                                onChange={this.onChangehandler}/>
                                                    <span className="text-danger">{this.state.cpError}</span>
                                                    </div>
                                                    <div className="col-lg-12">
                                                        <label>New Password</label>
                                                        <input type="password" className="form-control" placeholder="" name="new_pass" value={this.state.new_pass}
                                                onChange={this.onChangehandler}/>
                                                    <span className="text-danger">{this.state.npError}</span>
                                                    </div>
                                                </div>
                                            </form>
                                            <p>Password Strength: Empty</p>
                                        </div>
                                    </div>
                                    <button className="submit_btn" type="submit" form="form1" value="Submit"onClick={this.onSubmitHandler}>
                                           Change Password {isLoading ? (
                                            <span
                                                className="spinner-border spinner-border-sm ml-5"
                                                role="status"
                                                aria-hidden="true"
                                            ></span>
                                            ) : (
                                            <span></span>
                                            )}</button>
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
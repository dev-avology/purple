import React, { Component } from 'react'
import { Button, Form, Row, FormGroup, Label, Input } from "reactstrap";
import { account, isAuthenticated } from "src/hooks/UserAuth"
import axios from "axios";
import { Helmet } from 'react-helmet';
import { Link } from "gatsby"

export default class Signin extends Component {
  componentDidMount() {
      document.body.classList.add('signup_body');
  }
  componentWillUnmount() {
      document.body.classList.remove('signup_body');
  }

constructor(props) {
  super(props);
  this.state = {
    email: "",
    password: "",
    msg: "",
    isLoading: false,
    redirect: false,
    errMsgEmail: "",
    errMsgPwd: "",
    errMsg: "",
  };
}
onChangehandler = (e) => {
  let name = e.target.name;
  let value = e.target.value;
  let data = {};
  data[name] = value;
  this.setState(data);
};

onSignInHandler = () => {
  if (this.validateForm()) {
  this.setState({ isLoading: true });
  axios
    .post(process.env.GATSBY_API_URL+"/api/login", {
      email: this.state.email,
      password: this.state.password,
    })
    .then((response) => {
      this.setState({ isLoading: false });
      if (response.status === 200) {
          localStorage.setItem("isLoggedIn", true);
          localStorage.setItem("userData", JSON.stringify(response.data));
        this.setState({
          msg: response.data.message,
          redirect: true,
        });
       
      }
      if (
        response.data.status === "failed" &&
        response.data.success === undefined
      ) {
        this.setState({
          errMsgEmail: response.data.validation_error.email,
          errMsgPwd: response.data.validation_error.password,
        });
        setTimeout(() => {
          this.setState({ errMsgEmail: "", errMsgPwd: "" });
        }, 2000);
      } else if (
        response.data.status === "failed" &&
        response.data.success === false
      ) {
        this.setState({
          errMsg: response.data.message,
        });
        setTimeout(() => {
          this.setState({ errMsg: "" });
        }, 2000);
      }
    })
    .catch((error) => {
      console.log(error.response.status);
      if(error.response.status === 401){
          //redirect to login
          this.setState({ isLoading: false });
          this.setState({
              errMsg: 'Please check your email & password.',
            });
            setTimeout(() => {
              this.setState({ errMsg: "" });
            }, 2000);
      }

    });
  }
};


validateForm() {
  let formIsValid = true;
  if (!this.state.email) {
    formIsValid = false;
    //errors["email"] = "*Please enter your email-ID.";
    this.setState({
      errMsgEmail: "*Please enter your email.",
    });
    setTimeout(() => {
      this.setState({ errMsgEmail: "" });
    }, 2000);
  }

  if (typeof this.state.email !== "undefined") {
    //regular expression for email validation
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    if (!pattern.test(this.state.email)) {
      formIsValid = false;
      //errors["email"] = "Please enter valid email.";
      this.setState({
          errMsgEmail: "Please enter valid email.",
        });
        setTimeout(() => {
          this.setState({ errMsgEmail: "" });
        }, 2000);
    }
  }
  if (!this.state.password) {
    formIsValid = false;
    this.setState({
      errMsgPwd: "*Please enter your password.",
    });
    setTimeout(() => {
      this.setState({ errMsgPwd: "" });
    }, 2000);
  }
/*
  if (typeof this.state.password !== "undefined") {
    if (!this.state.password.match(/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).*$/)) {
      formIsValid = false;
      //errors["password"] = "*Please enter secure and strong password.";
      this.setState({
          errMsgPwd: "*Please enter secure and strong password.",
        });
        setTimeout(() => {
          this.setState({ errMsgPwd: "" });
        }, 2000);
    }
  }*/

  return formIsValid;

}

render() {
  const isLoading = this.state.isLoading;
  if (isAuthenticated()) {
    account()
    return <p>Redirecting to Account...</p>
  }

  return (
    <>
     <div className="signup_sec">
        <Helmet>
            <title>Sign In</title>
        </Helmet>
        <div className="container">
            <div className="row">
                <div className="col-lg-6 offset-lg-3">
                    <div className="signup">
                        <h2>Log In</h2>
                        <p>Need an account? <Link to="/signup">SignUp</Link></p>
                        <div className="signup_form_tab">
                            <div className="signup_form">
                                <Form className="containers" autoComplete="off">
                                    <Row>
                                        <div className="col-lg-12">
                                            <FormGroup>
                                                <Label for="email">Email id</Label>
                                                <Input
                                                type="email"
                                                name="email"
                                                placeholder="Enter email"
                                                value={this.state.email}
                                                onChange={this.onChangehandler}
                                                />
                                                <span className="text-danger">{this.state.msg}</span>
                                                <span className="text-danger">{this.state.errMsgEmail}</span>
                                            </FormGroup>
                                        </div>
                                        <div className="col-lg-12">
                                            <FormGroup>
                                                <Label for="password">Password</Label>
                                                <Input
                                                type="password"
                                                name="password"
                                                placeholder="Enter password"
                                                value={this.state.password}
                                                onChange={this.onChangehandler}
                                                autoComplete="off" />
                                                <span className="text-danger">{this.state.errMsgPwd}</span>
                                            </FormGroup>
                                        </div>
                                        <div className="col-lg-12">
                                            <div className="lost_password">
                                                <Label className="custom_checkbox">Remember Me
                                                    <Input type="checkbox" />
                                                    <span className="checkmark"></span>
                                                </Label>
                                                <p><a href="#">Lost Password?</a></p>
                                            </div>
                                        </div>
                                        <div className="col-lg-12">
                                            <p className="text-danger">{this.state.errMsg}</p>
                                            <Button
                                                className="signup_btn"
                                                color="success"
                                                onClick={this.onSignInHandler}
                                            >
                                                Sign In
                                                {isLoading ? (
                                                <span
                                                    className="spinner-border spinner-border-sm ml-5"
                                                    role="status"
                                                    aria-hidden="true"
                                                ></span>
                                                ) : (
                                                <span></span>
                                                )}
                                            </Button>
                                        </div>
                                        <div className="col-lg-12">
                                            <div className="signup_form_text text-center">
                                                <p>This site is protected by reCAPTCHA and the Google <a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a> apply.</p>
                                            </div>
                                        </div>
                                    </Row>
                                    
                                </Form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </>
  )
}
}
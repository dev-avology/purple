import React, { useState, useRef } from "react";
import { useDispatch, useSelector } from "react-redux";
import { Navigate, Link } from "react-router-dom";
import { Layout } from "./Layout";
import Helmet from "react-helmet";

import Form from "react-validation/build/form";
import Input from "react-validation/build/input";
import CheckButton from "react-validation/build/button";

import { isEmail } from "validator";

import { login } from "../actions/auth";

const required = (value) => {
  if (!value) {
    return (
      <div className="alert alert-danger" role="alert">
        This field is required!
      </div>
    );
  }
};

const email = (value) => {
  if (!isEmail(value)) {
    return (
      <div className="alert alert-danger" role="alert">
        This is not a valid email.
      </div>
    );
  }
};

const Login = (props) => {
  const form = useRef();
  const checkBtn = useRef();

  const [Email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [loading, setLoading] = useState(false);

  const { isLoggedIn } = useSelector((state) => state.auth);
  const { message } = useSelector((state) => state.message);

  const dispatch = useDispatch();

  const onChangeEmail = (e) => {
    const Email = e.target.value;
    setEmail(Email);
  };

  const onChangePassword = (e) => {
    const password = e.target.value;
    setPassword(password);
  };

  const handleLogin = (e) => {
    e.preventDefault();

    setLoading(true);

    form.current.validateAll();

    if (checkBtn.current.context._errors.length === 0) {
      dispatch(login(Email, password))
        .then(() => {
          //props.history.push("/dashboard")
          window.location.href = "http://146.190.226.38/";
        })
        .catch(() => {
          setLoading(false);
        });
    } else {
      setLoading(false);
    }
  };

  if (isLoggedIn) {
    return <Navigate to={`${process.env.PUBLIC_URL}/`} />;
  }

  return (
    <Layout>
      <Helmet>
        <title>Sign In | Splashen</title>
      </Helmet>
      <div className="signup_sec">
        <div className="container">
          <div className="row">
            <div className="col-lg-6 offset-lg-3">
              <div className="signup">
                <h2>Log In</h2>
                <p>
                  Need an account? <Link to="/signup">SignUp</Link>
                </p>
                <div className="signup_form_tab">
                  <div className="signup_form">
                    <Form onSubmit={handleLogin} ref={form}>
                      <div className="form-group">
                        <label htmlFor="email">Email</label>
                        <Input
                          type="text"
                          className="form-control"
                          name="email"
                          value={Email}
                          placeholder="Enter Email"
                          onChange={onChangeEmail}
                          validations={[required, email]}
                        />
                      </div>

                      <div className="form-group">
                        <label htmlFor="password">Password</label>
                        <Input
                          type="password"
                          className="form-control"
                          name="password"
                          placeholder="Enter Password"
                          autoComplete="no"
                          value={password}
                          onChange={onChangePassword}
                          validations={[required]}
                        />
                      </div>
                      <div className="col-lg-12">
                        <div className="lost_password">
                          <p>
                            <a href="#">Lost Password?</a>
                          </p>
                        </div>
                      </div>
                      <div className="form-group">
                        <button
                          className="btn btn-primary btn-block signup_btn"
                          disabled={loading}
                        >
                          <span>Sign In </span>
                          {loading && (
                            <span className="spinner-border spinner-border-sm"></span>
                          )}
                        </button>
                      </div>

                      {message && (
                        <div className="form-group">
                          <div className="alert alert-danger" role="alert">
                            {message}
                          </div>
                        </div>
                      )}
                      <div className="col-lg-12">
                        <div className="signup_form_text text-center">
                          <p>
                            This site is protected by reCAPTCHA and the Google{" "}
                            <Link to="#">Privacy Policy</Link> and{" "}
                            <Link to="#">Terms of Service</Link> apply.
                          </p>
                        </div>
                      </div>

                      <CheckButton style={{ display: "none" }} ref={checkBtn} />
                    </Form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Layout>
  );
};

export default Login;

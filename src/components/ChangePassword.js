import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import { Helmet } from "react-helmet";
import { Layout } from "./Layout";
import { Newsletter } from "./NewsletterForm";
import Loader from "./Loader";
import UserService from "../services/user.service";
import Form from "react-validation/build/form";
import swal from "sweetalert";
import Input from "react-validation/build/input";
import CheckButton from "react-validation/build/button";

const required = (value) => {
  if (!value) {
    return (
      <div className="alert alert-danger" role="alert">
        This field is required!
      </div>
    );
  }
};

const vpassword = (value) => {
  if (value.length < 6 || value.length > 40) {
    return (
      <div className="alert alert-danger" role="alert">
        The password must be between 6 and 40 characters.
      </div>
    );
  }
};

const ChangePassword = () => {
  const form = React.useRef();
  const checkBtn = React.useRef();
  const [loading, setLoading] = useState(false);
  const [CurrentPass, setCurrentPass] = useState(false);
  const [NewPass, setNewPass] = useState(false);

  const onChangePassword = (e) => {
    e.preventDefault();
    setLoading(true);
    form.current.validateAll();
    if (checkBtn.current.context._errors.length === 0) {
        const data = {
            current_password: CurrentPass,
            new_password: NewPass,
        };
          UserService.ChangePassword(data)
            .then((response) => {
                setLoading(false);
              swal({
                title: "Password Changed!",
                text: response.data.message,
                icon: "success",
                button: "Ok!",
              }).then((value) => {
                window.location.reload();
              });
            })
            .catch((error) => {
              const _CoverError =
                (error.response &&
                  error.response.data &&
                  error.response.data.message) ||
                error.message ||
                error.toString();
                setLoading(false);
              swal({
                title: "Error!",
                text: _CoverError,
                icon: "error",
                button: "Ok!",
              });
            });
    }
  };
  return (
    <Layout>
      <Helmet>
        <title>Change Password | Splashen</title>
      </Helmet>
      {loading ? <Loader /> : null}
      <div className="account_details_sec payment-details_sec">
        <div className="container">
          <div className="row">
            <div className="col-lg-4">
              <div className="account_details_nav">
                <h3>ARTIST TOOLS</h3>
                <ul>
                  <li>
                    <Link to="/dashboard">Dashboard</Link>
                  </li>
                </ul>
                <h3>ACCOUNT SETTINGS</h3>
                <ul>
                  <li>
                    <Link to="/account">Edit Profile</Link>
                  </li>
                  <li>
                    <Link to="#">
                      Edit Payment Details <span>!</span>
                    </Link>
                  </li>
                  <li className="active">
                    <Link to="/Password">Change Password</Link>
                  </li>
                  <li>
                    <Link to="#">Cancel Account</Link>
                  </li>
                </ul>
              </div>
            </div>
            <div className="col-lg-8">
              <div className="account_details">
                <Form ref={form}>
                  <div className="profile_form">
                    <h2>Change Your Password</h2>
                    <div className="edit_profile_form">
                      <h3>Give Yourself a Shiny New Password</h3>

                      <div className="row">
                        <div className="col-lg-12">
                          <label>Current Password</label>
                          <Input
                            type="password"
                            className="form-control"
                            placeholder=""
                            name="current_pass"
                            validations={[required]}
                          />
                        </div>
                        <div className="col-lg-12">
                          <label>New Password</label>
                          <Input
                            type="password"
                            className="form-control"
                            placeholder=""
                            validations={[required, vpassword]}
                            name="new_pass"
                          />
                        </div>
                      </div>
                      <p>Password Strength: Empty</p>
                    </div>
                  </div>
                  <button
                    className="submit_btn"
                    type="submit"
                    form="form1"
                    value="Submit"
                    onClick={onChangePassword}
                  >
                    Change Password
                  </button>
                  <CheckButton style={{ display: "none" }} ref={checkBtn} />
                </Form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <Newsletter />
    </Layout>
  );
};

export default ChangePassword;

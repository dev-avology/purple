import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import Helmet from "react-helmet";
import { Layout } from "./Layout";
import UserService from "../services/user.service";
import PlaceholderImage from "../assets/images/rb-default-avatar.png";
import swal from "sweetalert";
import Loader from "./Loader";
import { useDispatch,connect } from "react-redux";
import {getProfileFetch} from "../actions/auth"

import Form from "react-validation/build/form";
import Input from "react-validation/build/input";

const required = (value) => {
    if (!value) {
      return (
        <div className="alert alert-danger" role="alert">
          This field is required!
        </div>
      );
    }
  };

function Account ({currentUser}) {

  const [Avatar, setAvatar] = useState("");
  const [Cover, setCover] = useState("");
  const [DisplayName, setDisplayName] = useState("");
  const [CoverLoading, setCoverLoading] = useState(false);
  const [AvatarLoading, setAvatarLoading] = useState(false);
  const [loading, setLoading] = useState(false);

  const [FirstName, setFirstName] = useState("");
  const [LastName, setLastName] = useState("");
  const [Bio, setBio] = useState("");
  const dispatch = useDispatch();

  const onChangeFirstName = (e) => {
    const FirstName = e.target.value;
    setFirstName(FirstName);
  };
  
  const onChangeLastName = (e) => {
    const LastName = e.target.value;
    setLastName(LastName);
  };
  
  const onChangeBio = (e) => {
    const Bio = e.target.value;
    setBio(Bio);
  };

  const onChangeAvatar = (e) => {
    const Avatar = e.target.files[0];
    setAvatar(Avatar);
  };

  const onChangeCover = (e) => {
    const Cover = e.target.files[0];
    setCover(Cover);
  };

  const onDisplayName = (e) => {
    const displayName = e.target.value;
    setDisplayName(displayName);
  };

  const onAvatarUpload = (e) => {
    e.preventDefault();
    setAvatarLoading(true);
    if (Avatar) {
      const data = new FormData();
      data.append("user_avatar", Avatar);
      UserService.UpdateProfileData(data)
        .then((response) => {
          setAvatarLoading(false);
          swal({
            title: "Updated!",
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
          setAvatarLoading(false);
          swal({
            title: "Error!",
            text: _CoverError,
            icon: "error",
            button: "Ok!",
          });
        });
    } else {
      setAvatarLoading(false);
    }
  };

  const onCoverUpload = (e) => {
    e.preventDefault();
    setCoverLoading(true);
    if (Cover) {
      const data = new FormData();
      data.append("cover_image", Cover);
      UserService.UpdateProfileData(data)
        .then((response) => {
          setCoverLoading(false);
          swal({
            title: "Updated!",
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
          setCoverLoading(false);
          swal({
            title: "Error!",
            text: _CoverError,
            icon: "error",
            button: "Ok!",
          });
        });
    } else {
      setCoverLoading(false);
    }
  };

  const onSaveDetails = (e) => {
    e.preventDefault();
    setLoading(true);
      const data = new FormData();
      data.append("first_name", FirstName);
      data.append("last_name", LastName);
      data.append("display_name", DisplayName);
      data.append("bio", Bio);
      UserService.UpdateProfileData(data)
        .then((response) => {
          setLoading(false);
          swal({
            title: "Updated!",
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
  };

  useEffect(() => {
    dispatch(getProfileFetch())
  }, [dispatch])

  
  return (
    <Layout>
      <Helmet>
        <title>Account Details | Splashen</title>
      </Helmet>
      {loading ? <Loader /> : null}
      <div className="account_details_sec">
        <div className="container">
          <div className="row">
            <div className="col-lg-4">
              <div className="account_details_nav">
                <h3>ARTIST TOOLS</h3>
                <ul>
                  <li>
                    <Link to={`${process.env.PUBLIC_URL}/dashboard`}>Dashboard</Link>
                  </li>
                </ul>
                <h3>ACCOUNT SETTINGS</h3>
                <ul>
                  <li className="active">
                    <Link to={`${process.env.PUBLIC_URL}/account`}>Edit Profile</Link>
                  </li>
                  <li>
                    <Link to="#">
                      Edit Payment Details <span>!</span>
                    </Link>
                  </li>
                  <li>
                    <Link to="#">Change Password</Link>
                  </li>
                  <li>
                    <Link to="#">Cancel Account</Link>
                  </li>
                </ul>
              </div>
            </div>
            <div className="col-lg-8">
              <div className="account_details">
                <div className="account_edit_profile">
                  <h2>Avatar</h2>
                  <div className="edit_profile">
                    <div className="account_profile">
                      {currentUser.user_avatar ? (
                        <img src={currentUser.user_avatar} alt="" />
                      ) : (
                        <img src={PlaceholderImage} alt="" />
                      )}
                    </div>
                    <label className="edit_profile-upload">
                      <span>Choose image</span>
                      <input
                        type="file"
                        id="avatar"
                        onChange={onChangeAvatar}
                      />
                    </label>
                    <div className="upload_btn">
                      <button
                        className="upload"
                        onClick={onAvatarUpload}
                        disabled={AvatarLoading}
                      >
                        Upload{" "}
                        {AvatarLoading && (
                          <span className="spinner-border spinner-border-sm"></span>
                        )}
                      </button>
                    </div>
                  </div>
                  <p>
                    You can inject a little more personality into your profile
                    and help people recognize you across Redbubble by uploading
                    an avatar (an image, photo or other graphic icon of "you").
                  </p>
                </div>
                <div className="cover_image">
                  <h2>Cover image</h2>
                  <div className="edit_profile">
                    {currentUser.cover_image ? (
                      <div className="cover_image_inner">
                        <img src={currentUser.cover_image} alt="" />
                      </div>
                    ) : null}
                    <label className="edit_profile-upload">
                      <span>Choose image</span>
                      <input
                        type="file"
                        id="cover_image"
                        onChange={onChangeCover}
                      />
                    </label>
                    <div className="upload_btn">
                      <button
                        className="upload"
                        onClick={onCoverUpload}
                        disabled={CoverLoading}
                      >
                        Upload{" "}
                        {CoverLoading && (
                          <span className="spinner-border spinner-border-sm"></span>
                        )}
                      </button>
                    </div>
                  </div>
                  <p>
                    Images must be 2400px wide by 600px high and in JPEG or PNG
                    format. See our blog post for tips on designing eye catching
                    cover photos.
                  </p>
                </div>
                <div className="profile_form">
                  <h2>Profile</h2>
                  <div className="edit_profile_form">
                    <Form>
                      <div className="row">
                        <div className="col-lg-6">
                          <label>First Name</label>
                          <Input
                            type="text"
                            name="first_name"
                            className="form-control"
                            value={FirstName}
                            onChange={onChangeFirstName}
                            validations={[required]}
                          />
                        </div>
                        <div className="col-lg-6">
                          <label>Last Name</label>
                          <Input
                            type="text"
                            name="last_name"
                            className="form-control"
                            value={LastName}
                            onChange={onChangeLastName}
                            validations={[required]}
                          />
                        </div>
                        <div className="col-lg-12">
                          <label>Email Address</label>
                          <input
                            type="email"
                            className="form-control"
                            placeholder=""
                            value={currentUser.email ? currentUser.email : ""}
                            disabled
                          />
                        </div>

                        <div className="col-lg-12">
                          <label>Display Name</label>
                          <div className="edit_profile_checkbox">
                            <label
                              className="profile_radiobtn"
                            >
                              Always show my real name
                              <input
                                type="radio"
                                name="display_name"
                                value="real_name" checked={DisplayName === 'real_name' ? true : false}
                                onChange={onDisplayName}
                              />
                              <span className="radiobtn"></span>
                            </label>
                            <label
                              className="profile_radiobtn"
                            >
                              Always show my username (text)
                              <input
                                type="radio"
                                name="display_name"
                                value="username"
                                checked={DisplayName === 'username' ? true : false}
                                onChange={onDisplayName}
                              />
                              <span className="radiobtn"></span>
                            </label>
                          </div>
                        </div>
                        <div className="col-lg-12">
                          <label>Bio</label>
                          <textarea
                            name="bio"
                            className="form-control"
                            placeholder=""
                            onChange={onChangeBio}
                            value={Bio}
                          ></textarea>
                          <p>
                            Tell your customers a little about yourself in 500
                            characters or less.
                          </p>
                        </div>
                      </div>
                    </Form>
                  </div>
                </div>
                <button className="submit_btn" type="submit" onClick={onSaveDetails}>
                  Save Changes
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Layout>
  );
};

const mapStateToProps = state => ({
  currentUser: state.currentUser.currentUser,
}) 
export default connect(mapStateToProps)(Account)

/* eslint-disable react-hooks/rules-of-hooks */
import React, { useEffect } from "react";
import { Navigate, Link } from "react-router-dom";
import Helmet from "react-helmet";
import { Layout } from "./Layout";
import { useDispatch, useSelector, connect } from "react-redux";
import { getProfileFetch } from "../actions/auth";
import { Newsletter } from "./NewsletterForm";
import Image1 from "../assets/images/12d6792e0ad2ffcbebb389c583dcd2e8.svg";
import Image2 from "../assets/images/8fcf5e1a92ba5a97656f93d25149fb0f.svg";
import Image3 from "../assets/images/cec787649b385c78ce2c36a8704f077d.svg";
import { getDesignCount } from "../actions/userActions";

function Dashboard(currentUser, designCount) {
  const { isLoggedIn } = useSelector((state) => state.auth);
  if (!isLoggedIn) {
    return <Navigate to={`${process.env.PUBLIC_URL}/login`} />;
  }

  const CompletedStep = {
    textDecoration: "line-through",
    color: "#865cd0",
  };

  const dispatch = useDispatch();
  useEffect(() => {
    dispatch(getProfileFetch());
  }, [dispatch]);


  useEffect(() => {
    dispatch(getDesignCount());
  }, [dispatch]);

  return (
    <Layout>
      <Helmet>
        <title>Dashboard | Splashen</title>
      </Helmet>
      <div className="dashboard_sec">
        <div className="container">
          <div className="row">
            <div className="col-lg-12">
              <div className="dashboard_text">
                <h3>Dashboard</h3>
                <Link to={`${process.env.PUBLIC_URL}/add-new-work`}>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                    <g
                      fill="none"
                      fillRule="evenodd"
                      stroke="#fff"
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth="1.5"
                      transform="translate(1 1)"
                    >
                      <path d="M15.6521739 12L15.6521739 13.3307826C15.6521739 14.4326957 14.7575652 15.3273043 13.6556522 15.3273043L2.34434783 15.3273043C1.24104348 15.3273043.347826087 14.4326957.347826087 13.3307826L.347826087 12M8.34782609 0L8.34782609 11.901913"></path>
                      <polyline points="3.478 4.87 8.348 0 13.217 4.87"></polyline>
                    </g>
                  </svg>
                  Add new work
                </Link>
              </div>
            </div>
          </div>
          <div className="row">
            <div className="col-lg-12">
              <div className="welcome_splashen">
                <h2>Hey, welcome to Splashen!</h2>
                <p>Let's get your shop ready for customers.</p>
                <div className="row">
                  <div className="col-lg-4">
                    <div className="dashboard_item">
                      <img src={Image1} alt="" />
                      <h3>Create products</h3>
                      <p>
                        Upload your art & choose products. More choices for
                        customers means more chances to sell.
                      </p>
                      <ul>
                        <li>
                          <Link
                            to={`${process.env.PUBLIC_URL}/add-new-work`}
                            style={
                              designCount === 5
                                ? {
                                    textDecoration: "line-through",
                                    color: "#865cd0",
                                  }
                                : {}
                            }
                          >
                            Add designs
                          </Link>{" "}
                          <span>{designCount} / 5</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div className="col-lg-4">
                    <div className="dashboard_item">
                      <img src={Image2} alt="" />
                      <h3>Set up shop</h3>
                      <p>
                        Customize your shop so it's more memorable and engaging.
                        Make it truly unique.
                      </p>
                      <ul>
                        <li>
                          {currentUser.user_avatar ? (
                            <span style={CompletedStep}>Add an avatar</span>
                          ) : (
                            <Link to="/account">Add an avatar</Link>
                          )}
                        </li>
                        <li>
                          {currentUser.cover_image ? (
                            <span style={CompletedStep}>Add a cover image</span>
                          ) : (
                            <Link to="/account">Add a cover image</Link>
                          )}
                        </li>
                        <li>
                          {currentUser.bio ? (
                            <span style={CompletedStep}>Add a bio</span>
                          ) : (
                            <Link to="/account">Add a bio</Link>
                          )}
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div className="col-lg-4">
                    <div className="dashboard_item get_paid">
                      <img src={Image3} alt="" />
                      <h3>Get paid</h3>
                      <p>
                        Confirm your account and payment details to open your
                        shop and get selling.
                      </p>
                      <ul>
                        <li>
                          <Link to="#">Confirm your email</Link>
                        </li>
                        <li>
                          <Link to="#">Add your name & address</Link>
                        </li>
                        <li>
                          <Link to="#">Add payment details</Link>
                        </li>
                      </ul>
                      <h6>
                        When these steps are complete, your shop will be open!
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <Newsletter />
    </Layout>
  );
}

const mapStateToProps = (state) => ({
  currentUser: state.currentUser.currentUser,
  designCount: state.designCount.designCount,
});
export default connect(mapStateToProps)(Dashboard);

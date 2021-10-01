import React, {Component} from "react"
import { Helmet } from 'react-helmet';
import Layout from "src/components/Layout"
import { login, isAuthenticated } from "src/hooks/UserAuth"
import { Newsletter } from "src/components/NewsletterForm"
import { Link } from "gatsby"
import { StaticImage } from "gatsby-plugin-image"
export default class Dashboard extends Component {
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
                    <title>Dashboard | Splashen</title>
                </Helmet>

                <div className="dashboard_sec">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-12">
                                <div className="dashboard_text">
                                    <h3>Dashboard</h3>
                                    <Link to="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                            <g fill="none" fill-rule="evenodd" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" transform="translate(1 1)">
                                                <path
                                                    d="M15.6521739 12L15.6521739 13.3307826C15.6521739 14.4326957 14.7575652 15.3273043 13.6556522 15.3273043L2.34434783 15.3273043C1.24104348 15.3273043.347826087 14.4326957.347826087 13.3307826L.347826087 12M8.34782609 0L8.34782609 11.901913"
                                                ></path>
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
                                                <StaticImage src="../images/12d6792e0ad2ffcbebb389c583dcd2e8.svg" alt="" />
                                                <h3>Create products</h3>
                                                <p>Upload your art & choose products. More choices for customers means more chances to sell.</p>
                                                <ul>
                                                    <li><Link to="add-new-work-step1.html">Add designs</Link> <span>1 / 5</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div className="col-lg-4">
                                            <div className="dashboard_item">
                                                <StaticImage src="../images/8fcf5e1a92ba5a97656f93d25149fb0f.svg" alt="" />
                                                <h3>Set up shop</h3>
                                                <p>Customize your shop so it's more memorable and engaging. Make it truly unique.</p>
                                                <ul>
                                                    <li><Link to="#">Add an avatar</Link></li>
                                                    <li><Link to="#">Add a cover image</Link></li>
                                                    <li><Link to="#">Add a social link</Link></li>
                                                    <li><Link to="#">Add a bio</Link></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div className="col-lg-4">
                                            <div className="dashboard_item get_paid">
                                                <StaticImage src="../images/cec787649b385c78ce2c36a8704f077d.svg" alt=""/>
                                                <h3>Get paid</h3>
                                                <p>Confirm your account and payment details to open your shop and get selling.</p>
                                                <ul>
                                                    <li><Link to="#">Confirm your email</Link></li>
                                                    <li><Link to="#">Add your name & address</Link></li>
                                                    <li><Link to="#">Add payment details</Link></li>
                                                </ul>
                                                <h6>When these steps are complete, your shop will be open!</h6>
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
      )
  }
}
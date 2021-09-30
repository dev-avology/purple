import React, {Component} from "react"
import { Helmet } from 'react-helmet';
import Layout from "src/components/Layout"
import { login, isAuthenticated, getProfile } from "src/hooks/UserAuth"

export default class Account extends Component {

  componentDidMount() {
    getProfile()
    .then(user => {
      this.setState({
        userdata: user.data,
      });
    })
    .catch(error => {
        // Handle/report error
    });
  }

  constructor(props) {
    super(props);
    this.state = {
      userdata: "",
    }
  }

    render() {
  
    if (!isAuthenticated()) {
      login()
      return null
    }
    const Userdata = this.state.userdata
    return (
      <Layout>
         <Helmet>
            <title>Account Details | Splashen</title>
          </Helmet>
        <div className="account_details_sec">
        <div className="container">
        <div className="row">
          <div className="col-lg-4">
            <div className="account_details_nav">
              <h3>ARTIST TOOLS</h3>
              <ul>
              <li><strong>Name</strong> {Userdata.name}</li>
              <li><strong>Email</strong> {Userdata.email}</li>
              <li><strong>Role</strong> {Userdata.role}</li>
              </ul>
            </div>
          </div>

          <div class="col-lg-8">
              <div class="account_details">
                <div class="account_edit_profile">
                  <h2>Avatar</h2>
                </div>
              </div>
          </div>
        </div>
      </div>
      </div>
    </Layout>
    )
  }
}
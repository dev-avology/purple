import React, {Component} from "react"
import { Helmet } from 'react-helmet';
import Layout from "src/components/Layout"
import { login, isAuthenticated, getProfile, CurrentUserToken } from "src/hooks/UserAuth"
import { StaticImage } from "gatsby-plugin-image";
import axios from 'axios';

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
      avatar:"",
      avatarURL:""
    }
    this.FileChange = this.FileChange.bind(this)
    this.CoverFileChange = this.CoverFileChange.bind(this)
  }

  FileChange (event) {
    this.setState({
      avatarURL: URL.createObjectURL(event.target.files[0])
    })
    this.setState({ avatar: event.target.files[0] });
  }

  CoverFileChange (event) {
    this.setState({
      coverURL: URL.createObjectURL(event.target.files[0])
    })
    this.setState({ cover: event.target.files[0] });
  }

    onAvtarUpload = (e) => {
      const data = new FormData() 
      data.append('user_avatar', this.state.avatar)

      let token = CurrentUserToken()
        token = JSON.parse(token)

        axios.post(process.env.GATSBY_API_URL+"/api/save-user-profile", 
            data,
            {
                headers: {
                    "Content-Type": "multipart/form-data",
                    Accept: 'application/json',
                    Authorization: 'Bearer '+token.token
            },
            onUploadProgress: function(progressEvent) {
              var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total)
              console.log(percentCompleted)
            }
        })
        .then((response) => {
        this.setState({ isLoading: false });
        if (response.status === 200) {
            console.log(response)
            this.setState({
                successMsg: response.data.message
              });
              setTimeout(() => {
                this.setState({ successMsg: "" });
              }, 3000);
        }
        })
        .catch((error) => {
            this.setState({ isLoading: false });
        if(error.response.status === 401){
            console.log(error)
        }

        });

    }

    onCoverUpload = (e) => {
      const data = new FormData() 
      data.append('cover_image', this.state.avatar)

      let token = CurrentUserToken()
        token = JSON.parse(token)

        axios.post(process.env.GATSBY_API_URL+"/api/save-user-profile", 
            data,
            {
                headers: {
                    "Content-Type": "multipart/form-data",
                    Accept: 'application/json',
                    Authorization: 'Bearer '+token.token
            },
            onUploadProgress: function(progressEvent) {
              var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total)
              console.log(percentCompleted)
            }
        })
        .then((response) => {
        this.setState({ isLoading: false });
        if (response.status === 200) {
            console.log(response)
            this.setState({
                successMsg: response.data.message
              });
              setTimeout(() => {
                this.setState({ successMsg: "" });
              }, 3000);
        }
        })
        .catch((error) => {
            this.setState({ isLoading: false });
        if(error.response.status === 401){
            console.log(error)
        }

        });

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
                  <div class="edit_profile">
                    <div class="account_profile">
                      {this.state.avatarURL ? ( <img src={this.state.avatarURL} alt="" /> ) : ( <StaticImage src="../images/rb-default-avatar.png" alt="" /> )}
                    </div>
                    <label class="edit_profile-upload"> <span>Choose image</span>
                      <input type="file" onChange={this.FileChange}/>
                    </label>
                    <div class="upload_btn">
                    <button class="upload" onClick={this.onAvtarUpload}>Upload</button>
                    </div>
                  </div>
                  <p>You can inject a little more personality into your profile and help people recognize you across Redbubble by uploading an avatar (an image, photo or other graphic icon of "you").</p>
                </div>

                <div class="cover_image">
								<h2>Cover image</h2>
								<div class="edit_profile">
									<label class="edit_profile-upload" onChange={this.CoverFileChange}> <span>Choose image</span>
										<input type="file" />
									</label>
									<div class="upload_btn">
									<button class="upload" onClick={this.onCoverUpload}>Upload</button>
									</div>
								</div>
								<p>Images must be 2400px wide by 600px high and in JPEG or PNG format. See our blog post for tips on designing eye catching cover photos.</p>
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
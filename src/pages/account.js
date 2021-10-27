import React, {Component} from "react"
import { Helmet } from 'react-helmet'
import { Link } from "gatsby"
import Layout from "src/components/Layout"
import { login, isAuthenticated, getProfile, CurrentUserToken } from "src/hooks/UserAuth"
import { StaticImage } from "gatsby-plugin-image"
import axios from 'axios'
import swal from 'sweetalert'

export default class Account extends Component {

  constructor(props) {
    super(props);
    this.state = {
      userdata: "",
      avatar:"",
      avatarURL:"",
      cover:"",
      coverURL:"",
      display_name:"",
      first_name:"",
      last_name:"",
      bio:"",
      errMsgFirstName:"",
      errMsgLastName:"",
      isAvatarLoading: false,
      isCoverLoading: false,
      isLoading: false,
    }
    this.getUser = this.getUser.bind(this);
    this.FileChange = this.FileChange.bind(this)
    this.CoverFileChange = this.CoverFileChange.bind(this)
  }
  componentDidMount(){
    this.getUser();
  }

  getUser() {
    if (isAuthenticated()) {
      getProfile()
      .then(user => {
        this.setState({
          userdata: user.data,
        });

        this.setState({
          first_name: user.data.first_name,
          last_name: user.data.last_name,
          display_name: user.data.display_name,
          bio: user.data.bio,
        });
      })
      .catch(error => {
          // Handle/report error
      })
    }
  }

  onChangehandler = (e) => {
    let name = e.target.name
    let value = e.target.value
    let data = {}
    data[name] = value
    this.setState(data)
  }


  FileChange (event) {
    if(event.target.files[0]){
    this.setState({
      avatarURL: URL.createObjectURL(event.target.files[0])
    })
    this.setState({ avatar: event.target.files[0] })
  }else{
    this.setState({
      avatarURL: null
    })
    this.setState({ avatar: null })
  }
  }

  CoverFileChange (event) {
    if(event.target.files[0]){
      this.setState({
        coverURL: URL.createObjectURL(event.target.files[0])
      })
      this.setState({ cover: event.target.files[0] })
    }else{
      this.setState({
        coverURL: null
      })
      this.setState({ cover: null })
    }
  }

    onAvtarUpload = (e) => {
      const data = new FormData()
      if(this.state.avatar){
      data.append('user_avatar', this.state.avatar)
      this.setState({ isAvatarLoading: true })
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
              //var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total)
            }
        })
        .then((response) => {
        this.setState({ isAvatarLoading: false });
        document.getElementById("avatar").value = ""
        this.setState({ avatar: "" })
        if (response.status === 200) {
            swal({
              title: "Uploaded",
              text: response.data.message,
              icon: "success",
              timer: 2000,
              button: false
            })

        }
        })
        .catch((error) => {
            this.setState({ isAvatarLoading: false });
        if(error.response.status === 401){
            //console.log(error.response.data.message)
            swal({
              title: error.response.data.message,
              text: "",
              icon: "error",
              timer: 2000,
              button: false
            })
        }
      
        });

      } else {
        swal({
          title: "No file selected",
          text: "Please select a file!",
          icon: "error",
          timer: 2000,
          button: false
        })
      }
    }

    onCoverUpload = (e) => {
      if(this.state.cover){
      this.setState({ isCoverLoading: true })
      const data = new FormData() 
      data.append('cover_image', this.state.cover)
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
              //var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total)
            }
        })
        .then((response) => {
        document.getElementById("cover_image").value = ""
        this.setState({ cover: "" })
        this.setState({ isCoverLoading: false });
        if (response.status === 200) {
          swal({
            title: "Uploaded",
            text: response.data.message,
            icon: "success",
            timer: 2000,
            button: false
          })

        }
        })
        .catch((error) => {
            this.setState({ isCoverLoading: false });
        if(error.response.status === 401){
           swal({
              title: error.response.data.message,
              text: "",
              icon: "error",
              timer: 2000,
              button: false
            })
        }

        });
      } else {
        swal({
          title: "No file selected",
          text: "Please select a file!",
          icon: "error",
          timer: 2000,
          button: false
        })
      }
    }

    SaveDetails = (e) => {
      if (this.validateForm()) {
        this.setState({ isLoading: true })
          let token = CurrentUserToken()
          token = JSON.parse(token)
          axios
          .post(process.env.GATSBY_API_URL+"/api/save-user-profile", {
            first_name: this.state.first_name,
            last_name: this.state.last_name,
            display_name: this.state.display_name,
            bio: this.state.bio,
          },
          {headers: {
            Accept: 'application/json',
            Authorization: 'Bearer '+token.token
          }})
          .then((response) => {
            this.setState({ isLoading: false })
            if (response.status === 200) {
              swal({
                title: "Changes Saved",
                text: response.data.message,
                icon: "success",
                timer: 2000,
                button: false
              })
            }

          })
          .catch((error) => {
            this.setState({ isLoading: false });
            if(error.response.status === 401){
              swal({
                title: error.response.data.message,
                text: "",
                icon: "error",
                timer: 2000,
                button: false
              })
            }
          });
      }
    }
    validateForm() {
      let formIsValid = true;
      if (!this.state.first_name) {
        formIsValid = false;
        //errors["email"] = "*Please enter your email-ID.";
        this.setState({
          errMsgFirstName: "*Please enter first name.",
        });
        setTimeout(() => {
          this.setState({ errMsgFirstName: "" })
        }, 2000);
      }
      
      if (!this.state.last_name) {
        formIsValid = false;
        //errors["email"] = "*Please enter your email-ID.";
        this.setState({
          errMsgLastName: "*Please enter last name.",
        });
        setTimeout(() => {
          this.setState({ errMsgLastName: "" })
        }, 2000);
      }

      return formIsValid
    }

    render() {
    const isAvatarLoading = this.state.isAvatarLoading;
    const isCoverLoading = this.state.isCoverLoading;
    const isLoading = this.state.isLoading;
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
                  <li><Link to="/dashboard">Dashboard</Link></li>
              </ul>
              <h3>ACCOUNT SETTINGS</h3>
              <ul>
                  <li class="active"><Link href="/account">Edit Profile</Link></li>
                  <li><Link href="#">Edit Payment Details <span>!</span></Link></li>
                  <li><Link href="#">Change Password</Link></li>
                  <li><Link href="#">Cancel Account</Link></li>
              </ul>

            </div>
          </div>

          <div className="col-lg-8">
              <div className="account_details">
                <div className="account_edit_profile">
                  <h2>Avatar</h2>
                  <div className="edit_profile">
                    <div className="account_profile">
                    
                      {this.state.avatarURL ? ( <img src={this.state.avatarURL} alt="" /> ) : ( Userdata.user_avatar ? ( <img src={Userdata.user_avatar} alt="" /> ) : (<StaticImage src="../images/rb-default-avatar.png" alt="" />) )}
                    </div>
                    <label className="edit_profile-upload"> <span>Choose image</span>
                      <input type="file" id="avatar" onChange={this.FileChange}/>
                    </label>
                    <div className="upload_btn">
                    <button className="upload" onClick={this.onAvtarUpload}>Upload {isAvatarLoading ? (
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
                  <p>You can inject a little more personality into your profile and help people recognize you across Redbubble by uploading an avatar (an image, photo or other graphic icon of "you").</p>
                </div>

                <div className="cover_image">
								<h2>Cover image</h2>
								<div className="edit_profile">
                    {Userdata.cover_image ? ( <div className="cover_image_inner"><img src={Userdata.cover_image} alt="" /></div> ) : (null)}
									<label className="edit_profile-upload" onChange={this.CoverFileChange}> <span>Choose image</span>
										<input type="file" id="cover_image" />
									</label>
									<div className="upload_btn">
									<button className="upload" onClick={this.onCoverUpload}>Upload {isCoverLoading ? (
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
								<p>Images must be 2400px wide by 600px high and in JPEG or PNG format. See our blog post for tips on designing eye catching cover photos.</p>
							</div>

              <div className="profile_form">
								<h2>Profile</h2>
								<div className="edit_profile_form">
									<form>
										<div className="row">
											<div className="col-lg-6">
												<label>First Name</label>
												<input type="text" name="first_name" className="form-control" value={this.state.first_name} placeholder="" onChange={this.onChangehandler}/>
                        <span className="text-danger">{this.state.errMsgFirstName}</span>
											</div>
											<div className="col-lg-6">
												<label>last Name</label>
												<input type="text" name="last_name" className="form-control" value={this.state.last_name} placeholder="" onChange={this.onChangehandler}/>
                        <span className="text-danger">{this.state.errMsgLastName}</span>
											</div>
											<div className="col-lg-12">
												<label>Email Address</label>
												<input type="email" className="form-control" placeholder="" value={Userdata.email ? (Userdata.email) : ("")} disabled/>
											</div>
											
											<div className="col-lg-12">
												<label>Display Name</label>
												<div className="edit_profile_checkbox">
													<label className="profile_radiobtn">Always show my real name
														<input type="radio" name="display_name" value="real_name" onChange={this.onChangehandler} checked={this.state.display_name === "real_name" ? (true) : (false)}/>
														<span className="radiobtn"></span>
													</label>
													<label className="profile_radiobtn">Always show my user name (text)
														<input type="radio" name="display_name" value="username" onChange={this.onChangehandler} checked={this.state.display_name === "username" ? (true) : (false)}/>
														<span className="radiobtn"></span>
													</label>
												</div>
											</div>
											<div className="col-lg-12">
												<label>Bio</label>
												<textarea name="bio" className="form-control" placeholder="" onChange={this.onChangehandler} value={this.state.bio}></textarea>
												<p>Tell your customers a little about yourself in 500 characters or less.</p>
											</div>
										</div>
									</form>
								</div>
							</div>
              
              <button className="submit_btn" type="submit" onClick={this.SaveDetails}>
                  Save Changes {isLoading ? (
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
    </Layout>
    )
  }
}
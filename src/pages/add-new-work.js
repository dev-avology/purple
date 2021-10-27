import React, {Component} from "react"
import { Helmet } from 'react-helmet'
import Layout from "src/components/Layout"
import { login, isAuthenticated, getProfile, CurrentUserToken } from "src/hooks/UserAuth"
import { getArtworkMedia } from "src/components/ApiStore"
import { Newsletter } from "src/components/NewsletterForm"
import { StaticImage } from "gatsby-plugin-image"
import axios from 'axios'
import { navigate } from "gatsby-link"
import swal from 'sweetalert'

export default class AddNewWork extends Component {

componentDidMount() {
    getProfile()
    .then(user => {
        this.setState({
        userdata: user.data,
        });
        this.setState({
            user_id: user.data.id,
            });
    })
    .catch(error => {
        // Handle/report error
    })

    getArtworkMedia()
    .then(result => {
        this.setState({
            getArtwork: result.data,
        })
    })
    .catch(error => {
        // Handle/report error
    })
}
    constructor(props) {
        super(props);
        this.state = {
          userdata: "",
          isLoading: false,
          file: null,
          selectedFile: null,
          getArtwork: "",
          step: 1,
          user_id: "",
          title: "",
          tags: "",
          description: "",
          is_mature_content: "",
          is_public: "",
          currentData: [],
          limit: 3,
          errMsgfileupload: "",
          errMsgTitle: "",
          errMsgTags: "",
          errMsgDescription: "",
          errMsgIsMature: "",
          errMsgIsPublic: "",
          errMsgArtwork: "",
          successMsg: "",
        }
        
        this.handleChange = this.handleChange.bind(this)
      }

    handleStep(step) {
        this.setState({
            step: step,
        })
    }

    handleChange(event) {
    this.setState({
        file: URL.createObjectURL(event.target.files[0])
    })
    this.setState({ selectedFile: event.target.files[0] });
    this.handleStep(2)
    }

    selectData(id, event) {
        let isSelected = event.currentTarget.checked
        let find =  this.state.currentData.indexOf(id)
        if (isSelected) {
          if (this.state.currentData.length < this.state.limit) {
            this.state.currentData.push(id)
            this.setState({ currentData: this.state.currentData })
          }else{
            event.preventDefault()
            event.currentTarget.checked = false
          }
        } else {
            this.state.currentData.splice(find, 1)
          this.setState({currentData: this.state.currentData})
        }
    } 

    onChangehandler = (e) => {
        let name = e.target.name
        let value = e.target.value
        let data = {}
        data[name] = value
        this.setState(data)
      }
     
onFormSubmit = (e) => {
    e.preventDefault();
    if(this.validateForm()){
        this.setState({ isLoading: true });
        
        const data = new FormData() 
        data.append('art_photo', this.state.selectedFile)
        data.append('user_id', this.state.user_id)
        data.append('title', this.state.title)
        data.append('tags', this.state.tags)
        data.append('description', this.state.description)
        data.append('artwork_media_id', this.state.currentData.toString())
        data.append('is_mature_content', this.state.is_mature_content)
        data.append('is_public', this.state.is_public)

        
        let token = CurrentUserToken()
        token = JSON.parse(token)
        
        axios.post(process.env.GATSBY_API_URL+"/api/save-art-work", 
            data,
            {
                headers: {
                    "Content-Type": "multipart/form-data",
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
              setTimeout(() => {
                navigate("/dashboard")
              }, 3000)
              
        }
        if (
            response.data.status === "failed" &&
            response.data.success === undefined
        ) {
            
        } else if (
            response.data.status === "failed" &&
            response.data.success === false
        ) {
        
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

        });
    }
    /*try {
        // make axios post request
        const response = await axios({
          method: "post",
          url: "/api/login",
          data: loginFormData,
          headers: { "Content-Type": "multipart/form-data" },
        });
      } catch(error) {
        console.log(error)
      }*/
    }

    validateForm() {
        let formIsValid = true;

        if (!this.state.selectedFile) {
            formIsValid = false;
            //errors["email"] = "*Please enter your email-ID.";
            this.setState({
              errMsgfileupload: "*Please select your design.",
            });
            setTimeout(() => {
              this.setState({ errMsgfileupload: "" });
            }, 4000);
        }

        if (!this.state.title) {
            formIsValid = false;
            //errors["email"] = "*Please enter your email-ID.";
            this.setState({
                errMsgTitle: "*Title field is required.",
            });
            setTimeout(() => {
              this.setState({ errMsgTitle: "" });
            }, 4000);
        }

        if (!this.state.tags) {
            formIsValid = false;
            //errors["email"] = "*Please enter your email-ID.";
            this.setState({
                errMsgTags: "*Tags field is required.",
            });
            setTimeout(() => {
              this.setState({ errMsgTags: "" });
            }, 4000);
        }

        if (!this.state.description) {
            formIsValid = false;
            //errors["email"] = "*Please enter your email-ID.";
            this.setState({
                errMsgDescription: "*Description field is required.",
            });
            setTimeout(() => {
              this.setState({ errMsgDescription: "" });
            }, 4000);
        }
        if (this.state.currentData.length === 0) {
            formIsValid = false;
            //errors["email"] = "*Please enter your email-ID.";
            this.setState({
                errMsgArtwork: "*Please select atleast one Artwork Media.",
            });
            setTimeout(() => {
              this.setState({ errMsgArtwork: "" });
            }, 4000);
        }

        if (!this.state.is_mature_content) {
            formIsValid = false;
            //errors["email"] = "*Please enter your email-ID.";
            this.setState({
                errMsgIsMature: "* Please select one option.",
            });
            setTimeout(() => {
              this.setState({ errMsgIsMature: "" });
            }, 4000);
        }

        if (!this.state.is_public) {
            formIsValid = false;
            //errors["email"] = "*Please enter your email-ID.";
            this.setState({
                errMsgIsPublic: "* Please select one option.",
            });
            setTimeout(() => {
              this.setState({ errMsgIsPublic: "" });
            }, 4000);
        }

        return formIsValid;
    }

    render() {

        if (!isAuthenticated()) {
            login()
            return null
          }

          const isLoading = this.state.isLoading;
          const Userdata = this.state.userdata

          const getArtworkCheckbox = [];
          for (let x of this.state.getArtwork) {
            getArtworkCheckbox.push(
                <label key={x.id} className="select_checkbox">{x.media_type}
                    <input type="checkbox" value={x.id}  onChange={this.selectData.bind(this, x.id)} />
                    <span className="checkmark"></span>
                </label>);
            }

        return(
            <Layout>
                <Helmet>
                    <title>Add New Work | Splashen</title>
                </Helmet>
                <div className="dashboard_sec add_new_work_sec">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-12">
                                <div className="add_new_work">
                                    <h2>Add new work</h2>
                                    <form encType="multipart/form-data" onSubmit={this.onFormSubmit}>
                                    <div className="step1" style={this.state.step === 1 ? ( null ) :( { display: "none" } )}>
                                    <div className="uplaod-fils">
                                        <label className="custom-file-upload">
                                            <input type="file" onChange={this.handleChange}/>
                                            <img src={this.state.file} alt=""/>
                                            {this.state.file ? ( 
                                            <span></span> ):( <span><StaticImage className="black_img" src="../images/new-upload-02c611d3b1eeb6ad555ff842020b9c23990ec9833a7605a66ad6504ba8a480e8.svg" alt="" /><StaticImage className="white_img" src="../images/white-new-upload-02c611d3b1eeb6ad555ff842020b9c23990ec9833a7605a66ad6504ba8a480e8.svg" alt="" /> <span>Upload new work</span></span> )}
                                        </label>
                                    </div>
                                    <div className="uplaod-fils_text">
                                        <h3>File requirements</h3>
                                        <p>We recommend high-resolution JPEG, PNG or GIF files with a minimum of 1000px resolution. For more help, check out our <a href="#">design guide</a></p>
                                    </div>
                                    </div>
                                    
                                    <div className="step2" style={this.state.step === 2 ? ( null ) :( { display: "none" } )}>
                                        <div className="uplaod_images_main">
                                            <div className="uplaod_images">
                                                <div className="uplaod_images_inner">
                                                    <img src={this.state.file} alt=""/>
                                                    <div className="uplaod_images_hover">
                                                        <div className="uplaod-fils">
                                                            <label className="custom-file-upload">
                                                                <input type="file" onChange={this.handleChange}/>
                                                                <span><span>Replace Image</span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="language-tab">
                                                <nav>
                                                    <div className="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                                        <a className="nav-item nav-link active" id="new-english-tab" data-toggle="tab" href="#new-english" role="tab" aria-controls="new-english" aria-selected="true">English</a>
                                                        <a className="nav-item nav-link" id="nav-french-tab" data-toggle="tab" href="#nav-french" role="tab" aria-controls="nav-french" aria-selected="false">French</a>
                                                    </div>
                                                </nav>
                                                <div className="tab-content" id="nav-tabContent">
                                                    <div className="tab-pane fade show active" id="new-english" role="tabpanel" aria-labelledby="new-english-tab">
                                                        <form>
                                                            <div className="row">
                                                                <div className="col-lg-12">
                                                                    <label>Title (required) <span className="i_icon"><img src="images/i_icon.png" alt=""/><div className="hover-tooltip-title">Use a descriptive title that explains your artwork. This makes it easier for people to find your design based on their searches.</div></span></label>
                                                                    <input required="" type="text" name="title" placeholder="Use 4 to 8 words to describe your work" className="" 
                                                                    value={this.state.title}
                                                                    onChange={this.onChangehandler}/>
                                                                    <span className="text-danger">{this.state.errMsgTitle}</span>
                                                                </div>
                                                                <div className="col-lg-12">
                                                                    <label>Tags <span className="i_icon"><img src="images/i_icon.png" alt=""/><div className="hover-tooltip-title">Tags are how your audience finds your work. Use 15 relevant tags per upload. Use search terms your audience would look for to find your work, including your name. Make sure to separate tags with commas. Example: panda, bear, black and white.</div></span></label>
                                                                    <textarea placeholder="Separate tags with commas." className="" name="tags" id=""
                                                                    onChange={this.onChangehandler}>{this.state.tags}</textarea>
                                                                    <span className="text-danger">{this.state.errMsgTags}</span>
                                                                </div>
                                                                <div className="col-lg-12">
                                                                    <label>Description <span className="i_icon"><img src="images/i_icon.png" alt=""/><div className="hover-tooltip-title">Share the story or meaning behind your work. You don’t have to give away any secrets, but your audience will appreciate a little insight into what you created.</div></span></label>
                                                                    <textarea placeholder="Describe your work to get your audience excited" className="" name="description" id="" onChange={this.onChangehandler}>{this.state.description}</textarea>
                                                                    <span className="text-danger">{this.state.errMsgDescription}</span>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div className="tab-pane fade" id="nav-french" role="tabpanel" aria-labelledby="nav-french-tab">
                                                        <form>
                                                            <div className="row">
                                                                <div className="col-lg-12">
                                                                    <label>Title (required) <span className="i_icon"><img src="images/i_icon.png" alt=""/><div className="hover-tooltip-title">Use a descriptive title that explains your artwork. This makes it easier for people to find your design based on their searches.</div></span></label>
                                                                    <input required="" type="text" name="" placeholder="Use 4 to 8 words to describe your work " className=""/>
                                                                </div>
                                                                <div className="col-lg-12">
                                                                    <label>Tags <span className="i_icon"><img src="images/i_icon.png" alt=""/><div className="hover-tooltip-title">Tags are how your audience finds your work. Use 15 relevant tags per upload. Use search terms your audience would look for to find your work, including your name. Make sure to separate tags with commas. Example: panda, bear, black and white.</div></span></label>
                                                                    <textarea placeholder="Separate tags with commas." className="" name="" id="" ></textarea>
                                                                </div>
                                                                <div className="col-lg-12">
                                                                    <label>Description <span className="i_icon"><img src="images/i_icon.png" alt=""/><div className="hover-tooltip-title">Share the story or meaning behind your work. You don’t have to give away any secrets, but your audience will appreciate a little insight into what you created.</div></span></label>
                                                                    <textarea placeholder="Describe your work to get your audience excited" className="" name="" id="" ></textarea>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div className="media_select_sec">
                                            <div className="container">
                                                <div className="row">
                                                    <div className="col-lg-12">
                                                        <div className="media_select">
                                                            <h2>Media – Select up to 2</h2>
                                                            <div className="media_select_checkbox">
                                                                {getArtworkCheckbox}
                                                                <span className="text-danger">{this.state.errMsgArtwork}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div className="who_can_work_sec">
                                            <div className="container">
                                                <div className="row">
                                                    <div className="col-lg-6">
                                                        <div className="who_can_work">
                                                            <h3>Who can view this work?</h3>
                                                            <div className="custom_check_work">
                                                                <label className="check_work">Anybody (public)
                                                                    <input type="radio" name="is_public" value="1" onChange={this.onChangehandler}/>
                                                                    <span className="radiobtn"></span>
                                                                </label>
                                                                <label className="check_work">Only You (private)
                                                                    <input type="radio" name="is_public" value="0" onChange={this.onChangehandler}/>
                                                                    <span className="radiobtn"></span>
                                                                </label>
                                                                <span className="text-danger">{this.state.errMsgIsPublic}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div className="col-lg-6">
                                                        <div className="mature_content">
                                                            <h3>Is this mature content?</h3>
                                                            <p>Nudity or lingerie, adult language, alcohol or drugs, blood, guns or violence. <a href="#">Not sure? See guidelines</a>.</p>
                                                            <div className="custom_check_work">
                                                                <label className="check_work">Yes
                                                                    <input type="radio" name="is_mature_content" value="1" onChange={this.onChangehandler}/>
                                                                    <span className="radiobtn"></span>
                                                                </label>
                                                                <label className="check_work">No
                                                                    <input type="radio" name="is_mature_content" value="0" onChange={this.onChangehandler}/>
                                                                    <span className="radiobtn"></span>
                                                                </label>
                                                                <span className="text-danger">{this.state.errMsgIsMature}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div className="rights_declaration_sec">
                                            <div className="container">
                                                <div className="row">
                                                    <div className="col-lg-12">
                                                        <div className="rights_declaration">
                                                            <label className="declaration_checkbox">I have the right to sell products containing this artwork, including (1) any featured company’s name or logo, (2) any featured person’s name or face, and (3) any featured words or images created by someone else.
                                                                <input type="checkbox" />
                                                                <span className="checkmark"></span>
                                                            </label>
                                                            <button type="submit" className="btn">Save work {isLoading ? (
                                                                <span
                                                                    className="spinner-border spinner-border-sm ml-5"
                                                                    role="status"
                                                                    aria-hidden="true"
                                                                ></span>
                                                                ) : (
                                                                <span></span>
                                                                )}</button>
                                                                <span className="text-success">{this.state.successMsg}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
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
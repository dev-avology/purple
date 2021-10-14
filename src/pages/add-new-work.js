import React, {Component} from "react"
import { Helmet } from 'react-helmet';
import Layout from "src/components/Layout"
import { login, isAuthenticated, getProfile } from "src/hooks/UserAuth"
import { getArtworkMedia } from "src/components/ApiStore"
import { Newsletter } from "src/components/NewsletterForm"
import { StaticImage } from "gatsby-plugin-image"
import axios from 'axios';

export default class AddNewWork extends Component {

componentDidMount() {
    getProfile()
    .then(user => {
        this.setState({
        userdata: user.data,
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
 console.log(this.state.getArtwork)   
}
    constructor(props) {
        super(props);
        this.state = {
          userdata: "",
          file: null,
          selectedFile: null,
          getArtwork: "",
          step: 1,
          title: "",
          tags: "",
          description: "",
          tags: "",
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

    onChangehandler = (e) => {
        let name = e.target.name;
        let value = e.target.value;
        let data = {};
        data[name] = value;
        this.setState(data);
      };

onFormSubmit(){
    console.log(this.statw.selectedFile)

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

    render() {
        if (!isAuthenticated()) {
            login()
            return null
          }
          const Userdata = this.state.userdata
          //const gg = JSON.parse(this.state.getArtwork);
          console.log(this.state.getArtwork)
          const arrayOfObjects = [
            this.state.getArtwork
          ];

        return(
            <Layout>
                <Helmet>
                    <title>Account Details | Splashen</title>
                </Helmet>
                <div className="dashboard_sec add_new_work_sec">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-12">
                                <div className="add_new_work">
                                    <h2>Add new work</h2>
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

                                        {arrayOfObjects.map((item, index) => (
                                            <>{item[index].map(itm => <div>itm.id</div>)}
                                            </>
                                        )
                                        )}

                                    <div className="step2" style={this.state.step === 2 ? ( null ) :( { display: "none" } )}>
                                        <div className="uplaod_images_main">
                                            <div className="uplaod_images">
                                                <div className="uplaod_images_inner">
                                                    <img src={this.state.file} alt=""/>
                                                    <div className="uplaod_images_hover">
                                                        <div className="uplaod-fils">
                                                            <label className="custom-file-upload">
                                                                <input type="file" />
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
                                                                </div>
                                                                <div className="col-lg-12">
                                                                    <label>Tags <span className="i_icon"><img src="images/i_icon.png" alt=""/><div className="hover-tooltip-title">Tags are how your audience finds your work. Use 15 relevant tags per upload. Use search terms your audience would look for to find your work, including your name. Make sure to separate tags with commas. Example: panda, bear, black and white.</div></span></label>
                                                                    <textarea placeholder="Separate tags with commas." className="" name="tags" id=""
                                                                    onChange={this.onChangehandler}>{this.state.tags}</textarea>
                                                                </div>
                                                                <div className="col-lg-12">
                                                                    <label>Description <span className="i_icon"><img src="images/i_icon.png" alt=""/><div className="hover-tooltip-title">Share the story or meaning behind your work. You don’t have to give away any secrets, but your audience will appreciate a little insight into what you created.</div></span></label>
                                                                    <textarea placeholder="Describe your work to get your audience excited" className="" name="description" id="" onChange={this.onChangehandler}>{this.state.description}</textarea>
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


                                        <div class="media_select_sec">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="media_select">
                                                            <h2>Media – Select up to 2</h2>
                                                            <div class="media_select_checkbox">
                                                                <label class="select_checkbox">Photography
                                                                    <input type="checkbox" />
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                                <label class="select_checkbox">Design &amp; Illustration
                                                                    <input type="checkbox" />
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                                <label class="select_checkbox">Painting &amp; Mixed Media
                                                                    <input type="checkbox" />
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                                <label class="select_checkbox">Drawing
                                                                    <input type="checkbox" />
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                                <label class="select_checkbox">Digital Art
                                                                    <input type="checkbox" />
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
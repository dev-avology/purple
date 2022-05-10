import React, { useState, useEffect } from "react";
import { Helmet } from "react-helmet";
import { Layout } from "./Layout";
import { Navigate, Link } from "react-router-dom";
import { useDispatch, useSelector,connect } from "react-redux";
import {getProfileFetch} from "../actions/auth"
import UserService from "../services/user.service";
import BlackImage from "../assets/images/new-upload-02c611d3b1eeb6ad555ff842020b9c23990ec9833a7605a66ad6504ba8a480e8.svg";
import WhiteImage from "../assets/images/white-new-upload-02c611d3b1eeb6ad555ff842020b9c23990ec9833a7605a66ad6504ba8a480e8.svg";
import Form from "react-validation/build/form";
import Input from "react-validation/build/input";
import Textarea from "react-validation/build/textarea";
import CheckButton from "react-validation/build/button";
import swal from "sweetalert";
import Loader from "./Loader";

const required = (value) => {
  if (!value) {
    return (
      <div className="alert alert-danger" role="alert">
        This field is required!
      </div>
    );
  }
};

function AddNewWok (currentUser) {
  const form = React.useRef();
  const checkBtn = React.useRef();
  const { isLoggedIn } = useSelector((state) => state.auth);
  const [StepImage, setStep1Image] = useState("");
  const [StepImagePreview, setStep1ImagePreview] = useState("");
  const [Step, setStep] = useState(1);
  const [Title, setTitle] = useState("");
  const [Tags, setTags] = useState("");
  const [Description, setDescription] = useState("");
  const [MatureContent, setMatureContent] = useState("");
  const [Public, setPublic] = useState("");
  const [loading, setLoading] = useState("");
  const [ArtworkMedia, setArtworkMedia] = useState([]);
  const [SelectedArtWork, setSelectedArtWork] = useState({});
  const [UserData, setUserData] = useState();
  const [mockups, setMockups] = useState();
  const [isImageUploaded, setIsImageUploaded] = useState(false);
  const dispatch = useDispatch();

  useEffect(() => {
    dispatch(getProfileFetch())
  }, [dispatch])

  useEffect(() => {
    UserService.getArtworkMedia().then(
      (response) => {
        setArtworkMedia(response.data);
      },
      (error) => {
        const _ArtworkMedia =
          (error.response &&
            error.response.data &&
            error.response.data.message) ||
          error.message ||
          error.toString();

        setArtworkMedia(_ArtworkMedia);
      }
    );

    UserService.getUserData()
    .then((response) => {
      setUserData(response.data.id);     
    })
    .catch((error) => {
      console.log('Error: '+error);
    });

  }, []);

  useEffect(() => {

    UserService.getAlltheMockups().then(
      (response) => {
        setMockups(response.data);
        console.log('MockUps Data: '+response.data);
      },
      (error) => {
        const dataError =
          (error.response &&
            error.response.data &&
            error.response.data.message) ||
          error.message ||
          error.toString();

        console.log('Something went wrong while getting Mockups: '+dataError);
      }
    );

  }, [isImageUploaded]);

  if (!isLoggedIn) {
    return <Navigate to={`${process.env.PUBLIC_URL}/login`} />;
  }

  const Step1Image = (e) => {
    const StepImage = e.target.files[0];
    setStep1Image(StepImage);
    setStep1ImagePreview(URL.createObjectURL(e.target.files[0]));
    setIsImageUploaded(true);
    setStep(2);
  };

  const onChangeTitle = (e) => {
    const Title = e.target.value;
    setTitle(Title);
  };

  const onChangeTags = (e) => {
    const Tags = e.target.value;
    setTags(Tags);
  };

  const onChangeDescription = (e) => {
    const Description = e.target.value;
    setDescription(Description);
  };

  const isMatureContent = (e) => {
    const MatureContent = e.target.value;
    setMatureContent(MatureContent);
  };

  const isPublic = (e) => {
    const Public = e.target.value;
    setPublic(Public);
  };

  const selectData = (event) => {
    if (event.target.checked) {
      if (Object.keys(SelectedArtWork).length < 3) {
        setSelectedArtWork({
          ...SelectedArtWork,
          [event.target.name]: event.target.checked,
        });
      } else {
        event.target.checked = false;
      }
    } else {
      delete SelectedArtWork[event.target.name];
      setSelectedArtWork(SelectedArtWork);
    }
  };


  const handleSubmit = (e) => {
    e.preventDefault();
    setLoading(true);
    form.current.validateAll();
    if (checkBtn.current.context._errors.length === 0) {
      const data = new FormData();
      data.append("user_id", UserData);
      data.append("art_photo", StepImage);
      data.append("title", Title);
      data.append("tags", Tags);
      data.append("description", Description);
      data.append("artwork_media_id", SelectedArtWork.toString());
      data.append("is_mature_content", MatureContent);
      data.append("is_public", Public);

      UserService.saveArtwork(data)
        .then((response) => {
          setLoading(false);
          swal({
            title: "Added!",
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
    }else{
      setLoading(false);
    }

  };

  const getArtworkCheckbox = [];

  for (let x of ArtworkMedia) {
    getArtworkCheckbox.push(
      <label key={x.id} className="select_checkbox">
        {x.media_type}
        <input
          type="checkbox"
          value={x.id}
          name={x.media_type}
          onChange={selectData}
        />
        <span className="checkmark"></span>
      </label>
    );
  }
  return (
    <Layout>
      <Helmet>
        <title>Add New Work | Splashen</title>
      </Helmet>
      {loading ? <Loader /> : null}
      <div className="dashboard_sec add_new_work_sec">
        <div className="container">
          <div className="row">
            <div className="col-lg-12">
              <div className="add_new_work">
                <h2>Add new work</h2>
                <Form encType="multipart/form-data" ref={form} onSubmit={handleSubmit}>
                  <div
                    className="step1"
                    style={Step === 1 ? null : { display: "none" }}
                  >
                    <div className="uplaod-fils">
                      <label className="custom-file-upload">
                        <Input
                          type="file"
                          name="step1image"
                          onChange={Step1Image}
                          validations={[required]}
                        />
                        <img src={StepImagePreview} alt="" />
                        {StepImagePreview ? (
                          <span></span>
                        ) : (
                          <span>
                            <img
                              className="black_img"
                              src={BlackImage}
                              alt=""
                            />
                            <img
                              className="white_img"
                              src={WhiteImage}
                              alt=""
                            />{" "}
                            <span>Upload new work</span>
                          </span>
                        )}
                      </label>
                    </div>
                    <div className="uplaod-fils_text">
                      <h3>File requirements</h3>
                      <p>
                        We recommend high-resolution JPEG, PNG or GIF files with
                        a minimum of 1000px resolution. For more help, check out
                        our <Link to="#">design guide</Link>
                      </p>
                    </div>
                  </div>

                  <div
                    className="step2"
                    style={Step === 2 ? null : { display: "none" }}
                  >
                    <div className="uplaod_images_main">
                      <div className="uplaod_images">
                        <div className="uplaod_images_inner">
                          <img src={StepImagePreview} alt="" />
                          <div className="uplaod_images_hover">
                            <div className="uplaod-fils">
                              <label className="custom-file-upload">
                                <Input
                                  type="file"
                                  name="step2image"
                                  onChange={Step1Image}
                                />
                                <span>
                                  <span>Replace Image</span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="language-tab">
                        <nav>
                          <div
                            className="nav nav-tabs nav-fill"
                            id="nav-tab"
                            role="tablist"
                          >
                            <Link
                              className="nav-item nav-link active"
                              id="new-english-tab"
                              data-toggle="tab"
                              to="#new-english"
                              role="tab"
                              aria-controls="new-english"
                              aria-selected="true"
                            >
                              English
                            </Link>
                            <Link
                              className="nav-item nav-link"
                              id="nav-french-tab"
                              data-toggle="tab"
                              to="#nav-french"
                              role="tab"
                              aria-controls="nav-french"
                              aria-selected="false"
                            >
                              French
                            </Link>
                          </div>
                        </nav>
                        <div className="tab-content" id="nav-tabContent">
                          <div
                            className="tab-pane fade show active"
                            id="new-english"
                            role="tabpanel"
                            aria-labelledby="new-english-tab"
                          >
                              <div className="row">
                                <div className="col-lg-12">
                                  <label>
                                    Title (required){" "}
                                    <span className="i_icon">
                                      <img src="images/i_icon.png" alt="" />
                                      <div className="hover-tooltip-title">
                                        Use a descriptive title that explains
                                        your artwork. This makes it easier for
                                        people to find your design based on
                                        their searches.
                                      </div>
                                    </span>
                                  </label>
                                  <Input
                                    required=""
                                    type="text"
                                    name="title"
                                    placeholder="Use 4 to 8 words to describe your work"
                                    className=""
                                    value={Title}
                                    onChange={onChangeTitle}
                                    validations={[required]}
                                  />
                                  <span className="text-danger"></span>
                                </div>
                                <div className="col-lg-12">
                                  <label>
                                    Tags{" "}
                                    <span className="i_icon">
                                      <img src="images/i_icon.png" alt="" />
                                      <div className="hover-tooltip-title">
                                        Tags are how your audience finds your
                                        work. Use 15 relevant tags per upload.
                                        Use search terms your audience would
                                        look for to find your work, including
                                        your name. Make sure to separate tags
                                        with commas. Example: panda, bear, black
                                        and white.
                                      </div>
                                    </span>
                                  </label>
                                  <Textarea
                                    placeholder="Separate tags with commas."
                                    className=""
                                    name="tags"
                                    id=""
                                    onChange={onChangeTags}
                                    value={Tags}
                                    validations={[required]}
                                  ></Textarea>
                                  <span className="text-danger"></span>
                                </div>
                                <div className="col-lg-12">
                                  <label>
                                    Description{" "}
                                    <span className="i_icon">
                                      <img src="images/i_icon.png" alt="" />
                                      <div className="hover-tooltip-title">
                                        Share the story or meaning behind your
                                        work. You don’t have to give away any
                                        secrets, but your audience will
                                        appreciate a little insight into what
                                        you created.
                                      </div>
                                    </span>
                                  </label>
                                  <Textarea
                                    placeholder="Describe your work to get your audience excited"
                                    className=""
                                    name="description"
                                    id=""
                                    onChange={onChangeDescription}
                                    value={Description}
                                    validations={[required]}
                                  ></Textarea>
                                  <span className="text-danger"></span>
                                </div>
                              </div>
                          </div>

                          <div
                            className="tab-pane fade"
                            id="nav-french"
                            role="tabpanel"
                            aria-labelledby="nav-french-tab"
                          >
                              <div className="row">
                                <div className="col-lg-12">
                                  <label>
                                    Title (required){" "}
                                    <span className="i_icon">
                                      <img src="images/i_icon.png" alt="" />
                                      <div className="hover-tooltip-title">
                                        Use a descriptive title that explains
                                        your artwork. This makes it easier for
                                        people to find your design based on
                                        their searches.
                                      </div>
                                    </span>
                                  </label>
                                  <Input
                                    required=""
                                    type="text"
                                    name=""
                                    placeholder="Use 4 to 8 words to describe your work "
                                    className=""
                                  />
                                </div>
                                <div className="col-lg-12">
                                  <label>
                                    Tags{" "}
                                    <span className="i_icon">
                                      <img src="images/i_icon.png" alt="" />
                                      <div className="hover-tooltip-title">
                                        Tags are how your audience finds your
                                        work. Use 15 relevant tags per upload.
                                        Use search terms your audience would
                                        look for to find your work, including
                                        your name. Make sure to separate tags
                                        with commas. Example: panda, bear, black
                                        and white.
                                      </div>
                                    </span>
                                  </label>
                                  <Textarea
                                    placeholder="Separate tags with commas."
                                    className=""
                                    name=""
                                    id=""
                                  ></Textarea>
                                </div>
                                <div className="col-lg-12">
                                  <label>
                                    Description{" "}
                                    <span className="i_icon">
                                      <img src="images/i_icon.png" alt="" />
                                      <div className="hover-tooltip-title">
                                        Share the story or meaning behind your
                                        work. `1You don’t have to give away any
                                        secrets, but your audience will
                                        appreciate a little insight into what
                                        you created.
                                      </div>
                                    </span>
                                  </label>
                                  <Textarea
                                    placeholder="Describe your work to get your audience excited"
                                    className=""
                                    name=""
                                    id=""
                                  ></Textarea>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
        
                    <center><h3>Product Preview</h3></center>
                    <div className="art_category_inner">
                      <div className="row">
                        {
                          mockups?.length > 0 ? (
                            mockups.map(item => {
                              return (
                                <div className="col-lg-4 col-sm-6">
                                  <div className="art_category_item">
                                    <div className="art_category_item_img">
                                      <div className="htmlToImageVis">
                                        <img className="product_frame" src={item.product_image} alt="" />
                                        <img src={StepImagePreview} alt="" />
                                      </div>
                                    </div>
                                    <div className="art_category_item_text">
                                      <h4><a href="#">{item.title}</a></h4>
                                      <button className="btn">enabled</button>
                                      <button className="btn">Edit</button>
                                    </div>
                                  </div>
                                </div>     
                              )})
                          ) : (<div className="notfound-text"><p>No products found!</p></div>)
                        }
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
                                <span className="text-danger"></span>
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
                                <label className="check_work">
                                  Anybody (public)
                                  <input
                                    type="radio"
                                    name="is_public"
                                    value="1"
                                    onChange={isPublic}
                                  />
                                  <span className="radiobtn"></span>
                                </label>
                                <label className="check_work">
                                  Only You (private)
                                  <input
                                    type="radio"
                                    name="is_public"
                                    value="0"
                                    onChange={isPublic}
                                  />
                                  <span className="radiobtn"></span>
                                </label>
                                <span className="text-danger"></span>
                              </div>
                            </div>
                          </div>
                          <div className="col-lg-6">
                            <div className="mature_content">
                              <h3>Is this mature content?</h3>
                              <p>
                                Nudity or lingerie, adult language, alcohol or
                                drugs, blood, guns or violence.{" "}
                                <Link to="#">Not sure? See guidelines</Link>.
                              </p>
                              <div className="custom_check_work">
                                <label className="check_work">
                                  Yes
                                  <input
                                    type="radio"
                                    name="is_mature_content"
                                    value="1"
                                    onChange={isMatureContent}
                                  />
                                  <span className="radiobtn"></span>
                                </label>
                                <label className="check_work">
                                  No
                                  <input
                                    type="radio"
                                    name="is_mature_content"
                                    value="0"
                                    onChange={isMatureContent}
                                  />
                                  <span className="radiobtn"></span>
                                </label>
                                <span className="text-danger"></span>
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
                              <label className="declaration_checkbox">
                                I have the right to sell products containing
                                this artwork, including (1) any featured
                                company’s name or logo, (2) any featured
                                person’s name or face, and (3) any featured
                                words or images created by someone else.
                                <input type="checkbox" />
                                <span className="checkmark"></span>
                              </label>
                              <button type="submit" className="btn">
                                Save work{" "}
                              </button>
                              <span className="text-success"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <CheckButton style={{ display: "none" }} ref={checkBtn} />
                </Form>
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
export default connect(mapStateToProps)(AddNewWok)

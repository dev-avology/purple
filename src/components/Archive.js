import React, { useState, useEffect } from "react"
import { connect, useSelector } from 'react-redux'
import {useParams, Link} from "react-router-dom"
import { fetchCats } from '../actions/postsActions'
import { getProfileFetch } from '../actions/auth'
import { Layout } from "./Layout"
import Helmet from 'react-helmet'
import UserService from "../services/user.service";
import swal from "sweetalert";
import Loader from "./Loader";
import mergeImages from 'merge-images';
import authToken from "../services/auth-token";
import Accordion from 'react-bootstrap/Accordion';
import posterBg from '../assets/images/posters-img.png';

function ProductDetail({ dispatch, loading, cats, hasErrors, currentUser }) {    
  
    const { isLoggedIn } = useSelector(state => state.auth);

    const {slug} = useParams()
    const ProductsData = cats.find(prod => prod.slug === slug)
    const [Loading, setLoading] = useState(false);
    const [token, setToken] = useState();
    const [userId, setUserId] = useState();
    const [artWorkMedia, setArtWorkMedia] = useState();
    
    const [selectedCategoryFilter, setSelectedCategoryFilter] = useState('1');
    const [selectedPriceFilter, setSelectedPriceFilter] = useState('low');

    useEffect(() => {
      dispatch(fetchCats());
      dispatch(getProfileFetch());
      setToken(authToken());
    
      UserService.getUserData()
      .then((response) => {
          setUserId(response.data.id);
      })
      .catch((error) => {
        console.log('Error: '+error);
      });

      UserService.getArtworkMedia()
      .then(response => {
        setArtWorkMedia(response.data)
      })
      .catch(error => {
        console.log('Error: '+error);
      });

    }, [dispatch])

    const onSaveWishlist = (seller_id, product_id) => {
        setLoading(true);
        const data = { 
            buyer_id: currentUser.id,
            product_id: product_id,
            quantity: 1,
            seller_id: seller_id,

        };
          UserService.saveWishlist(data)
            .then((response) => {
                setLoading(false);
              swal({
                title: "Added to wishlist!",
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

      const onValueChangeCategoryFilter = (event) => {
        setSelectedCategoryFilter(event.target.value);
      }

      const onValueChangePriceFilter = (event) => {
        setSelectedPriceFilter(event.target.value);
      }

    return (
      <Layout>
      {ProductsData ? (
      <Helmet>
        <title>{ProductsData.name} | Splashen</title>
      </Helmet>
      ) :(null) }
      {loading ? <Loader /> : null}
      <div className="art_category_sec">
        <div className="container">
          <div className="row">
            <div className="col-lg-3 col-md-4">
              <div className="art_category_list">
                <h2>Filters </h2>	
                <Accordion defaultActiveKey="0">
                  <div className="card">
                    <Accordion.Item eventKey="0" >
                      <Accordion.Header>
                        <div className="card-head" id="headingOne">
                          <h4><a className="mb-0">Category</a></h4>
                        </div>
                      </Accordion.Header>
                      <Accordion.Body>
                        <div className="card-body">
                          <div className="category_artwork">

                            {
                              cats.map(cat => 
                                <label className="category_artwork_check">{cat.name}
                                  <input 
                                    type="radio" 
                                    name="category" 
                                    value={cat.id}
                                    checked={selectedCategoryFilter == cat.id}
                                    onChange={onValueChangeCategoryFilter}
                                  />
                                  <span className="radiobtn"></span>
                                </label> 
                              )
                            }
                            </div>
                          </div>
                      </Accordion.Body>
                    </Accordion.Item>
                  </div>
                  <div className="card">
                    <Accordion.Item eventKey="1">
                      <Accordion.Header>
                        <div className="card-head" id="headingTwo">
                          <h4><a href="#" className="mb-0">Price</a></h4>
                        </div>
                      </Accordion.Header>
                      <Accordion.Body>
                      <div className="card-body">
                        <div className="category_price">
                          <label className="category_artwork_check">$
                            <input 
                              type="radio"
                              value="low"
                              name="price_filter"
                              checked={selectedPriceFilter == 'low'}
                              onChange={onValueChangePriceFilter}
                            />
                            <span className="radiobtn"></span>
                          </label>
                          <label className="category_artwork_check">$$
                            <input 
                              type="radio"
                              value="medium"
                              name="price_filter"
                              checked={selectedPriceFilter == 'medium'}
                              onChange={onValueChangePriceFilter}
                            />
                            <span className="radiobtn"></span>
                          </label>
                          <label className="category_artwork_check">$$$
                            <input 
                              type="radio"
                              value="high"
                              name="price_filter" 
                              checked={selectedPriceFilter == 'high'}
                              onChange={onValueChangePriceFilter}
                            />
                            <span className="radiobtn"></span>
                          </label>
                        </div>
                      </div>
                      </Accordion.Body>
                    </Accordion.Item>
                  </div>
                  <div className="card">
                    <Accordion.Item eventKey="2">
                        <Accordion.Header>
                          <div className="card-head" id="headingThree">
                            <h4><a href="#" class="mb-0">Artwork Medium</a></h4>
                          </div>
                        </Accordion.Header>
                        <Accordion.Body>
                          <div className="card-body">
                            <div className="category_artwork">
                              <label className="category_artwork_check">All Mediums
                              <input 
                                type="radio" 
                                name="artwork_medium"
                                value="all_mediums" 
                              />
                              <span className="radiobtn"></span>
                              </label>
                              <label className="category_artwork_check">Design & Illustration
                              <input 
                                type="radio" 
                                name="artwork_medium" 
                                value="design_and_illustration"
                              />
                              <span className="radiobtn"></span>
                              </label>
                              <label className="category_artwork_check">Digital Art
                              <input 
                                type="radio" 
                                name="artwork_medium" 
                                value="digital_art"
                              />
                              <span className="radiobtn"></span>
                              </label>
                              <label className="category_artwork_check">Drawing
                              <input 
                                type="radio" 
                                name="artwork_medium" 
                                value="drawing"
                              />
                              <span className="radiobtn"></span>
                              </label>
                              <label className="category_artwork_check">Painting & Mixed Media
                              <input 
                                type="radio" 
                                name="artwork_medium" 
                                value="painting_and_mixed_media"
                              />
                              <span className="radiobtn"></span>
                              </label>
                              <label className="category_artwork_check">Photography
                              <input type="radio" name="artwork_medium" value="photography" />
                              <span className="radiobtn"></span>
                              </label>
                            </div>
                          </div>
                        </Accordion.Body>
                    </Accordion.Item>
                  </div>
              </Accordion>
              </div>   
            </div> 
            <div className="col-lg-9 col-md-8">
              <div className="art_category">
                <h2>{ProductsData?.name}</h2>
                {ProductsData?.content ? (<p>{ProductsData?.content}</p>) : (false)}
                <div className="results_main">
                  <div className="results">
                      <h3>{ProductsData?.name} <span>{ProductsData?.designs.length > 0 ? (ProductsData?.designs.length + ' Results') : (false)} </span></h3>
                  </div>
                  <div className="results_select_form">
                      <select className="form-control border-0" id="exampl-drp">
                        <option>Most Relevant</option>
                        <option>Trending</option>
                        <option>Newest</option>
                        <option>Best Selling</option>
                      </select>
                  </div>
                </div>
                {ProductsData?.designs.length > 0 ? (
                <div className="art_category_inner">
                  <div className="row">
                    {ProductsData?.designs?.map((item) => {
                          return(
                        <div key={item.id} className="col-lg-4 col-sm-6">
                          <div className="art_category_item">
                            <div className="art_category_item_img">
                                <div id={`htmlToImageVis_${item.id}`} className={`htmlToImageVis ${item.orientation} ${ProductsData.slug}` }>
                                <Link to={`${process.env.PUBLIC_URL}/product/${item.slug}/${item.art_id}`}>
                                  {
                                    ProductsData.slug == 'posters' ? (
                                      <div className="posters-wrapper">
                                        <img src={item.art_photo_path} alt="" />
                                        <img className="poster-bg" src={posterBg} alt="" /> 
                                      </div>
                                    ) : (
                                      <>
                                        <img className="product_frame" src={item.product_image_full_path} />
                                        <img src={item.art_photo_path} alt="" />
                                      </>
                                    )
                                  }
                                  
                                </Link>
                                </div>
                                <div className="art_category_item_hover">
                                    {/* <Link className="shop_btn" to={`${process.env.PUBLIC_URL}/product/${item.slug}/${item.art_id}`}>View Shop</Link> */}
                                    {isLoggedIn ? (
                                            <>
                                            <a className="shop_btn" href={`http://146.190.226.38/backend-services/product-detail/${item.art_id}/${userId}/${item.slug}/${item.product_by_orientation.id}/${ProductsData.slug}`}>View Shop</a>
                                            </>
                                          ) : (
                                              <>
                                              <Link className="shop_btn" to={`${process.env.PUBLIC_URL}/login`}>View Shop</Link>
                                              </>
                                          )
                                      }
    
                                    <Link className="heart" to="#" onClick={() => onSaveWishlist(item.user_id, item.id)}><i className="fa fa-heart" aria-hidden="true"></i></Link>
                                </div>
                            </div>
                            <div className="art_category_item_text">
                              <h4><a href={`http://146.190.226.38/backend-services/product-detail/${item.art_id}/${userId}/${item.slug}/${item.product_by_orientation.id}/${ProductsData.slug}`}>{item.title}</a></h4>
                              <span className="price">${item.price}</span>
                            </div>
                          </div>
                        </div>
                          )}
                    )}
                  </div>
                </div> 
                ) : (<div className="notfound-text"><p>No products found!</p></div>)}
              </div> 
            </div>
          </div>
        </div>
      </div>
      <ul>
      
      </ul>
    </Layout>
    )
}
const mapStateToProps = state => ({
    loading: state.cats.loading,
    cats: state.cats.cats,
    hasErrors: state.cats.hasErrors,
  })
export default connect(mapStateToProps)(ProductDetail)
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

function ProductDetail({ dispatch, loading, cats, hasErrors, currentUser }) {    
  
    const { isLoggedIn } = useSelector(state => state.auth);

    const {slug} = useParams()
    const ProductsData = cats.find(prod => prod.slug === slug)
    const [Loading, setLoading] = useState(false);
    const [token, setToken] = useState();
    const [userId, setUserId] = useState();


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
      if(ProductsData?.designs){
        for(let aa of ProductsData?.designs){
          console.log(aa.art_photo_path)
          if(aa.art_photo_path){
        mergeImages([
            { src:aa.art_photo_path, x: 0, y: 0 },
            { src:aa.art_photo_path, x: 12, y: 0 }
            ], {crossOrigin:'Anonymous'})
            .then(b64 => console.log(b64)
              );
            }
        }
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
                                <div id={`htmlToImageVis_${item.id}`} className={`htmlToImageVis ${item.orientation}`}>
                                <Link to={`${process.env.PUBLIC_URL}/product/${item.slug}/${item.art_id}`}>
                                  <img className="product_frame" src={item.product_by_orientation ? (item.product_by_orientation.product_image_full_path) : ("")} />
                                  <img src={item.art_photo_path} alt="" />
                                </Link>
                                </div>
                                <div className="art_category_item_hover">
                                    {/* <Link className="shop_btn" to={`${process.env.PUBLIC_URL}/product/${item.slug}/${item.art_id}`}>View Shop</Link> */}
                                    {isLoggedIn ? (
                                            <>
                                            <a className="shop_btn" href={`http://146.190.226.38/backend-services/product-detail/${item.art_id}/${userId}/${item.slug}`}>View Shop</a>
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
                              <h4><Link to={`${process.env.PUBLIC_URL}/product/${item.slug}/${item.art_id}`}>{item.title}</Link></h4>
                              <p>By Ceci Tattoos</p>
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
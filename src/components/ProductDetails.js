import React, { useState, useEffect } from "react";
import Helmet from "react-helmet";
import { Layout } from "./Layout";
import { useDispatch,connect } from "react-redux";
import {getProfileFetch} from "../actions/auth"
import {getProductDetailsFetch} from "../actions/userActions"
import UserService from "../services/user.service";
import { useParams, Link, useNavigate } from "react-router-dom";

import Loader from "./Loader";
import swal from "sweetalert";

function ProductDetails ({currentUser, productDetail, loading }) {
  const navigate = useNavigate();
  const [productData, setProductData] = useState([]);
  const [quantity, setQuantity] = useState(1);
  const [finalImage, setFinalImage] = useState();

  // const [currentUser, setcurrentUser] = useState("");
  const ref = React.useRef(null);
  const dispatch = useDispatch();
  useEffect(() => {
    dispatch(getProfileFetch())
    dispatch(getProductDetailsFetch())
  }, [dispatch])
  
  useEffect(() => {
    console.log(productDetail);
    console.log('Printing product Details');
   
  });

  const Increment = () => {
    let _quantity = quantity + 1;
    setQuantity(_quantity);
  };

  const Decrement = () => {
    let _quantity = quantity - 1;
    if (_quantity > 0) {
      setQuantity(_quantity);
    }
  };

  const AddToCart = () => {

    let data = {
      buyer_id: currentUser?.id,
      seller_id: productData?.user_id,
      product_id: productData?.id,
      quantity: quantity,
      final_product_image: finalImage,
    };
    UserService.addToCart(data)
      .then((response) => {
        swal({
          title: "Added to Cart!",
          text: response.data.message,
          icon: "success",
          button: "Ok!",
        }).then((value) => {
          navigate(`/cart`);
        });
      })
      .catch((error) => {
        const _CoverError =
          (error.response &&
            error.response.data &&
            error.response.data.message) ||
          error.message ||
          error.toString();
        swal({
          title: "Error!",
          text: _CoverError,
          icon: "error",
          button: "Ok!",
        });
      });
  };

  return (
    <Layout>
      {productData ? (
        <Helmet>
          <title>{productData?.title}</title>
        </Helmet>
      ) : null}
      {loading ? <Loader /> : null}
      <div className="product_details_sec">
        <div className="container">
          <div className="row">
            <div className="col-lg-12">
              <div className="product_details_main">
                <div className="singel_product_image">
                  <ul>
                    <li>
                      <Link
                        to="./images/Toddler-Riding.jpg"
                        alt=""
                        className="image"
                        title=""
                      >
                        <img className="product_frame" src="https://poojas.sg-host.com/purple/backend-services/uploads/products/landscape.jpg" />
                      </Link>
                      <Link
                        to="./images/retro3.png"
                        alt=""
                        className="image"
                        title=""
                      >
					  	
              <img src={productData.art_photo_path} alt="" />
                      </Link>
                    </li>
                    <li>
                      <Link
                        to="./images/HXoibBrEOmdBu10n.jpg"
                        alt=""
                        className="image"
                        title=""
                      >
                        <div ref={ref} id={`htmlToImageVis_${productData.id}`} className={`htmlToImageVis ${productData.orientation}`}>
                          {/*<Link to="#"><img className="product_frame" src={productData.product_by_orientation ? (productData.product_by_orientation.product_image_full_path) : ("")} /><img src={productData.art_photo_path} alt="" /></Link>*/}
                          <Link to="#">
                            <img className="product_frame" src="http://146.190.226.38/backend-services/uploads/products/landscape.jpg" /><img src={productData.art_photo_path} alt="" />
                          </Link>
                        </div>
                      </Link>
                    </li>
                  </ul>
                </div>
                <div className="singel_product_details">
                  {productData?.title ? <h2>{productData?.title}</h2> : null}
                  <p>Designed and sold by {productData?.artist?.username}</p>
                  <span className="price">${productData?.price}</span>
                  <div className="quantity_btn">
                    <h4>quantity</h4>
                    <div className="quantity buttons_added">
                      <input
                        type="button"
                        defaultValue="-"
                        className="minus quantity_button"
                        onClick={Decrement}
                      />
                      <input
                        type="text"
                        step="1"
                        min="1"
                        max=""
                        name="quantity"
                        value={quantity}
                        title="Qty"
                        className="input-text qty text"
                        size="4"
                        pattern=""
                        inputMode=""
                      />
                      <input
                        type="button"
                        defaultValue="+"
                        className="plus quantity_button"
                        onClick={Increment}
                      />
                    </div>
                  </div>
                  <div className="cart_size_btn">
                    <button
                      type="button"
                      className="styles_button"
                      onClick={AddToCart}
                    >
                      <span className="iconBefore">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          fill="currentColor"
                        >
                          <circle cx="8" cy="20" r="2"></circle>
                          <circle cx="18" cy="20" r="2"></circle>
                          <path d="M19 17H7a1 1 0 01-1-.78L3.2 4H2a1 1 0 010-2h2a1 1 0 011 .78L7.8 15h10.4L20 6.78a1 1 0 012 .44l-2 9a1 1 0 01-1 .78z"></path>
                          <path d="M16 6h-2V4a1 1 0 00-2 0v2h-2a1 1 0 000 2h2v2a1 1 0 002 0V8h2a1 1 0 000-2z"></path>
                        </svg>
                      </span>
                      <span className="children">Add to cart</span>
                    </button>
                  </div>
                </div>
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
export default connect(mapStateToProps)(ProductDetails)

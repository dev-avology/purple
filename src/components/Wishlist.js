import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import { Layout } from "./Layout";
import Loader from "./Loader";
import UserService from "../services/user.service";

const Wishlist = () => {
    const [WishlistItems, setWishlistItems] = useState([]);
    const [WishlistError, setWishlistError] = useState([]);
    const [loading, setLoading] = useState(false);
    const [removed, setRemoved] = useState(false);
  
    const RemoveFromWishlist = (product_id, buyer_id) => {
      if (window.confirm("Are you sure to remove this product from Wishlist?")) {
        setLoading(true);
        let params = { product_id: product_id, buyer_id: buyer_id };
        UserService.removeFromWishlist(params).then(
          (response) => {
            setLoading(false);
            setRemoved(true)
          },
          (error) => {
            const _CartItems =
              (error.response &&
                error.response.data &&
                error.response.data.message) ||
              error.message ||
              error.toString();
            setLoading(false);
            console.log(_CartItems);
          }
        );
      }
    };
  
    useEffect(() => {
      setLoading(true);
      UserService.getWishlist().then(
        (response) => {
            setWishlistItems(response.data);
            setLoading(false);
        },
        (error) => {
          const _WishlistItems =
            (error.response &&
                error.response.data &&
                error.response.data.message) ||
                error.message ||
                error.toString();
  
            setWishlistError(_WishlistItems);
            setLoading(false);
        }
      );
      if(removed){
        setRemoved(false)
      }
    }, [removed]);

    return (
        <Layout>
      {loading ? <Loader /> : null}
      <div className="shopping_cart_sec">
        <div className="container">
          <div className="row">
            <div className="col-lg-10 offset-lg-1">
              <div className="shopping_cart">
                <h2>Your Shopping Wishlist</h2>
                {WishlistError ?? WishlistError}
                {WishlistItems.length > 0 ? (
                  <>
                    <table
                      className="shop_table shop_table_responsive cart"
                      cellSpacing="0"
                    >
                      <thead>
                        <tr>
                          <th className="product-remove">&nbsp;</th>
                          <th colSpan="2" className="product-thumbnail">
                            Item
                          </th>
                          <th className="product-price">Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        {WishlistItems?.map((item, idx) => (
                          <tr key={idx}>
                            <td className="product-remove">
                              <Link
                                to="#"
                                className="remove"
                                aria-label="Remove this item"
                                onClick={() =>
                                  RemoveFromWishlist(item.product_id, item.buyer_id)
                                }
                              >
                                ×
                              </Link>
                            </td>
                            <td className="product-thumbnail">
                              {item.final_product_image ? (
                                <>
                                  <Link to="#" className="images-container">
                                    <img
                                      width="300"
                                      height="300"
                                      src={item?.final_product_image}
                                      className="product-frame"
                                      alt=""
                                      loading=""
                                    />
                                    <img
                                      width="300"
                                      height="300"
                                      src={item?.product.art_photo_path}
                                      className="artwork-design"
                                      alt=""
                                      loading=""
                                    />
                                  </Link>
                                </>
                              ) : null}
                            </td>
                            <td className="product-name" data-title="Product">
                              <p>
                                <Link to="#">{item?.product.title}</Link>
                              </p>
                              <small>
                                Price: <span className="">$</span>
                                {item?.product.price}
                              </small>
                            </td>
                            <td className="product-price" data-title="Price">
                              <span className="amount">
                                <span className="">$</span>
                                {item?.product.price * item.quantity}
                              </span>
                            </td>
                          </tr>
                        ))}
                      </tbody>
                    </table>
                    </>
                ) : (
                  <><p>No product found.</p></>
                )}
              </div>
            </div>
          </div>
        </div>
      </div>
    </Layout>
    )
}  

export default Wishlist;
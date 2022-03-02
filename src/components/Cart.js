import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import { Layout } from "./Layout";
import Loader from "./Loader";
import UserService from "../services/user.service";
import { getCart } from '../actions/userActions';
import { useDispatch } from "react-redux";

const Cart = () => {
  const [CartItems, setCartItems] = useState([]);
  const [CartError, setCartError] = useState([]);
  const [loading, setLoading] = useState(false);
  const [removed, setRemoved] = useState(false);

  const RemoveFromCart = (product_id, buyer_id) => {
    if (window.confirm("Are you sure to remove this product from cart?")) {
      setLoading(true);
      let params = { product_id: product_id, buyer_id: buyer_id };
      UserService.removeFromCart(params).then(
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

  const DecrementCart = (product_id, buyer_id) => {
    setLoading(true);
    let params = { product_id: product_id, buyer_id: buyer_id };
    UserService.DecrementCart(params).then(
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
      }
    );
  }

  const IncrementCart = (product_id, buyer_id) => {
    setLoading(true);
    let params = { product_id: product_id, buyer_id: buyer_id };
    UserService.IncrementCart(params).then(
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
      }
    );
  }
  const dispatch = useDispatch();
  useEffect(() => {
    setLoading(true);
    dispatch(getCart())
    if(removed){
      setRemoved(false)
    }
  }, [removed, dispatch]);

  // useEffect(() => {
  //   setLoading(true);
  //   UserService.getCart().then(
  //     (response) => {
  //       setCartItems(response.data);
  //       setLoading(false);
  //     },
  //     (error) => {
  //       const _CartItems =
  //         (error.response &&
  //           error.response.data &&
  //           error.response.data.message) ||
  //         error.message ||
  //         error.toString();

  //       setCartError(_CartItems);
  //       setLoading(false);
  //     }
  //   );
  //   if(removed){
  //     setRemoved(false)
  //   }
  // }, [removed]);

  const Total = (props) => {
    const numbers = props.cartItem;
    let subTotal = numbers.reduce(
      (total, currentValue) =>
        (total = total + parseFloat(currentValue.product.price * currentValue.quantity)),
      0
    );
    const SubTotal = parseFloat(subTotal).toFixed(2)
    return (
      <>
        <th>{CartItems?.length} item</th>
        <td data-title="Subtotal">
          <span className="amount">
            <span className="">$</span>
            {SubTotal}
          </span>
        </td>
      </>
    );
  };

  return (
    <Layout>
      {loading ? <Loader /> : null}
      <div className="shopping_cart_sec">
        <div className="container">
          <div className="row">
            <div className="col-lg-10 offset-lg-1">
              <div className="shopping_cart">
                <h2>Your shopping cart</h2>
                {CartError ?? CartError}
                {CartItems.length > 0 ? (
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
                          <th className="product-quantity">Quantity</th>
                          <th className="product-price">Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        {CartItems?.map((item, idx) => (
                          <tr key={idx}>
                            <td className="product-remove">
                              <Link
                                to="#"
                                className="remove"
                                aria-label="Remove this item"
                                onClick={() =>
                                  RemoveFromCart(item.product_id, item.buyer_id)
                                }
                              >
                                ×
                              </Link>
                            </td>
                            <td className="product-thumbnail">
                              {item.final_product_image ? (
                                <Link to="#">
                                  <img
                                    width="300"
                                    height="300"
                                    src={item?.final_product_image}
                                    className=""
                                    alt=""
                                    loading=""
                                  />
                                </Link>
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
                            <td
                              className="product-quantity"
                              data-title="Quantity"
                            >
                              <div className="quantity buttons_added">
                                <button
                                  type="button"
                                  className="minus quantity_button"
                                  onClick={() =>
                                  DecrementCart(item.product_id, item.buyer_id)
                                }
                                >
                                  -
                                </button>
                                <input
                                  type="text"
                                  step="1"
                                  min="1"
                                  max=""
                                  name="quantity"
                                  value={item?.quantity}
                                  title="Qty"
                                  className="input-text qty text"
                                  size="4"
                                />
                                <button
                                  type="button"
                                  className="plus quantity_button"
                                  onClick={() =>
                                    IncrementCart(item.product_id, item.buyer_id)
                                  }
                                >
                                  +
                                </button>
                              </div>
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
                    <div className="cart-collaterals">
                      <div className="cart_totals">
                        <table cellSpacing="0" className="shop_table">
                          <tbody>
                            <tr>
                              <td colSpan="2" className="actions">
                                <div className="coupon">
                                  <input
                                    type="text"
                                    name="coupon_code"
                                    className="input-text"
                                    id="coupon_code"
                                    placeholder="Coupon code"
                                  />
                                  <button
                                    type="submit"
                                    className="button"
                                    name="apply_coupon"
                                  >
                                    Apply coupon
                                  </button>
                                </div>
                              </td>
                            </tr>
                            <tr className="cart-subtotal">
                              <Total cartItem={CartItems} />
                            </tr>
                            <tr className="cart-subtotal">
                              <th>Shipping</th>
                              <td data-title="Subtotal">
                                <span className="amount">
                                  <span className="">$</span>24.80
                                </span>
                              </td>
                            </tr>
                            <tr className="order-total">
                              <th>Subtotal</th>
                              <td data-title="Total">
                                <strong>
                                  <span className="amount">
                                    <span className="">$</span>101.84
                                  </span>
                                </strong>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <div className="cart_signup">
                          <div className="cart_pen_icon">
                            <svg
                              viewBox="0 0 240.14 228.74"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                d="M60.32 146.38a12.7 12.7 0 0 1-1.76-.82l-8.26 4.77-2.69 2-4.41 2.74-2.62 2.09-12.21 8.38a13 13 0 0 0 .73 2.36c2.17 4.07 3.42 4.64 7.47 2.46 5-2.66 9.69-5.69 14.5-8.6 2.41-1.46 4.74-3 7.15-4.5 1.76-1.08 3.79-2 5.37 0 1.8 2.26.29 4.16-1.56 5.45-4.88 3.41-9.82 6.75-14.86 9.92a69.91 69.91 0 0 1-8.78 4.61c-3.72 1.66-7.39 1.68-10.73-1.13-.71-.59-1.92-1.37-2.53-1.13-4.85 1.89-8.65-.73-12.63-2.66a33.39 33.39 0 0 0-2.67 4.51c-2.11 5.22-4.19 10.44-6.28 15.66 1.17.6 2.34 1.19 3.52 1.77l2.24 1.07c6.36 2.91 12.83 5.58 19.36 8.08 25.86 9.87 52.65 17 79 25.33 5.74-17.88 10.66-36 18.63-53.16 2.38-5.11 1.15-8-3.9-10.4-2.83-1.37-5.86-2.34-8.8-3.49z"
                                fill="#865cd0"
                              ></path>
                              <path
                                d="M178.71 1.08c6.72.66 11 5.29 10.58 11.72a54.28 54.28 0 0 1-1.65 7.64 11.33 11.33 0 0 1-5.45 5.56q-10.58 5.7-21.12 11.42l-20.77 3.24c-.5-4.46-1.52-5.08-5-2.65-6.32 4.43-11.67 9.88-15.16 16.81-1.81 3.59-2.85 7.57-4.24 11.37v-.06l-1 1.17c-1.32 1-2.6 2-4 2.86C100.81 76.71 90.44 83 80.43 89.82c-11.53 7.87-22.71 16.25-34.11 24.32a22.22 22.22 0 0 1-4.45 1.92c-4.33-10.82-7.76-21.86-8.53-33.58-1-15.26 3.08-28.91 13.38-40.38 2.12-2.35 5.1-3.92 7.69-5.85-.56 1.37-1.07 2.75-1.68 4.09C47.81 51 44.57 62.1 44.38 73.91c0 2.18-.42 5.32 2.93 5.39s2.85-3 3-5.23c1.19-13.52 3.71-26.65 11.25-38.29 1.08-1.66.44-2.77-.54-4 2.49-3.08 4.81-6.33 7.57-9.15 1.26-1.3 3.41-1.73 5.15-2.55-2.45 7.53-5.34 15-7.2 22.64-1.63 6.73-2.12 13.74-3 20.63-.24 1.77.15 3.45 2.22 3.86s3-1.14 3.37-2.85a44.72 44.72 0 0 0 .82-4.9c1.67-13.35 3.26-26.71 10.14-38.73.5-.87-.41-2.56-.67-3.88 11.72-10.32 24.94-12.26 39.44-7-7.12 4.46-14.76 8.28-21.27 13.51-12.15 9.76-17.38 23.53-19.77 38.53-.68 4.25 0 6.27 2.25 6.78 2.44.57 3.71-1 4.55-5.71 3-16.78 9.68-31.36 24.73-40.87 3.79-2.4 7.5-4.92 11.29-7.33 1.64-1 3-2.16 2.51-4.37 12.11-2.7 24.21-5.43 36.33-8.08 4-.88 8.1-1.65 12.19-2.24a22.45 22.45 0 0 1 4.81.29c-1.36.5-3.45.62-3.95 1.57-1.8 3.46-4.95 3.62-8 3.93a90.87 90.87 0 0 1-10.43.55c-2.31 0-3.28.91-3.71 2.9.5.51.79 1.07 1.2 1.16 8.34 2 16.4 1.62 23.83-3.12a6.49 6.49 0 0 0 3.29-6.27z"
                                fill="#eb9b5a"
                              ></path>
                              <path
                                d="M161.07 37.42L182.19 26a11.33 11.33 0 0 0 5.45-5.56c9.53-3.94 19.86-4.44 29.75-6.81 2.47-.59 3.74.55 4.87 2.36-2 5.65-1.25 7 4.84 8.65a7.56 7.56 0 0 1-1.6 6.9c-4.35 5.39-8.4 11-12.7 16.47a13.63 13.63 0 0 1-3.48 2.54c-3.17 2-6.38 4-9.57 6.05-2.88-9.78-8.63-17.89-14.9-25.7-.31-.38-.63-.95-1-1-1-.23-2.43-.68-3-.21a3.46 3.46 0 0 0-.86 3A11.54 11.54 0 0 0 182 36c5.15 7.55 10.9 14.75 13.61 23.69l-8.48 4.07c-.83-1.44-1.71-2.85-2.49-4.31A14 14 0 0 0 171 52.19c-6.94.76-11.26 5.46-15 10.52-3.57 4.78-6.31 10.16-9.67 15.1-4.58 6.72-9.12 13.58-16 18.29-16.57 11.38-33.24 22.63-49.81 34-7.39 5.07-14.66 10.3-22 15.46l-8.26 4.77c-.8-2.66-1-5.68-2.51-7.91-4.33-6.59-9.14-12.87-13.77-19.27l7.85-7.09a22.22 22.22 0 0 0 4.45-1.92c11.4-8.07 22.58-16.45 34.11-24.32C90.44 83 100.81 76.71 111 70.16c1.38-.88 2.66-1.9 4-2.86l1-1.17v.06l8.23-5c5.54-3.29 11.11-6.53 16.6-9.9a27 27 0 0 0 3.53-3.29 24.14 24.14 0 0 0 4.42-1.87c4.16-2.8 8.22-5.79 12.29-8.71z"
                                fill="#e1295a"
                              ></path>
                              <path
                                d="M58.56 145.56c7.33-5.16 14.6-10.39 22-15.46 16.57-11.37 33.24-22.62 49.81-34 6.86-4.71 11.4-11.57 16-18.29 3.36-4.94 6.1-10.32 9.67-15.1 3.77-5.06 8.09-9.76 15-10.52a14 14 0 0 1 13.58 7.27c.78 1.46 1.66 2.87 2.49 4.31a35.29 35.29 0 0 1 .28 24A99.13 99.13 0 0 1 155 134.12a58.41 58.41 0 0 1-30.47 12.58c-4.4.5-7 2.11-7.94 6.55-.64 2.89-2 5.63-3 8.44l-53.27-15.31a12.7 12.7 0 0 1-1.76-.82zm118.88-80.85a17.44 17.44 0 0 0 1.79 2.29c.64.57 1.69 1.42 2.18 1.23A2.93 2.93 0 0 0 183 66a5.38 5.38 0 0 0-1.08-3.15c-2.22-2.93-6.89-3.1-9.69-.49-5.59 5.18-4.41 18.16 2.07 22.1a6.82 6.82 0 0 0 3.7 1.25c1.37-.11 2.66-1.06 4.81-2-3.82-3-8.52-3.57-8.83-8.51-.3-3.9-1.44-7.98 3.46-10.49z"
                                fill="#eb9b5a"
                              ></path>
                              <path
                                d="M28.37 165.56a13 13 0 0 0 .73 2.36c2.17 4.07 3.42 4.64 7.47 2.46 5-2.66 9.69-5.69 14.5-8.6 2.41-1.46 4.74-3 7.15-4.5 1.76-1.08 3.79-2 5.37 0 1.8 2.26.29 4.16-1.56 5.45-4.88 3.41-9.82 6.75-14.86 9.92a69.91 69.91 0 0 1-8.78 4.61c-3.72 1.66-7.39 1.68-10.73-1.13-.71-.59-1.92-1.37-2.53-1.13-4.85 1.89-8.65-.73-12.63-2.66-3.79-5.92-7.75-11.75-11.25-17.83a10.88 10.88 0 0 1-1.13-6.71c.6-3.7 2.46-6.85 6.82-7.39 3.46.5 6.06 2.47 8.34 5a64.58 64.58 0 0 1 13.09 20.15zM123.15 10.39c.47 2.21-.87 3.33-2.51 4.37-3.79 2.41-7.5 4.93-11.29 7.33C94.3 31.6 87.64 46.18 84.62 63c-.84 4.66-2.11 6.28-4.55 5.71-2.21-.51-2.93-2.53-2.25-6.78 2.39-15 7.62-28.77 19.77-38.54 6.51-5.23 14.15-9 21.27-13.51z"
                                fill="#212121"
                              ></path>
                              <path
                                d="M28.37 165.56a64.58 64.58 0 0 0-13.09-20.19c-2.28-2.49-4.88-4.46-8.34-5L22.06 131c3.5 4.58 7.12 9.08 10.46 13.77 2.85 4 5.38 8.26 8.06 12.41z"
                                fill="#e1295a"
                              ></path>
                              <g fill="#212121">
                                <path d="M79.42 16.86c.26 1.32 1.17 3 .67 3.88-6.88 12-8.47 25.38-10.14 38.73a44.72 44.72 0 0 1-.82 4.9c-.41 1.71-1.2 3.28-3.37 2.85s-2.46-2.09-2.22-3.86c.92-6.89 1.41-13.9 3-20.63 1.86-7.68 4.75-15.11 7.2-22.64v.08l1-.86zM61.06 31.79c1 1.22 1.62 2.33.54 4-7.54 11.63-10.06 24.76-11.25 38.28-.19 2.22.37 5.31-3 5.23s-3-3.21-2.93-5.39c.15-11.81 3.39-22.91 8.31-33.57.61-1.34 1.12-2.72 1.68-4.09l1.14-1zM195.59 59.7c-2.71-8.94-8.46-16.14-13.59-23.7a11.54 11.54 0 0 1-2.06-3.36 3.46 3.46 0 0 1 .86-3c.61-.47 2 0 3 .21.4.09.72.66 1 1 6.27 7.81 12 15.92 14.9 25.7-.45 3.89-.65 4.05-4.11 3.15zM227.1 24.64c-6.09-1.69-6.82-3-4.84-8.65 3-1.75 5.93-3.54 9-5.22a6.51 6.51 0 0 1 3.22-1.14c1.67.09 3.79.25 4.84 1.28 1.64 1.6.72 3.8-.68 5.35-3.29 3.57-6.87 6.74-11.54 8.38zM34 123.15c4.63 6.4 9.44 12.68 13.77 19.27 1.47 2.23 1.71 5.25 2.51 7.91l-2.69 2a27 27 0 0 1-2.38-3c-2.63-4.52-4.87-9.3-7.82-13.6-2.36-3.44-5.54-6.33-8.36-9.46.37-3.8.37-3.8 4.97-3.12zM178.71 1.08a6.49 6.49 0 0 1-3.33 6.27c-7.43 4.74-15.49 5.14-23.83 3.12-.41-.09-.7-.65-1.2-1.16.43-2 1.4-2.94 3.71-2.9a90.87 90.87 0 0 0 10.43-.55c3.09-.31 6.24-.47 8-3.93C173 1 175.12.86 176.48.36a1.42 1.42 0 0 1 .86.12l1.3.67z"></path>
                              </g>
                              <path
                                d="M29.05 126.29c2.82 3.13 6 6 8.36 9.46 3 4.3 5.19 9.08 7.82 13.6a27 27 0 0 0 2.38 3l-4.41 2.74c-2.77-9.5-9-16.74-15.68-23.66-.94-1-2.95-1-4.46-1.4z"
                                fill="#e1295a"
                              ></path>
                              <path
                                d="M23.06 130c1.51.44 3.52.41 4.46 1.4 6.64 6.92 12.91 14.16 15.68 23.66l-2.62 2.09c-2.68-4.15-5.21-8.39-8.06-12.41-3.34-4.69-7-9.19-10.46-13.77z"
                                fill="#212121"
                              ></path>
                              <path
                                d="M178.64 1.15l-1.3-.67zM74.8 19.31l-1 .86zM55.52 35.28l-1.14 1z"
                                fill="#b74f33"
                              ></path>
                              <path
                                d="M124.13 61.15l-8.23 5c1.39-3.8 2.43-7.78 4.24-11.37C123.63 47.89 129 42.44 135.3 38c3.48-2.43 4.5-1.81 5 2.65l-.07.43c-7.5 4.98-13.12 11.46-16.1 20.07z"
                                fill="#212121"
                              ></path>
                              <path
                                d="M115.94 66.13l-1 1.17z"
                                fill="#1e144d"
                              ></path>
                              <path
                                d="M140.23 41.09l4.13 6.91a27 27 0 0 1-3.63 3.24c-5.49 3.37-11.06 6.61-16.6 9.9 2.98-8.6 8.6-15.08 16.1-20.05z"
                                fill="#eb9b5a"
                              ></path>
                              <path
                                d="M177.44 64.71c-4.9 2.51-3.76 6.59-3.51 10.5.31 4.94 5 5.54 8.83 8.51-2.15.93-3.44 1.88-4.81 2a6.82 6.82 0 0 1-3.69-1.22c-6.48-3.94-7.66-16.92-2.07-22.1 2.8-2.61 7.47-2.44 9.69.49A5.38 5.38 0 0 1 183 66a2.93 2.93 0 0 1-1.55 2.18c-.49.19-1.54-.66-2.18-1.23a17.44 17.44 0 0 1-1.83-2.24z"
                                fill="#212121"
                              ></path>
                            </svg>
                          </div>
                          <div className="cart-signup_text">
                            <p>Already have an account?</p>
                            <Link to={`${process.env.PUBLIC_URL}/signup`}>Sign Up</Link> /
                            <Link to={`${process.env.PUBLIC_URL}/login`}>Log In</Link>
                          </div>
                        </div>
                        <div className="gift_order">
                          <label className="gift_checkbox">
                            <svg
                              fill="none"
                              height="24"
                              viewBox="0 0 24 24"
                              width="24"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                clipRule="evenodd"
                                d="M4 4.5A3.5 3.5 0 0 0 4.338 6H2a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1v9a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-9h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2.338A3.5 3.5 0 0 0 16.5 1c-2.306 0-3.693 1.662-4.439 3.018a9.66 9.66 0 0 0-.061.113 9.66 9.66 0 0 0-.061-.113C11.193 2.662 9.806 1 7.5 1A3.5 3.5 0 0 0 4 4.5zM7.5 3a1.5 1.5 0 0 0 0 3h3.154a8.208 8.208 0 0 0-.468-1.018C9.557 3.838 8.694 3 7.5 3zm5.846 3H16.5a1.5 1.5 0 0 0 0-3c-1.194 0-2.057.838-2.686 1.982A8.208 8.208 0 0 0 13.346 6zM13 8v3h8V8zm-2 0v3H3V8zm2 13h6v-8h-6zm-2-8v8H5v-8z"
                                fill="#fff"
                                fillRule="evenodd"
                              ></path>
                            </svg>{" "}
                            This order is a gift
                            <input type="checkbox" />
                            <span className="checkmark"></span>
                          </label>
                        </div>

                        <div className="cart_checkout_stap">
                          <div id="checkout_stap_one" className="checkout_stap">
                            <span className="checkout_stap_number">1</span>
                            <button className="edit">EDIT</button>
                            <div className="checkout_stap_text">
                              <div id="checkout_shipping_text_one">
                                <h3>Shipping to India</h3>
                                <p>
                                  Delivers between 8 - 12 October Using Standard
                                  Shipping
                                </p>
                                <div className="shipped_responsibly">
                                  <svg
                                    viewBox="0 0 182.1 178.51"
                                    xmlns="http://www.w3.org/2000/svg"
                                  >
                                    <path
                                      d="M181.28 88.56c0 36.25-20.1 67.54-53.58 82.16s-75 4.36-102-18.8C-5.69 125.05-5.76 79.06 11.7 44 30.64 6 77.85-6.82 116.7 3.36c17.3 4.52 32.3 15.26 43.64 28.8 5.74 6.84 11.17 14.55 14.45 22.92 1.11 3.04 9.37 33.36 6.49 33.48z"
                                      fill="#ededf2"
                                    ></path>
                                    <g fill="#9cb">
                                      <path d="M180.63 104.65l-7.77 2.54a23.45 23.45 0 0 1-8.66.88 10.38 10.38 0 0 0-6.06 1.89 29.41 29.41 0 0 1-4.19 2.22c-1.83.75-3.77 1.24-5.61 2a12.26 12.26 0 0 1-5.35.47c-1.2-.08-2.36-.62-3.56-.82-2.06-.33-4.12-.65-6.2-.81a8.85 8.85 0 0 1-6.23-3.26 11.94 11.94 0 0 1-2.77-7.73 54.77 54.77 0 0 0-.31-6.14 36.26 36.26 0 0 0-1.8-7.55c-.88-2.64-1.86-5.25-2.92-7.82-1.35-3.29-2.81-6.53-4.24-9.78a62.34 62.34 0 0 1-3.75-9.74 21 21 0 0 1-.8-5.62c.07-2.2.09-4.41 0-6.62a26.73 26.73 0 0 1 1.53-9.34c.55-1.67.86-3.43 1.56-5a69.87 69.87 0 0 1 3.76-7.49 78 78 0 0 1 5.28-7.93 52.68 52.68 0 0 1 4.95-5.18 35.74 35.74 0 0 1 3.27-2.82 3.21 3.21 0 0 1 1.55-.51 12.6 12.6 0 0 1 8.27 2.24c3.08 1.94 6.28 3.67 9.3 5.68a49.91 49.91 0 0 1 13.53 13.1c1.88 2.71 3.79 5.4 5.45 8.24a53.69 53.69 0 0 1 3.43 7.25c1.11 2.77 2 5.63 2.94 8.46.81 2.43 1.6 4.86 2.34 7.31 1.08 3.59 2.21 7.18 3.13 10.82a57.08 57.08 0 0 1 1.16 7 32.83 32.83 0 0 1 .22 5.15c-.09 2.81-.42 5.62-.48 8.43a42.2 42.2 0 0 1-.86 8.53 14.37 14.37 0 0 0-.11 1.95zM91.68 178.51l-11.4-1q-3.9-.37-7.82-.87a49.1 49.1 0 0 1-10.38-2.77c-3.59-1.29-7.21-2.54-10.76-4a91.3 91.3 0 0 1-13.69-6.61c-2.08-1.26-4.27-2.37-6.28-3.74a72.62 72.62 0 0 1-7-5.28 44.36 44.36 0 0 1-8.08-9.11 9.64 9.64 0 0 1-1.6-4.67 32.37 32.37 0 0 1 1.48-11.4c.72-2.46 1.29-5 2-7.41a41.54 41.54 0 0 1 2.12-6.26c1.41-2.88 2.77-5.93 6.05-7.26a22.49 22.49 0 0 1 4.71-1.45 14.1 14.1 0 0 1 6.2 0 13.52 13.52 0 0 1 6.27 3.82c1.92 2 3.57 4.31 5.4 6.43 2.42 2.8 4 6.11 5.74 9.32a13.89 13.89 0 0 1 .88 2.24c.82 2.36 1.5 4.78 2.49 7.07a17.65 17.65 0 0 0 2.73 4.44 22.81 22.81 0 0 0 8.1 5.7c2.19 1 4.19 2.41 6.31 3.59 1.78 1 3.62 1.9 5.42 2.88 2.74 1.51 5.52 3 8.17 4.62a23.36 23.36 0 0 1 5.26 3.8c1.34 1.48 2.83 2.83 3.64 4.69.58 1.33 1.48 2.55 1.61 4.05s.73 3.25.32 4.94a5.09 5.09 0 0 1-4.78 4c-1 .06-2.11 0-3.16 0zM47.62 29.8v2a31.85 31.85 0 0 1-1.85 12c-.88 2.74-1.71 5.5-2.56 8.25-.54 1.76-1.16 3.5-1.62 5.28a8.68 8.68 0 0 0-.35 4.32 4.4 4.4 0 0 1-.54 2.58 32 32 0 0 1-2.36 4.39 42.94 42.94 0 0 1-2.87 3.47A12.11 12.11 0 0 1 34 74a30.36 30.36 0 0 1-3.4 2.54 19.5 19.5 0 0 1-8.8 3.33 30.81 30.81 0 0 1-4.07.52c-2.74-.14-5.45-.45-7.66-2.49a18.18 18.18 0 0 1-5.21-7.33 17.16 17.16 0 0 1-1.15-3.67 11.82 11.82 0 0 1 .48-3.65C5 59.67 5.82 56.1 6.8 52.56a42.79 42.79 0 0 1 2-4.91c1.32-3.07 2.52-6.2 4-9.19A32.3 32.3 0 0 1 21.19 28c1.8-1.51 3.39-3.25 5.17-4.78 3.85-3.29 7.51-6.81 11.79-9.56a9.5 9.5 0 0 1 5.48-1.82 3.08 3.08 0 0 0 .43 0c1.72-.3 1.76-.31 2.26 1.37A13.16 13.16 0 0 1 46.8 16c.15 1.76-.08 3.6.38 5.26.82 2.87.16 5.74.44 8.54z"></path>
                                    </g>
                                    <path
                                      d="M93.33 70.87a23 23 0 0 0 1.49-3.23 97.08 97.08 0 0 1 5.48-14.5c3-6.72 6.64-13 12.19-18a39.71 39.71 0 0 1 3.1-2.56 18.82 18.82 0 0 1 10.09-3.76 33.83 33.83 0 0 1 9.74.48 15.71 15.71 0 0 1 9.91 6.38 45.77 45.77 0 0 1 3.24 5.43 23.15 23.15 0 0 1 1.56 4.29c1.62 5.81 1.43 11.78 1.47 17.72a65.18 65.18 0 0 1-3.6 20.93 133.47 133.47 0 0 1-11.57 25.65c-5 8.62-10.39 17-16.1 25.19-3.07 4.41-6.09 8.83-9.5 13a6.65 6.65 0 0 1-7.63 2.42 29.35 29.35 0 0 1-6.81-3.06 206.89 206.89 0 0 1-26.26-17.63 296.64 296.64 0 0 1-23-20c-7.12-7.08-13.42-14.76-18-23.76-1-2-1.91-4.19-2.73-6.33A22.09 22.09 0 0 1 25.05 70c.16-1.91.43-3.81.57-5.72A15.4 15.4 0 0 1 29 55.81a29 29 0 0 1 13.15-9.94 21.71 21.71 0 0 1 9.62-1.09 36 36 0 0 1 13.12 4 101.49 101.49 0 0 1 15.83 10.44 57.34 57.34 0 0 1 10.44 9.85 14.92 14.92 0 0 0 2.17 1.8z"
                                      fill="#865cd0"
                                    ></path>
                                  </svg>
                                  <p>
                                    Made one at a time and shipped responsibly.
                                    For a happy planet.
                                  </p>
                                </div>
                              </div>
                              <div id="checkout_shipping_text_two">
                                <h3>When would you like your order by? </h3>
                                <p>
                                  Shipping to <Link to="#">INDIA</Link>
                                </p>
                                <p>Delivers between 8 - 12 October</p>
                                <Link className="checkout_btn" to="#">
                                  <span>
                                    Checkout <span>$101.84</span>
                                  </span>
                                </Link>
                                <p>Includes standard shipping</p>
                                <h5>
                                  <span>or</span>
                                </h5>
                                <p>Get it sooner 27 September</p>
                                <Link className="checkout_btn" to="#">
                                  <span>
                                    Checkout <span>$101.84</span>
                                  </span>
                                </Link>
                                <p>Includes express shipping</p>
                              </div>
                            </div>
                            <div className="continue_checkout_btn">
                              <Link className="continue_checkout" to="#">
                                Continue
                              </Link>
                            </div>
                          </div>
                          <div
                            id="checkout_stap_three"
                            className="checkout_stap"
                          >
                            <span className="checkout_stap_number">2</span>
                            <div className="checkout_stap_text">
                              <div id="checkout_shipping_details_one">
                                <h3>Shipping details</h3>
                              </div>
                              <div id="checkout_shipping_details_two">
                                <h3>What are the shipping details?</h3>
                                <form>
                                  <p>
                                    <label>Email Address</label>
                                    <input
                                      type="email"
                                      className="input-text"
                                      name=""
                                      placeholder="e.g. you@email.com"
                                    />
                                  </p>
                                  <span className="app-entries-cart">
                                    (For receipt and order confirmation)
                                  </span>
                                  <div className="offers">
                                    <label className="offers_checkbox">
                                      {" "}
                                      Also send me offers &amp; updates
                                      <input type="checkbox" />
                                      <span className="checkmark"></span>
                                    </label>
                                  </div>
                                  <h3>Delivery Details</h3>
                                  <p>
                                    <label>Name</label>
                                    <input
                                      type="text"
                                      className="input-text"
                                      name=""
                                      placeholder="e.g. John Smith"
                                    />
                                  </p>
                                  <p>
                                    <label>Phone Number</label>
                                    <input
                                      type="number"
                                      className="input-text"
                                      name=""
                                      placeholder="e.g. 123-456-7890"
                                    />
                                  </p>
                                  <p>
                                    <label>Street Address</label>
                                    <input
                                      type="text"
                                      className="input-text"
                                      name=""
                                      placeholder="e.g. 111 Sutter St"
                                    />
                                  </p>
                                  <p>
                                    <label>Street Address 2 (optional)</label>
                                    <input
                                      type="text"
                                      className="input-text"
                                      name=""
                                      placeholder="Apartment, suite, unit, building, floor, etc."
                                    />
                                  </p>
                                  <p>
                                    <label>ZIP or Postcode</label>
                                    <input
                                      type="text"
                                      className="input-text"
                                      name=""
                                      placeholder="e.g. 94104"
                                    />
                                  </p>
                                  <p>
                                    <label>City or Suburb</label>
                                    <input
                                      type="text"
                                      className="input-text"
                                      name=""
                                      placeholder="e.g. San Francisco"
                                    />
                                  </p>
                                  <p>
                                    <label>State, Region or Province</label>
                                    <input
                                      type="text"
                                      className="input-text"
                                      name=""
                                      placeholder="e.g. California"
                                    />
                                  </p>
                                  <p className="continue_btn">
                                    <Link
                                      className="continue_button btn"
                                      to="#"
                                    >
                                      Continue
                                    </Link>
                                  </p>
                                </form>
                              </div>
                            </div>
                          </div>

                          <div
                            id="checkout_stap_four"
                            className="checkout_stap"
                          >
                            <span className="checkout_stap_number">3</span>
                            <div className="checkout_stap_text">
                              <div id="checkout_credit_card_one">
                                <h3>Review and pay</h3>
                              </div>
                              <div id="checkout_credit_card_two">
                                <h3>What are your credit card details?</h3>
                                <span>
                                  <svg
                                    fill=""
                                    stroke=""
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="-404 579.5 32 32"
                                  >
                                    <path d="M-375.9 585.1h-24.2c-1.6 0-2.9 1.3-2.9 2.9v15c0 1.6 1.3 2.9 2.9 2.9h24.2c1.6 0 2.9-1.3 2.9-2.9v-15c0-1.6-1.3-2.9-2.9-2.9zm-6.3 16.3h-7.1v-.8h7.1v.8zm4.2 0h-3.3v-.8h3.3v.8zm0-2.1h-11.2v-.8h11.2v.8zm4.2-6.3h-28.3v-4.2h28.3v4.2z"></path>
                                  </svg>
                                </span>
                                <form className="credit_card_form">
                                  <p>
                                    <label>Credit Card Number</label>
                                    <input
                                      type="text"
                                      className="input-text"
                                      name="cardnumber"
                                      placeholder="1234 1234 1234 1234"
                                    />
                                  </p>
                                  <p className="exp-date">
                                    <label>Expiry Date</label>
                                    <input
                                      type="text"
                                      className="input-text"
                                      name="exp-date"
                                      placeholder="MM / YY"
                                    />
                                  </p>
                                  <p className="cvc">
                                    <label>CVC</label>
                                    <input
                                      type="text"
                                      className="input-text"
                                      name="cvc"
                                      placeholder="CVC"
                                    />
                                  </p>
                                  <div className="offers">
                                    <label className="offers_checkbox">
                                      Same billing &amp; shipping info
                                      <input type="checkbox" />
                                      <span className="checkmark"></span>
                                    </label>
                                  </div>
                                </form>
                                <ul>
                                  <li>
                                    <span>3 ITEMS</span>
                                    <span>$77.04</span>
                                  </li>
                                  <li>
                                    <span>SHIPPING</span>
                                    <span>$24.80</span>
                                  </li>
                                  <li>
                                    <span>TOTAL</span>
                                    <span>$101.84</span>
                                  </li>
                                </ul>
                                <p>
                                  By clicking pay, I agree to Redbubble’s{" "}
                                  <Link to="#">User Agreement</Link>
                                </p>
                                <button type="submit" className="btn">
                                  Pay <span>$101.84</span>
                                </button>
                                <ul className="Pay_icon">
                                  <li>
                                    <Link to="#">
                                      <img
                                        src="images/visac9f74d1d54e61ab2c748f45a4bdface0.png"
                                        alt=""
                                      />
                                    </Link>
                                  </li>
                                  <li>
                                    <Link to="#">
                                      <img
                                        src="images/mastercard1fcd14928245139962b72f9368bdbe32.png"
                                        alt=""
                                      />
                                    </Link>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </>
                ) : (
                  <><p>No product found.</p> </>
                )}
              </div>
            </div>
          </div>
        </div>
      </div>
    </Layout>
  );
};

export default Cart;

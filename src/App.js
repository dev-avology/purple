import React, { useEffect } from "react";
import { useDispatch } from "react-redux";
import {
  BrowserRouter as Router,
  Routes,
  Route,
} from 'react-router-dom'

import {Home} from "./components/Home"
import Login from "./components/Login"
import Register from "./components/Register"
import Dashboard from "./components/Dashboard"
import Account from "./components/Account"
import Archive from "./components/Archive"
import AddNewWok from "./components/AddNewWok"
import {NotFound} from "./components/NotFound"
import { clearMessage } from "./actions/message";
import { history } from "./helpers/history";
import ProductDetails from "./components/ProductDetails";
import Cart from "./components/Cart"
import Wishlist from "./components/Wishlist"

const App = () => {
  const dispatch = useDispatch();
  useEffect(() => {
    history.listen((location) => {
      dispatch(clearMessage()); // clear message when changing location
    });
  }, [dispatch]);


  return (
    <Router history={history}>
      <Routes>
        <Route exact path={`${process.env.PUBLIC_URL}/`} element={<Home/>} />
        <Route exact path={`${process.env.PUBLIC_URL}/login`} element={<Login/>} />
        <Route exact path={`${process.env.PUBLIC_URL}/signup`} element={<Register/>} />
        <Route exact path={`${process.env.PUBLIC_URL}/dashboard`} element={<Dashboard/>} />
        <Route exact path={`${process.env.PUBLIC_URL}/account`} element={<Account/>} />
        <Route exact path={`${process.env.PUBLIC_URL}/product-category/:slug`} element={<Archive/>} />
        <Route exact path={`${process.env.PUBLIC_URL}/product/:slug/:art_id`} element={<ProductDetails/>} />
        <Route exact path={`${process.env.PUBLIC_URL}/add-new-work`} element={<AddNewWok/>} />
        <Route exact path={`${process.env.PUBLIC_URL}/cart`} element={<Cart/>} />
        <Route exact path={`${process.env.PUBLIC_URL}/wishlist`} element={<Wishlist/>} />
        <Route exact path={`${process.env.PUBLIC_URL}/*`} element={<NotFound/>} />
      </Routes>
    </Router>
  )
}

export default App

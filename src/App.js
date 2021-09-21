import React, { Component } from "react";
import { BrowserRouter, Route  } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
import "./App.css";
import Signup from "./components/SignUp/SignUp";
import Signin from "./components/SignIn/SignIn";
import Home from "./components/Home/Home";
import Header from './components/Header';
import Footer from './components/Footer';

export default class App extends Component {
  render() {
    const login = localStorage.getItem("isLoggedIn");

    return (
      <div className="App">
      {login ? (
        <BrowserRouter>
          <Header />
          <Route exact path={`${process.env.REACT_APP_BASE_URL}/`} component={Home}></Route>
          <Route path={`${process.env.REACT_APP_BASE_URL}/signin`} component={Signin}></Route>
          <Route path={`${process.env.REACT_APP_BASE_URL}/signup`} component={Signup}></Route>
          <Footer />
        </BrowserRouter>
      ) : (
        <BrowserRouter>
          <Header />
          <Route exact path={`${process.env.REACT_APP_BASE_URL}/`} component={Home}></Route>
          <Route path={`${process.env.REACT_APP_BASE_URL}/signin`} component={Signin}></Route>
          <Route path={`${process.env.REACT_APP_BASE_URL}/signup`} component={Signup}></Route>
          <Footer />
        </BrowserRouter>
      )}
      </div>
    );
  }
}
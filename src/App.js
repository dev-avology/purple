import React, { Component } from "react";
import { BrowserRouter, HashRouter, Route  } from 'react-router-dom';
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
        <BrowserRouter basename="/purple">
          <Header />
          <HashRouter exact path="/" component={Home}></HashRouter>
          <HashRouter path="/signin" component={Signin}></HashRouter>
          <HashRouter path="/signup" component={Signup}></HashRouter>
          <Footer />
        </BrowserRouter>
      ) : (
        <BrowserRouter basename="/purple">
          <Header />
          <HashRouter exact path="/" component={Home}></HashRouter>
          <HashRouter path="/signin" component={Signin}></HashRouter>
          <HashRouter path="/signup" component={Signup}></HashRouter>
          <Footer />
        </BrowserRouter>
      )}
      </div>
    );
  }
}
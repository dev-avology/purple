import React, { Component } from "react";
import { NavLink } from 'react-router-dom';


export default class Navigation extends Component {
   state = {
      navigate: false,
    };
   onLogoutHandler = () => {
      localStorage.clear();
      this.setState({
        navigate: true,
      });
    };
   render() {

      return(
         <ul>
            <li>
               <div className="search_design_form">
                  <input type="text" placeholder="Search design and products" name="search" />
                  <button className="submit_btn" type="submit"><img src="images/search_icon.png" alt="" /></button>
               </div>
            </li>
            <li><a href="#">Sell your art</a></li>
            <li><NavLink to={`${process.env.PUBLIC_URL}/signin`}>Login</NavLink></li> 
            <li><NavLink to={`${process.env.PUBLIC_URL}/signup`}>Signup</NavLink></li> 
            <li>
               <a href="#"> <img className="color_icon" src="images/heart_icon.png" alt="" /></a>
            </li>
            <li>
               <a href="cart.html"><img className="color_icon" src="images/cart_icon.png" alt="" /></a>
            </li>
         </ul>
      )
   }
}
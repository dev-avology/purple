import React from "react";
import { NavLink } from 'react-router-dom';
import LogoImg from '../logo.png';

const Logo = () => {
    return (
       <NavLink to={`${process.env.PUBLIC_URL}/`}><img src={LogoImg} alt="site-logo" /></NavLink>
    );
}
 
export default Logo;
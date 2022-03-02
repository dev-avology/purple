import React, {Component} from "react"
import { Helmet } from 'react-helmet'

import Header from "./Header"
import Footer from "./Footer"
export const Layout = ({children}) => (
  <>
    <Header/>
    <Helmet>
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossOrigin="anonymous" />
    </Helmet>
      {children}
    <Footer/>
  </>
)
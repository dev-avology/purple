import * as React from "react"
import 'bootstrap/dist/css/bootstrap.min.css'
import "../assets/style.css"
import "../assets/responsive.css"
import Header from "./Header"
import Footer from "./Footer"

const Layout = ({ children }) => {
return (
    <>
    <Header />
    { children }
    <Footer />
    </>
    );
}
export default Layout
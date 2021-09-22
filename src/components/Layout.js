import * as React from "react"
import 'bootstrap/dist/css/bootstrap.min.css'
import "../assets/style.css"
import "../assets/responsive.css"
import Header from "./Header"

const Layout = ({ children }) => {
return (
    <>
    <Header />
    { children }
    
    </>
    );
}
export default Layout
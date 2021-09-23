import * as React from "react"
import 'bootstrap/dist/css/bootstrap.min.css'
import "src/assets/style.css"
import "src/assets/responsive.css"
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
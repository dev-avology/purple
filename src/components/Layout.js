import React, {Component} from "react"
import 'bootstrap/dist/css/bootstrap.min.css'
import "src/assets/style.css"
import "src/assets/responsive.css"
import Header from "./Header"
import Footer from "./Footer"

export default class Account extends Component {
  componentDidMount() {
   
  }
  constructor(props) {
    super(props);
  }

    render() {
        return (
            <>
            <Header />
            {this.props.children}
            <Footer />
            </>
            );
        }
}
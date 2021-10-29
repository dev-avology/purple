import React, {Component} from "react"
import { Helmet } from 'react-helmet'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'react-owl-carousel2/lib/styles.css'
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
            <Helmet>
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
              <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            </Helmet>
            <Header />
            {this.props.children}
            <Footer />
            </>
            );
        }
}
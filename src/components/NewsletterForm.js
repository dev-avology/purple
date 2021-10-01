import React from "react"
import { StaticImage } from "gatsby-plugin-image"
export const Newsletter = () => {
    return(
        <>
            <div className="subscribe_sec">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-12">
                            <div className="subscriber">
                                <h2>10% off, promos, and the best indie art ever!</h2>
                                <div className="subscriber_form">
                                    <input title="email" className="" type="email" placeholder="Your Email Address" required="" />
                                    <button className="submit_btn" type="submit"><StaticImage src="../images/subscriber_icon.png" alt=""/></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}
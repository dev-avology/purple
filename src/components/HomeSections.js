import * as React from "react"
import { StaticImage } from "gatsby-plugin-image"

export const Banner = () => {
    return (
        <div className="hero_banner_sec">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-12">
                            <div className="hero_banner_inner">
                                <StaticImage className="d-block w-100" src="../images/hero_banner.jpg" alt="" />
                                <div className="hero_banner_text">
                                    <h1>Awesome products designed by independent <span>artists</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    )
}
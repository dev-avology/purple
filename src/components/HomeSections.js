import * as React from "react"
import { StaticImage } from "gatsby-plugin-image"
import { getAllCategories } from "src/components/ApiStore"

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

export const ProductRange = () => {
    return (
        <div className="product_range_sec">
            <div className="container">
                <h2>Our Product Range</h2>
                <div className="row">
                    <div className="col-lg-4 col-md-6">
                        <div className="product_range_item">
                            <StaticImage src="../images/product_range1.png" alt="" />
                            <div className="product_range">
                                <div className="product_range_icon">
                                <StaticImage src="../images/68129deeec381d27c0d6e8f8da6a574d.svg" alt="" />
                                </div>
                                <div className="product_range_text">
                                    <h4>Weirdly meaningful art</h4>
                                    <p>Millions of designs on over 70 high quality products.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-lg-4 col-md-6">
                        <div className="product_range_item">
                            <StaticImage src="../images/product_range2.png" alt=""/>
                            <div className="product_range">
                                <div className="product_range_icon">
                                <StaticImage src="../images/a2d6efe99675cfe8ee95482c330c7b3a.svg" alt="" />
                                </div>
                                <div className="product_range_text">
                                    <h4>Purchases pay artists</h4>
                                    <p>Money goes directly into a creative person's pocket.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-lg-4 col-md-6">
                        <div className="product_range_item">
                            <StaticImage src="../images/product_range3.png" alt=""/>
                            <div className="product_range">
                                <div className="product_range_icon">
                                <StaticImage src="../images/b9ece6b82b94d96961142b8b0c2071e7.svg" alt="" />
                                </div>
                                <div className="product_range_text">
                                    <h4>Socially responsible production</h4>
                                    <p>We're investing in programs to offset all carbon emissions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}


export const ProductSection = () => {

const [product, setProducts] = React.useState([]);

React.useEffect(() => {

    getAllCategories()
    .then(result => {
        setProducts(result.data);
    })
    .catch(error => {
        // Handle/report error
    })

  }, []);

  const products = product?.map((item) =>
    <div key={item.id} className="col-lg-4 col-md-6">
        <div className="our_product_item">
            <img src={item.image} alt="" />
            <div className="our_product_btn">
                <a href="wall-art.html">{item.name}</a>
            </div>
        </div>
    </div>
  )

  return (
    <div className="our_product_sec">
    <div className="container">
        <div className="row">
            {products}
        </div>
    </div>
</div>
  )
}
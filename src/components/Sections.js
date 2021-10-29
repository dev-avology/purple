import * as React from "react"
import { StaticImage } from "gatsby-plugin-image"
import { getAllCategories, FeaturedProducts } from "src/components/ApiStore"
import { Link } from "gatsby"
import OwlCarousel from "react-owl-carousel2"

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
                <Link to={`/product-category/${item.slug}`}>{item.name}</Link>
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


export const FeaturedProduct = () => {

    const [product, setProducts] = React.useState([]);
    
    React.useEffect(() => {
    
        FeaturedProducts()
        .then(result => {
            setProducts(result.data);
        })
        .catch(error => {
            // Handle/report error
        })
    
      }, []);
    
      const products = product?.map((item) =>
        <li key={item.id}>
            <div className="featured_products_item">
                <img src={item.art_photo_path} alt="" />
                <h4>{item.name}</h4>
                <p>by {item.artist.first_name ? ( `${item.artist.first_name}${item.artist.last_name ? (` ${item.artist.last_name}`) : null}` ) : (item.artist.username)}</p>
                <span>From $ {item.price}</span>
            </div>
        </li>
      )
    
      return (
        <div className="featured_products_sec">
            <div className="container">
                <div className="row">
                    <div className="col-lg-12">
                        <div className="featured_products">
                            <h2>Featured Products</h2>
                            <ul>
                                {products}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      )
    }

    export const CategoryRangeSlider = () => {
        const ref = React.useRef('car')
        const options = {
                    loop: true,
                    margin: 15,
                    nav: true,
                    responsive: {
                        0: {
                            items: 2,
                            nav: false,
                        },
                        600: {
                            items: 3,
                            nav: false,
                        },
                        1000: {
                            items: 5,
                        },
                    },
                }

        const [category, setCategories] = React.useState([])

        React.useEffect(() => {
        
            getAllCategories()
            .then(result => {
                setCategories(result.data);
            })
            .catch(error => {
                // Handle/report error
            })
        
          }, []);
        
          return (
            <>{category.length > 0  ? (
                <div className="our_range">
                    <h2>Our range</h2>
                    <OwlCarousel id="range_slider" ref={ref} options={options}>
                        {category?.map((item) =>
                            <div key={item.id} className="item">
                                <div className="our_range_item">
                                    <Link to={`/product-category/${item.slug}`}>
                                        <img src={item.image} alt="" />
                                        <p>{item.name}</p>
                                    </Link>
                                </div>
                            </div>
                        )}
                    </OwlCarousel>
                </div>) : (false)}
            </>
          )
        }
import React from "react"
import { Helmet } from 'react-helmet'
import Layout from "src/components/Layout"
import {CategoryRangeSlider} from "src/components/Sections"
import { Link } from "gatsby"
export default function Archive({ pageContext: { category } }) {
  return (
    <Layout>
      <Helmet>
        <title>{category.name} | Splashen</title>
      </Helmet>
      <div className="art_category_sec">
        <div className="container">
          <div className="row">
            <div className="col-lg-3 col-md-4">
              <div className="art_category_list">
                <h2>Filters </h2>
              </div>    
            </div> 
            <div className="col-lg-9 col-md-8">
              <div className="art_category">
                <h2>{category.name}</h2>
                {category.content ? (<p>{category.content}</p>) : (false)}
                  <CategoryRangeSlider />
                <div className="results_main">
                  <div className="results">
                      <h3>{category.name} <span>{category.products.length > 0 ? (category.products.length + ' Results') : (false)} </span></h3>
                  </div>
                  <div className="results_select_form">
                      <select className="form-control border-0" id="exampl-drp">
                        <option>Most Relevant</option>
                        <option>Trending</option>
                        <option>Newest</option>
                        <option>Best Selling</option>
                      </select>
                  </div>
                </div>
                {category.products.length > 0 ? (
                <div className="art_category_inner">
                  <div className="row">
                    {category.products?.map((item) =>
                      <div key={item.id} className="col-lg-4 col-sm-6">
                        <div className="art_category_item">
                          <div className="art_category_item_img">
                              <Link to="#"><img src={item.art_photo_path} alt="" /></Link>
                              <div className="art_category_item_hover">
                                  <Link className="shop_btn" to="#">View Shop</Link>
                                  <Link className="heart" to="#"><i className="fa fa-heart" aria-hidden="true"></i></Link>
                              </div>
                          </div>
                          <div className="art_category_item_text">
                            <h4><Link to="#">{item.title}</Link></h4>
                            <p>By Ceci Tattoos</p>
                            <span className="price">${item.price}</span>
                          </div>
                        </div>
                      </div>
                    )}
                  </div>
                </div> 
                ) : (<div className="notfound-text"><p>No products found!</p></div>)}
              </div> 
            </div>
          </div>
        </div>
      </div>
      <ul>
      
      </ul>
    </Layout>
  )
}
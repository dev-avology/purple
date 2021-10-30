import React from "react"
import { Helmet } from 'react-helmet'
import Layout from "src/components/Layout"
import { toPng } from 'html-to-image'
import {CategoryRangeSlider} from "src/components/Sections"
import { Link } from "gatsby"
export default function Archive({ pageContext: { category } }) {
  const category1 = {
    "id": 9,
    "name": "Wall Art",
    "slug": "wall-art",
    "content": "Test Test Test Test Test Test Test Test Test Test",
    "created_at": "2021-10-27T13:09:10.000000Z",
    "updated_at": "2021-10-27T13:09:10.000000Z",
    "image": "https://poojas.sg-host.com/purple/backend-services/uploads/category-images/our_product1.png",
    "designs": [
        {
            "id": 1,
            "user_id": 1,
            "art_id": "3zPD6qouwC",
            "category_id": 9,
            "title": "this is test title",
            "slug": "this-is-test-title",
            "tags": "test,iphone,phone",
            "description": "Test Product",
            "art_photo_path": "https://poojas.sg-host.com/purple/backend-services/uploads/artwork-images/1929417363profile-dummy.png",
            "price": "10.00",
            "artwork_media_id": "1",
            "is_mature_content": 1,
            "is_public": 1,
            "is_approved": 1,
            "is_featured": 1,
            "created_at": "2021-10-08T06:15:43.000000Z",
            "updated_at": "2021-10-08T06:15:43.000000Z",
            "product": {
              "id": 1,
              "title": "Frame",
              "slug": "frame-IIz9opAL2b",
              "sku": "PFBJSHYY2021H",
              "status": "in_stock",
              "product_image": "https://poojas.sg-host.com/purple/backend-services/uploads/products/1408182471stock-photo-bamboo-blank-frame-as-an-exotic-de.jpg",
              "category": "0",
              "sub_category": "9",
              "price": 34,
              "created_at": "2021-10-30T06:25:25.000000Z",
              "updated_at": "2021-10-30T06:25:25.000000Z"
          }
        }
      ]
    }
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
                {category.designs.length > 0 ? (
                <div className="art_category_inner">
                  <div className="row">
                    {category1.designs?.map((item) => {
                      return (
                        <>{item.art_photo_path} {item.product.title}
                          <div>{item.product.title}</div>
                        </>
                      )
                    })}
                    {category.designs?.map((item) => {
                          return(
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
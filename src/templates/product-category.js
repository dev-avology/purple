import React from "react"
import { Helmet } from 'react-helmet'
import Layout from "src/components/Layout"
import { Link } from "gatsby"
export default function ProductCategory({ pageContext: { ProductCategory } }) {
  return (
    <Layout>
      <Helmet>
        <title>Product Categories | Splashen</title>
      </Helmet>
      <div className="our_product_sec">
        <div className="container">
          <div className="row">
            {ProductCategory.map((item) =>
              <div key={item.id} className="col-lg-4 col-md-6">
                <div className="our_product_item">
                    <img src={item.image} alt="" />
                    <div className="our_product_btn">
                        <Link to={`/product-category/${item.slug}`}>{item.name}</Link>
                    </div>
                </div>
              </div>
            )}
          </div>
        </div>
      </div>
    </Layout>
  )
}
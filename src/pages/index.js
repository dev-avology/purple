import * as React from "react"
import { Helmet } from 'react-helmet';
import Layout from "src/components/Layout"
import {Banner,ProductRange, ProductSection, FeaturedProduct} from "src/components/Sections"
// markup
const IndexPage = () => {
  return (
      <Layout>
          <Helmet>
            <title>Home | Splashen</title>
          </Helmet>
          <Banner />
          <ProductRange />
          <ProductSection />
          <FeaturedProduct />
      </Layout>
  )
}

export default IndexPage

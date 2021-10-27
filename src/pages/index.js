import * as React from "react"
import { Helmet } from 'react-helmet';
import Layout from "src/components/Layout"
import {Banner,ProductRange, ProductSection} from "src/components/HomeSections"
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
      </Layout>
  )
}

export default IndexPage

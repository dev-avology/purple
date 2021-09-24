import * as React from "react"
import { Helmet } from 'react-helmet';
import Layout from "src/components/Layout"
import {Banner,ProductRange} from "src/components/HomeSections"
// markup
const IndexPage = () => {
  return (
      <Layout>
          <Helmet>
            <title>Home | Splashen</title>
          </Helmet>
          <Banner />
          <ProductRange />
      </Layout>
  )
}

export default IndexPage

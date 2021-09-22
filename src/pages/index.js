import * as React from "react"
import Layout from "../components/Layout"

// markup
const IndexPage = () => {
  return (
      <Layout>
      {process.env.NODE_ENV}
      {process.env.GATSBY_API_URL}
      </Layout>
  )
}

export default IndexPage

import React from "react"
import Layout from "../components/layout"
import { login, isAuthenticated, getProfile } from "../hooks/UserAuth"

const Account = () => {
    if (!isAuthenticated()) {
      login()
      return null
    }
  
    const user = getProfile()
    return (
      <Layout>
        {user.name}
      </Layout>
)
}

export default Account
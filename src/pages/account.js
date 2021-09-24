import React from "react"
import Layout from "src/components/Layout"
import { login, isAuthenticated, getProfile } from "src/hooks/UserAuth"

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
import React from "react"
import Login from 'src/components/Login'
import { account, isAuthenticated } from "src/hooks/UserAuth"
import Layout from "src/components/layout"

const LoginPage = () => {
  
  if (isAuthenticated()) {
    account()
    return null
  }
  return (
    <Layout>
        <Login />
    </Layout>
  )
}

export default LoginPage
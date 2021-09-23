import React from "react"
import Login from '../components/Login'
import { account, isAuthenticated } from "../hooks/UserAuth"
import Layout from "../components/layout"

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
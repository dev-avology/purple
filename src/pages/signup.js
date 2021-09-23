import React from "react"
import Signup from '../components/Signup'
import { account, isAuthenticated } from "../hooks/UserAuth"
import Layout from "../components/layout"

const SignupPage = () => {
  
  if (isAuthenticated()) {
    account()
    return null
  }
  return (
    <Layout>
        <Signup />
    </Layout>
  )
}

export default SignupPage
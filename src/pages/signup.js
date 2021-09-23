import React from "react"
import Signup from 'src/components/Signup'
import { account, isAuthenticated } from "src/hooks/UserAuth"
import Layout from "src/components/Layout"

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
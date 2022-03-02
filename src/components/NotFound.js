import React from 'react'
import { Link } from 'react-router-dom'
import Helmet from 'react-helmet'
import { Layout } from "./Layout"
export const NotFound = () => (
    <Layout>
        <Helmet>
            <title>Oops! | Page not found</title>
        </Helmet>
        <h1>404</h1>
        <Link to="/">Return to Home</Link>
    </Layout>
)

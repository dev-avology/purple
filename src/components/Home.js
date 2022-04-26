import React from 'react'
import Helmet from 'react-helmet'
import { Layout } from "./Layout"
import {Banner, ProductRange, ProductSection, FeaturedProduct, PurpleArtist, ExploreDesign} from "./HomepageSections"
export const Home = () => (
    <Layout>
        <Helmet>
            <title>Home | Splashen</title>
        </Helmet>
        <Banner/>
        <ProductRange />
        <ProductSection />
        <FeaturedProduct />
        <ExploreDesign />
        <PurpleArtist />
    </Layout>
)

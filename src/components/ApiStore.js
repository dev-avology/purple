
import { CurrentUserToken } from "src/hooks/UserAuth"
import axios from 'axios'
          
export const getArtworkMedia = () => {
    let token = CurrentUserToken()
    token = JSON.parse(token)
    return axios.get(process.env.GATSBY_API_URL+'/api/get-artwork-media', {
        headers: {
            Accept: 'application/json',
            Authorization: 'Bearer '+token.token
        }
    })
}

export const getDesignCount = () => {
    let token = CurrentUserToken()
    token = JSON.parse(token)
    return axios.get(process.env.GATSBY_API_URL+'/api/get-designs-count', {
        headers: {
            Accept: 'application/json',
            Authorization: 'Bearer '+token.token
        }
    })
}

export const getAllCategories = () => {
    return axios.get(process.env.GATSBY_API_URL+'/api/get-all-categories', {
        headers: {
            Accept: 'application/json',
        }
    })
}


export const FeaturedProducts = () => {
    return axios.get(process.env.GATSBY_API_URL+'/api/get-featured-products', {
        headers: {
            Accept: 'application/json',
        }
    })
}

import { combineReducers } from 'redux'

import postsReducer from './postsReducer'
import userReducer, {productDetailReducer, getFeaturedProductsReducer, getFanArtReducer, getExploreDesignReducer, getDesignCountReducer} from './userReducer'
import auth from "./auth"
import message from "./message"

const rootReducer = combineReducers({
    cats: postsReducer,
    currentUser: userReducer,
    productDetail:productDetailReducer,
    featuredProducts: getFeaturedProductsReducer,
    fanArts: getFanArtReducer,
    exploreDesign: getExploreDesignReducer,
    designCount: getDesignCountReducer,
    auth,
  message,
})

export default rootReducer

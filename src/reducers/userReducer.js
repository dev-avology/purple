import * as actions from '../actions/types'

export const initialState = {
  currentUser: [] ,
  featuredProducts : []
}

export const initialState1 = {
  featuredProducts : []
}
export const initialState2 = {
  fanArts : []
}
export const initialState3 = {
 exploreDesign : []
}
export const initialState4 = {
  cart : []
 }
 export const initialState5 = {
  designCount : []
 }
export const productInitialState = {
  loading: false,
  hasErrors: false,
  productDetail: [],
}

export default function userReducer(state = initialState, action) {

  switch (action.type) {
      case actions.CURRENT_USER:
      return { currentUser: action.payload }
    default:
      return state
  }
}


export  function productDetailReducer(state = initialState, action) {

  switch (action.type) {
    case actions.GET_PRODUCT_DETAILS:
      return { ...state, loading: true }
    case actions.GET_PRODUCT_DETAILS_SUCCESS:
      return { productDetail: action.payload, loading: false, hasErrors: false }
    case actions.GET_PRODUCT_DETAILS_FAILURE:
      return { ...state, loading: false, hasErrors: true }
     
    default:
      return state
  }
}

export function getFeaturedProductsReducer(state = initialState1, action) {
  console.log(action.type)
  switch (action.type) {
      case actions.GET_FEATURE_PRODUCTS:
      return { featuredProducts: action.payload }
    default:
      return state
  }
}

export function getFanArtReducer(state = initialState2, action) {
  switch (action.type) {
      case actions.GET_FAN_ARTS:
      return { fanArts: action.payload }
    default:
      return state
  }
}

export function getExploreDesignReducer(state = initialState3, action) {
  switch (action.type) {
      case actions.GET_EXPLORE_DESIGNS:
      return { exploreDesign: action.payload }
    default:
      return state
  }
}

export function getcartReducer(state = initialState4, action) {
  switch (action.type) {
      case actions.GET_CART:
      return { cart: action.payload }
    default:
      return state
  }
}

export function getDesignCountReducer(state = initialState5, action) {
  switch (action.type) {
      case actions.GET_DESIGN_COUNT:
      return { cart: action.payload }
    default:
      return state
  }
}
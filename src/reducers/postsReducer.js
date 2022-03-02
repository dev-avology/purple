import * as actions from '../actions/types'

export const initialState = {
  loading: false,
  hasErrors: false,
  cats: [],
}

export default function postsReducer(state = initialState, action) {

  switch (action.type) {
    case actions.GET_CATEGORIES:
      return { ...state, loading: true }
    case actions.GET_CATEGORIES_SUCCESS:
      return { cats: action.payload, loading: false, hasErrors: false }
    case actions.GET_CATEGORIES_FAILURE:
      return { ...state, loading: false, hasErrors: true }

     
    default:
      return state
  }
}

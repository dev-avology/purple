import {GET_CATEGORIES, GET_CATEGORIES_SUCCESS, GET_CATEGORIES_FAILURE} from "./types.js";
const apiURL = "http://146.190.226.38/backend-services";
export const getCat = () => ({ type: GET_CATEGORIES })
export const getCatSuccess = cats => ({
  type: GET_CATEGORIES_SUCCESS,
  payload: cats,
})
export const getCatFailure = () => ({ type: GET_CATEGORIES_FAILURE })

export function fetchCats() {
  return async dispatch => {
    dispatch(getCat())

    try {
      const response = await fetch(apiURL+'/api/get-all-categories', {headers:{Accept: 'application/json'}})
      const data = await response.json()
      dispatch(getCatSuccess(data))
    } catch (error) {
      dispatch(getCatFailure())
    }
  }
}

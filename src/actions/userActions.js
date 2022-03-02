import {
  GET_PRODUCT_DETAILS,
  GET_PRODUCT_DETAILS_SUCCESS,
  GET_PRODUCT_DETAILS_FAILURE,
  GET_FEATURE_PRODUCTS,
  GET_FAN_ARTS,
  GET_EXPLORE_DESIGNS,
  GET_CART,
  GET_DESIGN_COUNT,
} from "./types.js";
import UserService from "../services/user.service";

export const getProdDetail = () => ({ type: GET_PRODUCT_DETAILS });
export const getProdDetailSuccess = (data) => ({
  type: GET_PRODUCT_DETAILS_SUCCESS,
  payload: data,
});
export const getProdDetailFailure = () => ({
  type: GET_PRODUCT_DETAILS_FAILURE,
});

export function getProductDetailsFetch() {
  return async (dispatch) => {
    dispatch(getProdDetail());

    try {
      const response = UserService.getProductDetail();
      // const data = await response.json()
      dispatch(getProdDetailSuccess(response));
    } catch (error) {
      dispatch(getProdDetailFailure());
    }
  };
}

export const getFeaturedProducts = () => (dispatch) => {
  UserService.getFeaturedProducts().then((data) => {
    dispatch({
      type: GET_FEATURE_PRODUCTS,
      payload: data,
    });
  });
};

export const getFanArt = () => (dispatch) => {
  UserService.getFanartMadeByArtist().then((data) => {
    dispatch({
      type: GET_FAN_ARTS,
      payload: data,
    });
  });
};

export const getExploreDesign = () => (dispatch) => {
  UserService.getExploreDesign().then((data) => {
    dispatch({
      type: GET_EXPLORE_DESIGNS,
      payload: data,
    });
  });
};

export const getCart = () => (dispatch) => {
  UserService.getCart().then((data) => {
    dispatch({
      type: GET_CART,
      payload: data,
    });
  });
};

export const getDesignCount = () => (dispatch) => {
  UserService.getDesignCount().then((data) => {
    dispatch({
      type: GET_DESIGN_COUNT,
      payload: data,
    });
  });
};

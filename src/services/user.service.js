import axios from "axios";
import authHeader from "./auth-header";
const apiURL = "http://146.190.226.38/backend-services";
// Wiil be removed
const getUserData = () => {
  return axios.get(apiURL+"/api/get-user-data", { mode: 'no-cors', headers: authHeader() });
};

const getDesignCount = () => {
  return axios.get(apiURL+"/api/get-designs-count", { mode: 'no-cors', headers: authHeader() });
};

const getFeaturedProducts = () => {
  return axios.get(apiURL + "/api/get-featured-products");
};

const getAllCategories = () => {
  return axios.get("http://146.190.226.38/backend-services/api/get-all-categories", {mode: 'no-cors' });
};

const UpdateProfileData = (data) => {
  return axios.post(apiURL + "/api/save-user-profile", data, {headers: authHeader()});
}

const ChangePassword = (data) => {
  return axios.post(apiURL + "/api/change-password", data, {headers: authHeader()});
}

const getArtworkMedia = () => {
  return axios.get(apiURL + "/api/get-artwork-media", { headers: authHeader() });
}

const saveWishlist = (data) => {
  return axios.post(apiURL + "/api/save-wishlist", data, { headers: authHeader() });
}

const getProductDetail = async () => {
  const response = await axios.get(apiURL+'/api/get-single-product', {params: data}, { headers: authHeader() })
    const data = await response.json()
    console.log(data)
      return data
    }

const getCart = () => {
  return axios.get(apiURL + "/api/get-cart?is_wishlist_product=0", {headers: authHeader()});
}

const getWishlist = () => {
  return axios.get(apiURL + "/api/get-cart?is_wishlist_product=1", {headers: authHeader()});
}

const removeFromCart = (params) => {
  return axios.get(apiURL + "/api/remove-from-cart", {params: params, headers: authHeader()});
}

const DecrementCart = (params) => {
  return axios.get(apiURL + "/api/decrement-cart", {params: params, headers: authHeader()});
}

const IncrementCart = (params) => {
  return axios.get(apiURL + "/api/increment-cart", {params: params, headers: authHeader()});
}

const removeFromWishlist = (params) => {
  return axios.get(apiURL + "/api/remove-from-wishlist", {params: params, headers: authHeader()});
}

const saveArtwork = (data) => {
  return axios.post(apiURL + "/api/save-art-work", data, { headers: authHeader() });
}

const addToCart = (data) => {
  return axios.post(apiURL + "/api/save-cart", data, { headers: authHeader() });
}

const getExploreDesign = () => {
  return axios.get(apiURL + "/api/get-explore-design");
};

const getFanartMadeByArtist = () => {
  return axios.get(apiURL + "/api/fanart-madeby-artist");
};

const UserService = {
  getUserData,
  getDesignCount,
  getFeaturedProducts,
  getAllCategories,
  UpdateProfileData,
  getArtworkMedia,
  saveWishlist,
  getProductDetail,
  getCart,
  removeFromCart,
  saveArtwork,
  getWishlist,
  addToCart,
  removeFromWishlist,
  ChangePassword,
  DecrementCart,
  IncrementCart,
  getExploreDesign,
  getFanartMadeByArtist,
};

export default UserService;

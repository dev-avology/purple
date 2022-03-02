import axios from "axios";
import authHeader from "./auth-header";

// Wiil be removed
const getUserData = () => {
  return axios.get(process.env.REACT_APP_API_URL+"/api/get-user-data", { headers: authHeader() });
};

const getDesignCount = () => {
  return axios.get(process.env.REACT_APP_API_URL+"/api/get-designs-count", { headers: authHeader() });
};

const getFeaturedProducts = () => {
  return axios.get(process.env.REACT_APP_API_URL + "/api/get-featured-products");
};

const getAllCategories = () => {
  return axios.get(process.env.REACT_APP_API_URL + "/api/get-all-categories");
};

const UpdateProfileData = (data) => {
  return axios.post(process.env.REACT_APP_API_URL + "/api/save-user-profile", data, {headers: authHeader()});
}

const ChangePassword = (data) => {
  return axios.post(process.env.REACT_APP_API_URL + "/api/change-password", data, {headers: authHeader()});
}

const getArtworkMedia = () => {
  return axios.get(process.env.REACT_APP_API_URL + "/api/get-artwork-media", { headers: authHeader() });
}

const saveWishlist = (data) => {
  return axios.post(process.env.REACT_APP_API_URL + "/api/save-wishlist", data, { headers: authHeader() });
}

const getProductDetail = async () => {
  const response = await axios.get(process.env.REACT_APP_API_URL+'/api/get-single-product', {params: data}, { headers: authHeader() })
    const data = await response.json()
    console.log(data)
      return data
    }

const getCart = () => {
  return axios.get(process.env.REACT_APP_API_URL + "/api/get-cart?is_wishlist_product=0", {headers: authHeader()});
}

const getWishlist = () => {
  return axios.get(process.env.REACT_APP_API_URL + "/api/get-cart?is_wishlist_product=1", {headers: authHeader()});
}

const removeFromCart = (params) => {
  return axios.get(process.env.REACT_APP_API_URL + "/api/remove-from-cart", {params: params, headers: authHeader()});
}

const DecrementCart = (params) => {
  return axios.get(process.env.REACT_APP_API_URL + "/api/decrement-cart", {params: params, headers: authHeader()});
}

const IncrementCart = (params) => {
  return axios.get(process.env.REACT_APP_API_URL + "/api/increment-cart", {params: params, headers: authHeader()});
}

const removeFromWishlist = (params) => {
  return axios.get(process.env.REACT_APP_API_URL + "/api/remove-from-wishlist", {params: params, headers: authHeader()});
}

const saveArtwork = (data) => {
  return axios.post(process.env.REACT_APP_API_URL + "/api/save-art-work", data, { headers: authHeader() });
}

const addToCart = (data) => {
  return axios.post(process.env.REACT_APP_API_URL + "/api/save-cart", data, { headers: authHeader() });
}

const getExploreDesign = () => {
  return axios.get(process.env.REACT_APP_API_URL + "/api/get-explore-design");
};

const getFanartMadeByArtist = () => {
  return axios.get(process.env.REACT_APP_API_URL + "/api/fanart-madeby-artist");
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
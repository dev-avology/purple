import axios from "axios";
import authHeader from "./auth-header";

const register = (name, email, password, role) => {
    return axios.post(process.env.REACT_APP_API_URL+'/api/register', {
      name,
      email,
      password,
      role,
    });
  };
  
const login = (email, password) => {
return axios
    .post(process.env.REACT_APP_API_URL+'/api/login', {
    email,
    password,
    })
    .then((response) => {
    if (response.data.token) {
      localStorage.setItem("user", JSON.stringify(response.data));
    }
    return response;
    });
};

const logout = () => {
  localStorage.removeItem("user");
  return axios.get(process.env.REACT_APP_API_URL+"/api/logout", { headers: authHeader() })
};



const getProfileFetch = async () => {
  const response = await fetch(process.env.REACT_APP_API_URL+'/api/get-user-data', { method: "GET", headers: authHeader()})
      const data = await response.json()
        return data
      }


 


export default {
register,
login,
logout,
getProfileFetch,
};
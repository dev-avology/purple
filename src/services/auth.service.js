import axios from "axios";
import authHeader from "./auth-header";
const apiURL = "https://poojas.sg-host.com/purple/backend-services";
const register = (name, email, password, role) => {
    return axios.post(apiURL+'/api/register', {
      name,
      email,
      password,
      role,
    });
  };
  
const login = (email, password) => {
return axios
    .post(apiURL+'/api/login', {
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
  return axios.get(apiURL+"/api/logout", { headers: authHeader() })
};



const getProfileFetch = async () => {
  const response = await fetch(apiURL+'/api/get-user-data', { method: "GET", headers: authHeader()})
      const data = await response.json()
        return data
      }


 


export default {
register,
login,
logout,
getProfileFetch,
};
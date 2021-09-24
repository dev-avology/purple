import { navigate } from "gatsby"
import axios from 'axios';
// ...
const isBrowser = typeof window !== "undefined"

const auth = isBrowser

// insert after auth const
const tokens = {
  accessToken: false,
  idToken: false,
  expiresAt: false,
}

let user = {}

export const isAuthenticated = () => {
  if (!isBrowser) {
    return;
  }

  return localStorage.getItem("isLoggedIn") === "true"
}

export const CurrentUserToken = () => {
  if (!isBrowser) {
    return;
  }

  return localStorage.getItem("userData")
}

export const login = () => {
  if (!isBrowser) {
    return
  }
  navigate("/login")
  //auth.authorize()

}

export const account = () => {
    if (!isBrowser) {
      return
    }
    navigate("/account")
    //auth.authorize()
  
  }

const setSession = (cb = () => {}) => (err, authResult) => {
  if (err) {
    navigate("/")
    cb()
    return
  }

  if (authResult && authResult.accessToken && authResult.idToken) {
    let expiresAt = authResult.expiresIn * 1000 + new Date().getTime()
    tokens.accessToken = authResult.accessToken
    tokens.idToken = authResult.idToken
    tokens.expiresAt = expiresAt
    user = authResult.idTokenPayload
    localStorage.setItem("isLoggedIn", true)
    navigate("/account")
    cb()
  }
}
  
  export const handleAuthentication = () => {
    if (!isBrowser) {
      return;
    }
    
    auth.parseHash(setSession())
  }
  
  export const getProfile = async () => {
    let token = CurrentUserToken()
    token = JSON.parse(token)
    
    try {
      const resp = await axios.get(process.env.GATSBY_API_URL+"/api/get-user-data", {
      headers: {
        Accept: 'application/json',
        Authorization: 'Bearer '+token.token
      }
    })
    //console.log(resp);
    user = resp.data
  } catch (err) {
    // Handle Error Here
    
  }
  //console.log(JSON.stringify(user));
  return JSON.parse(JSON.stringify(user))
  //console.log(resp)
    /*.then(function (response) {
       return response.data
    }) .catch((error) => {
      console.log(error);
      
    })*/

  }
  
  export const logout = () => {
    let token = CurrentUserToken()
    token = JSON.parse(token)
    console.log('Bearer '+ token.token);
    
    /*axios.get(process.env.GATSBY_API_URL+"/api/logout", {
        params: {
          Accept: 'application/json',
          Authorization: 'Barear'+ token.token
        }
      })
      .then(function (response) {
        console.log(response)
        localStorage.setItem("isLoggedIn", false)
        localStorage.setItem("userData", false)
      })
*/
    //navigate("/login")
    //auth.logout()
  }
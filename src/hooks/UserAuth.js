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

}

export const account = () => {
    if (!isBrowser) {
      return
    }
    navigate("/dashboard")
  
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
    navigate("/dashboard")
    cb()
  }
}
  
  export const handleAuthentication = () => {
    if (!isBrowser) {
      return;
    }
    
    auth.parseHash(setSession())
  }
  
  export const getProfile = () => {
    let token = CurrentUserToken()
    token = JSON.parse(token)
    
    try {
      const resp = axios.get(process.env.GATSBY_API_URL+"/api/get-user-data", {
        headers: {
          Accept: 'application/json',
          Authorization: 'Bearer '+token.token
        }
        }).then(resp1 => resp1)
        return resp
    } catch (err) {

    }

  }
  
  export const logout = () => {
    let token = CurrentUserToken()
    token = JSON.parse(token)
    axios.get(process.env.GATSBY_API_URL+"/api/logout", {
      headers: {
          Accept: 'application/json',
          Authorization: 'Bearer '+ token.token
        }
      })
      .then(function (response) {
        localStorage.setItem("isLoggedIn", false)
        localStorage.setItem("userData", false)
        window.location.href = "/login"
      })

      
    //auth.logout()
  }
import { navigate } from "gatsby"

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
  
  export const getProfile = () => {
    user = {name: 'test'}
    return user
  }
  
  export const logout = () => {
    localStorage.setItem("isLoggedIn", false)
    navigate("/login")
    //auth.logout()
  }
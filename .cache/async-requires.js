// prefer default export if available
const preferDefault = m => (m && m.default) || m

exports.components = {
  "component---src-pages-404-js": () => import("./../../../src/pages/404.js" /* webpackChunkName: "component---src-pages-404-js" */),
  "component---src-pages-account-js": () => import("./../../../src/pages/account.js" /* webpackChunkName: "component---src-pages-account-js" */),
  "component---src-pages-add-new-work-js": () => import("./../../../src/pages/add-new-work.js" /* webpackChunkName: "component---src-pages-add-new-work-js" */),
  "component---src-pages-change-password-js": () => import("./../../../src/pages/change_password.js" /* webpackChunkName: "component---src-pages-change-password-js" */),
  "component---src-pages-dashboard-js": () => import("./../../../src/pages/dashboard.js" /* webpackChunkName: "component---src-pages-dashboard-js" */),
  "component---src-pages-index-js": () => import("./../../../src/pages/index.js" /* webpackChunkName: "component---src-pages-index-js" */),
  "component---src-pages-login-js": () => import("./../../../src/pages/login.js" /* webpackChunkName: "component---src-pages-login-js" */),
  "component---src-pages-signup-js": () => import("./../../../src/pages/signup.js" /* webpackChunkName: "component---src-pages-signup-js" */)
}


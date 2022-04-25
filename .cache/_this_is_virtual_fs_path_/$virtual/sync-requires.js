
// prefer default export if available
const preferDefault = m => (m && m.default) || m


exports.components = {
  "component---src-pages-404-js": preferDefault(require("C:\\xampp2\\htdocs\\purple\\src\\pages\\404.js")),
  "component---src-pages-account-js": preferDefault(require("C:\\xampp2\\htdocs\\purple\\src\\pages\\account.js")),
  "component---src-pages-add-new-work-js": preferDefault(require("C:\\xampp2\\htdocs\\purple\\src\\pages\\add-new-work.js")),
  "component---src-pages-change-password-js": preferDefault(require("C:\\xampp2\\htdocs\\purple\\src\\pages\\change_password.js")),
  "component---src-pages-dashboard-js": preferDefault(require("C:\\xampp2\\htdocs\\purple\\src\\pages\\dashboard.js")),
  "component---src-pages-index-js": preferDefault(require("C:\\xampp2\\htdocs\\purple\\src\\pages\\index.js")),
  "component---src-pages-login-js": preferDefault(require("C:\\xampp2\\htdocs\\purple\\src\\pages\\login.js")),
  "component---src-pages-signup-js": preferDefault(require("C:\\xampp2\\htdocs\\purple\\src\\pages\\signup.js"))
}


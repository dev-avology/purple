const axios = require("axios")
exports.createPages = async ({ actions: { createPage } }) => {
    await axios.get(`https://poojas.sg-host.com/purple/backend-services/api/get-all-categories`, {
        headers: {
            Accept: 'application/json',
        }
    }).then(ProductCat => {
        const  ProductCategory = ProductCat.data
        createPage({
            path: `/product-category`,
            component: require.resolve("./src/templates/product-category.js"),
            context: { ProductCategory },
        })

        ProductCategory.forEach(category => {
            createPage({
              path: `/product-category/${category.slug}/`,
              component: require.resolve("./src/templates/archive.js"),
              context: { category },
            })
          })
    }).catch(error => {

    })

    createPage({
      path: `/design/`,
      matchPath: "/design/:art_id/:slug",
      component: require.resolve("./src/templates/single-design.js"),
    })

}
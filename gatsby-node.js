const axios = require("axios")
const get = endpoint => axios.get(`https://pokeapi.co/api/v2${endpoint}`)
const getPokemonData = names =>
  Promise.all(
    names.map(async name => {
      const { data: pokemon } = await get(`/pokemon/${name}`)
      return { ...pokemon }
    })
  )
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
            console.log(category)
            createPage({
              path: `/product-category/${category.slug}/`,
              component: require.resolve("./src/templates/archive.js"),
              context: { category },
            })
          })
    }).catch(error => {

    })

}
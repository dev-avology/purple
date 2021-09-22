import React from "react"
import { StaticImage } from "gatsby-plugin-image"

const Search = () => {
    return (
        <>
<div className="search_design_form">
    <input type="text" placeholder="Search design and products" name="search" />
    <button className="submit_btn" type="submit"><StaticImage alt="" src="../images/search_icon.png"  /></button>
</div>
</>
    )
}
export default Search;
import React from "react"
import { Link } from "gatsby"
const PrimaryMenu = () => {
    return (
        <>
            <div className="nav-main">
                <Link to="/" className="closebtn" onClick="closeNav()">×</Link>
                <ul className="menu1 text-center">
                    <li className="active"><Link to="fan-art.html">Wall Art</Link></li>
                    <li><Link to="new-works.html">Art Board Prints </Link></li>
                    <li><Link to="new-works.html">Art Prints</Link></li>
                    <li><Link to="new-works.html">Canvas Prints</Link></li>
                    <li><Link to="new-works.html">Framed Prints</Link></li>
                    <li><Link to="new-works.html">Metal Prints</Link></li>
                    <li><Link to="new-works.html">Mounted Prints</Link></li>
                    <li><Link to="new-works.html">Photographic Prints</Link></li>
                    <li><Link to="new-works.html">Posters</Link></li>
                </ul>
            </div>
        </>
    )
}
export default PrimaryMenu;
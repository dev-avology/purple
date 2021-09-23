import React from "react"
import { Link } from "gatsby"
const PrimaryMenu = () => {
    return (
        <>
            <div className="nav-main">
                <Link to="#" className="closebtn">×</Link>
                <ul className="menu1 text-center">
                    <li className="active"><Link to="#">Wall Art</Link></li>
                    <li><Link to="#">Art Board Prints </Link></li>
                    <li><Link to="#">Art Prints</Link></li>
                    <li><Link to="#">Canvas Prints</Link></li>
                    <li><Link to="#">Framed Prints</Link></li>
                    <li><Link to="#">Metal Prints</Link></li>
                    <li><Link to="#">Mounted Prints</Link></li>
                    <li><Link to="#">Photographic Prints</Link></li>
                    <li><Link to="#">Posters</Link></li>
                </ul>
            </div>
        </>
    )
}
export default PrimaryMenu;
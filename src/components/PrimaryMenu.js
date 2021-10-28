import React from "react"
import { Link } from "gatsby"
import { getAllCategories } from "src/components/ApiStore"
const PrimaryMenu = () => {

const [menuItem, setMenu] = React.useState([]);

React.useEffect(() => {

    getAllCategories()
    .then(result => {
        setMenu(result.data);
    })
    .catch(error => {
        // Handle/report error
    })

  }, []);

  const listItems = menuItem?.map((item) =>
    <li key={item.id}><Link to="#">{item.name}</Link></li>
  );

    return (
        <>
            <div className="nav-main">
                <Link to="#" className="closebtn">×</Link>
                <ul className="menu1 text-center">
                    {listItems}
                </ul>
            </div>
        </>
    )
}
export default PrimaryMenu;
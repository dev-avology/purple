import React, { useEffect, useState } from "react"
import { connect } from 'react-redux'
import { Link } from "react-router-dom"
import { fetchCats } from '../actions/postsActions'
import Loader from "./Loader"
const PrimaryMenu = ({ dispatch, loading, cats, hasErrors, closeMenu }) => {
    useEffect(() => {
      dispatch(fetchCats())
    }, [dispatch])
  
    const [toggle, setToggle] = useState('0')
    const renderCats = () => {
      //if (loading) return <p>Loading posts...</p>
      if (hasErrors) return <p>Unable to display Menu.</p>
  
      return cats.map(cat =>
           <li key={cat.id} class={window.location.pathname === '/product-category/'+cat.slug ? 'active': ''}><a href={`/product-category/${cat.slug}`}>{cat.name}</a></li>)
    }
    return (
        <>
        {loading ? <Loader /> : null}
            <div className="nav-main">
                <Link to="#" className="closebtn" onClick={closeMenu}>×</Link>
                <ul className="menu1 text-center">
                    {renderCats()}
                </ul>
            </div>
        </>
      )
    }
    const mapStateToProps = state => ({
        loading: state.cats.loading,
        cats: state.cats.cats,
        hasErrors: state.cats.hasErrors,
      })
      
export default connect(mapStateToProps)(PrimaryMenu)
      
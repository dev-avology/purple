import React, { useEffect } from "react"
import { connect } from 'react-redux'
import { Link } from "react-router-dom"
import { fetchCats } from '../actions/postsActions'
import Loader from "./Loader"
const PrimaryMenu = ({ dispatch, loading, cats, hasErrors }) => {
    useEffect(() => {
      dispatch(fetchCats())
    }, [dispatch])
  
    const renderCats = () => {
      //if (loading) return <p>Loading posts...</p>
      if (hasErrors) return <p>Unable to display Menu.</p>
  
      return cats.map(cat =>
           <li key={cat.id}><Link to={`/product-category/${cat.slug}`}>{cat.name}</Link></li>)
    }
    return (
        <>
        {loading ? <Loader /> : null}
            <div className="nav-main">
                <Link to="#" className="closebtn">×</Link>
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
      
import React, { useState, useEffect } from "react";
import { useSelector } from 'react-redux'
import { Link } from "react-router-dom";
import UserService from "../services/user.service";
import BannerImage from "../assets/images/hero_banner.jpg";
import Image1 from "../assets/images/product_range1.png";
import Image1_1 from "../assets/images/68129deeec381d27c0d6e8f8da6a574d.svg";
import Image2 from "../assets/images/product_range2.png";
import Image2_2 from "../assets/images/a2d6efe99675cfe8ee95482c330c7b3a.svg";
import Image3 from "../assets/images/product_range3.png";
import Image3_2 from "../assets/images/b9ece6b82b94d96961142b8b0c2071e7.svg";
import Artist1 from "../assets/images/purple_artist1.png";
import Artist2 from "../assets/images/purple_artist2.png";
import Artist3 from "../assets/images/purple_artist3.png";
import Artist4 from "../assets/images/purple_artist4.png";
import {
  TabContent,
  TabPane,
  Nav,
  NavItem,
  NavLink,
  Card,
  Button,
  CardTitle,
  CardText,
  Row,
  Col,
} from "reactstrap";
import classnames from "classnames";
import { fetchCats } from '../actions/postsActions';
import { getFeaturedProducts, getExploreDesign, getFanArt } from '../actions/userActions';
import { connect } from 'react-redux';
import { useDispatch } from "react-redux";
export const Banner = () => {  
  return (
    <div className="hero_banner_sec">
      <div className="container">
        <div className="row">
          <div className="col-lg-12">
            <div className="hero_banner_inner">
              <img className="d-block w-100" src={BannerImage} alt="" />
              <div className="hero_banner_text">
                <h1>
                  Awesome products designed by independent <span>artists</span>
                </h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export const ProductRange = () => {
  return (
    <div className="product_range_sec">
      <div className="container">
        <h2>Our Product Range</h2>
        <div className="row">
          <div className="col-lg-4 col-md-6">
            <div className="product_range_item">
              <img src={Image1} alt="" />
              <div className="product_range">
                <div className="product_range_icon">
                  <img src={Image1_1} alt="" />
                </div>
                <div className="product_range_text">
                  <h4>Weirdly meaningful art</h4>
                  <p>Millions of designs on over 70 high quality products.</p>
                </div>
              </div>
            </div>
          </div>
          <div className="col-lg-4 col-md-6">
            <div className="product_range_item">
              <img src={Image2} alt="" />
              <div className="product_range">
                <div className="product_range_icon">
                  <img src={Image2_2} alt="" />
                </div>
                <div className="product_range_text">
                  <h4>Purchases pay artists</h4>
                  <p>Money goes directly into a creative person's pocket.</p>
                </div>
              </div>
            </div>
          </div>
          <div className="col-lg-4 col-md-6">
            <div className="product_range_item">
              <img src={Image3} alt="" />
              <div className="product_range">
                <div className="product_range_icon">
                  <img src={Image3_2} alt="" />
                </div>
                <div className="product_range_text">
                  <h4>Socially responsible production</h4>
                  <p>
                    We're investing in programs to offset all carbon emissions.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export const ProductSection = ({ cats }) => {
  const [Products, setProducts] = useState([]);
  const dispatch = useDispatch();
  useEffect(() => {
    dispatch(fetchCats())
  }, [dispatch])

  const renderCats = Products.map((cat) => (
    <div key={cat.id} className="col-lg-4 col-md-6">
      <div className="our_product_item">
        <img src={cat.image} alt="" />
        <div className="our_product_btn">
          <Link to={`${process.env.PUBLIC_URL}/product-category/${cat.slug}`}>
            {cat.name}
          </Link>
        </div>
      </div>
    </div>
  ));

  return (
    <div className="our_product_sec">
      <div className="container">
        <div className="row">{renderCats}</div>
      </div>
    </div>
  );
};

export const FeaturedProduct = () => {
  const { isLoggedIn } = useSelector(state => state.auth);
  const [userId, setUserId] = useState();
  const dispatch = useDispatch();
  UserService.getUserData()
      .then((response) => {
          setUserId(response.data.id);
      })
      .catch((error) => {
        console.log('Error: '+error);
      });
  useEffect(() => {
    dispatch(getFeaturedProducts())
  }, [dispatch])
  const {featuredProducts} = useSelector(state => state.featuredProducts);
  
  const FeaturedProducts = featuredProducts.data?.map((item) => (
    <li key={item.id}>
      {isLoggedIn ? (
        <a href={`http://146.190.226.38/backend-services/product-detail/${item.art_id}/${userId}/${item.slug}/${item.product.id}`}>
        <div className="featured_products_item">
          <img src={item.art_photo_path} alt="" />
          <h4>{item.title}</h4>
          <p>
            by{" "}
            {item.artist.first_name
              ? `${item.artist.first_name}${
                  item.artist.last_name ? ` ${item.artist.last_name}` : null
                }`
              : item.artist.username}
          </p>
          <span>From $ {item.price}</span>
        </div>
        </a>
      ):
      (
        <Link to={`${process.env.PUBLIC_URL}/login`}>
          <div className="featured_products_item">
            <img src={item.art_photo_path} alt="" />
            <h4>{item.title}</h4>
            <p>
              by{" "}
              {item.artist.first_name
                ? `${item.artist.first_name}${
                    item.artist.last_name ? ` ${item.artist.last_name}` : null
                  }`
                : item.artist.username}
            </p>
            <span>From $ {item.price}</span>
          </div>
        </Link>
      )}
    </li>
  ));

  return (
    <div className="featured_products_sec">
      <div className="container">
        <div className="row">
          <div className="col-lg-12">
            <div className="featured_products">
              <h2>Featured Products</h2>
              <ul>{FeaturedProducts}</ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export const PurpleArtist = () => {
  return (
    <div className="purple_artist_sec">
      <div className="container">
        <div className="row">
          <div className="col-lg-12">
            <div className="purple_artist">
              <div className="row">
                <div className="col-lg-3 col-md-6">
                  <div className="purple_artist_item">
                    <img src={Artist1} alt="" />
                    <h3>Worldwide Shipping</h3>
                    <p>Available as Standard or Express delivery</p>
                    <a href="#">Learn more</a>
                  </div>
                </div>
                <div className="col-lg-3 col-md-6">
                  <div className="purple_artist_item">
                    <img src={Artist2} alt="" />
                    <h3>Secure Payments</h3>
                    <p>100% Secure payment with 256-bit SSL Encryption</p>
                    <a href="#">Learn more</a>
                  </div>
                </div>
                <div className="col-lg-3 col-md-6">
                  <div className="purple_artist_item">
                    <img src={Artist3} alt="" />
                    <h3>Free Return</h3>
                    <p>Exchange or money back guarantee for all orders</p>
                    <a href="#">Learn more</a>
                  </div>
                </div>
                <div className="col-lg-3 col-md-6">
                  <div className="purple_artist_item">
                    <img src={Artist4} alt="" />
                    <h3>Local Support</h3>
                    <p>24/7 Dedicated support</p>
                    <a href="#">Submit a request</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export const ExploreDesign = () => {
   const { isLoggedIn } = useSelector(state => state.auth);
   const [userId, setUserId] = useState();
  const dispatch = useDispatch();
  UserService.getUserData()
      .then((response) => {
          setUserId(response.data.id);
      })
      .catch((error) => {
        console.log('Error: '+error);
      });
  useEffect(() => {
    dispatch(getExploreDesign())
  }, [dispatch])
  const {exploreDesign} = useSelector(state => state.exploreDesign);
  // useEffect(() => {
  //   UserService.getExploreDesign().then(
  //     (response) => {
  //       setProducts(response.data);
  //     },
  //     (error) => {
  //       const _Dproducts =
  //         (error.response &&
  //           error.response.data &&
  //           error.response.data.message) ||
  //         error.message ||
  //         error.toString();

  //       setProducts(_Dproducts);
  //     }
  //   );
  // }, []);

  const ExploreDesignProducts = exploreDesign.data?.map((item) => (
    <li key={item.id}>
      {isLoggedIn ? (
      <a href={`http://146.190.226.38/backend-services/product-detail/${item.art_id}/${userId}/${item.slug}/${item.product.id}`}>
      <div className="explore_designs_item">
      <img src={item.art_photo_path} alt="" />
      <h4>{item.title}</h4>
      <p>
        by{" "}
        {item.artist.first_name
          ? `${item.artist.first_name}${
              item.artist.last_name ? ` ${item.artist.last_name}` : null
            }`
          : item.artist.name}
      </p>
      {/* <span>{item.design_count} Products</span> */}
    </div>
    </a>
       ) : (
        <Link to={`${process.env.PUBLIC_URL}/login`}>
          <div className="explore_designs_item">
          <img src={item.art_photo_path} alt="" />
          <h4>{item.title}</h4>
          <p>
            by{" "}
            {item.artist.first_name
              ? `${item.artist.first_name}${
                  item.artist.last_name ? ` ${item.artist.last_name}` : null
                }`
              : item.artist.name}
          </p>
          {/* <span>{item.design_count} Products</span> */}
        </div>
        </Link>
      )}
    </li>
  ));

  return (
    <div className="explore_designs_sec">
      <div className="container">
        <div className="row">
          <div className="col-lg-12">
            <div className="explore_designs">
              <h2>Explore designs picked for you</h2>
              <ul>{ExploreDesignProducts}</ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export const FanArt = () => {
  const dispatch = useDispatch();
  useEffect(() => {
    dispatch(getFanArt())
  }, [dispatch])
  const {fanArts} = useSelector(state => state.fanArts);

  const [basicActive, setBasicActive] = useState(0);
  const toggle = (tab) => {
    if (basicActive !== tab) {
      setBasicActive(tab);
    }
  };
  const FanArtTabs = fanArts.data?.map((item, index) => (
    <NavItem key={item.id}>
      <NavLink
        className={classnames({ active: basicActive === index })}
        onClick={() => {
          toggle(index);
        }}
      >
        {item.name}
      </NavLink>
    </NavItem>
  ));
  const FanArtDesigns = fanArts.data?.map((item, index) => (
    <TabPane key={item.id} tabId={index}>
      {basicActive === index ? (
        <>
          {item.design ? (
            <div className="artists_item">
              <img src={item.design?.art_photo_path} alt="" />
              <h4>{item.design.title}</h4>
              <p>
                by{" "}
                {item.first_name
                  ? `${item.first_name}${
                      item.last_name ? ` ${item.last_name}` : null
                    }`
                  : item.name}
              </p>
              <span>From $ {item.design.price}</span>
            </div>
          ) : null}
        </>
      ) : null}
    </TabPane>
  ));

  return (
    <>
      <div class="artists_sec">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="artists_tab">
                <h2>Shop fan art made by artists who love it too</h2>
                <Nav tabs>
                  <div
                    class="nav nav-tabs nav-fill"
                    id="nav-tab"
                    role="tablist"
                  >
                    {FanArtTabs}
                  </div>
                </Nav>
                <TabContent activeTab={basicActive}>{FanArtDesigns}</TabContent>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

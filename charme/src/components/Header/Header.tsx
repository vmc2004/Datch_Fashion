import "./Header.scss";
import logo from "../../assets/images/Datch Fashion.png";
import { Link } from "react-router-dom";
import ProductSearch from "../ProductSearch/ProductSearch";
const Header = () => {
  return (
    <>
      {/* <!-- Header Section Begin --> */}
      <header className="header">
        <div className="header__top">
          <div className="header__top__left">
            <p>Free shipping, 30-day return or refund guarantee.</p>
          </div>
          <div className="header__top__right">
            <div className="header__top__links">
              <Link to={"/register"}>Sign in</Link>
              <Link to={"/register"}>FAQs</Link>
            </div>
            <div className="header__top__hover">
              <span>
                Usd <i className="arrow_carrot-down"></i>
              </span>
              <ul>
                <li>USD</li>
                <li>EUR</li>
                <li>USD</li>
              </ul>
            </div>
          </div>
        </div>
        <div className="container">
          <div className="header-row">
            <div className="header-row-logo">
              <div className="header__logo">
                <a href="./index.html">
                  <img src={logo} alt="" />
                </a>
              </div>
            </div>
            <div>
              <nav className="header__menu mobile-menu">
                <ul>
                  <li className="active">
                    <Link to={"/"}>Trang chủ</Link>
                  </li>
                  <li>
                    <Link to={"/danhmuc"}>Danh mục</Link>
                  </li>
                  <li>
                    <a href="#">Pages</a>
                    <ul className="dropdown">
                      <li>
                        <a href="./about.html">About Us</a>
                      </li>
                      <li>
                        <a href="./shop-details.html">Shop Details</a>
                      </li>
                      <li>
                        <a href="./shopping-cart.html">Shopping Cart</a>
                      </li>
                      <li>
                        <a href="./checkout.html">Check Out</a>
                      </li>
                      <li>
                        <a href="./blog-details.html">Blog Details</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <Link to={"/tintuc"}>Tin tức</Link>
                  </li>
                  <li>
                    <Link to={"/lienhe"}>Liên hệ</Link>
                  </li>
                </ul>
              </nav>
            </div>
            <div className="col-lg-3 col-md-3">
              <div className="header__nav__option">
                <a href="#" className="search-switch">
                  <i className="ti-search"></i>
                </a>
                <a href="#">
                  <i className="ti-heart"></i>
                </a>
                <a href="#">
                  <i className="ti-shopping-cart"></i>
                </a>
                <div className="price">$0.00</div>
              </div>
              <div className="App">
                <h1>Product Search</h1>
                <ProductSearch />
              </div>
            </div>
          </div>
          <div className="canvas__open">
            <i className="fa fa-bars"></i>
          </div>
        </div>
      </header>
      {/* <!-- Header Section End --> */}
    </>
  );
};

export default Header;

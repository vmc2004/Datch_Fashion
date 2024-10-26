import { Link } from "react-router-dom";
import anh from "../../assets/images/product-1.jpg";
import "./Chitietsp.scss";
const Chitietsp = () => {
  return (
    <>
      <section className="breadcrumb-option">
        <div className="container">
          <div className="row">
            <div className="col-lg-12">
              <div className="breadcrumb__text">
                <h4>Shopping Cart</h4>
                <div className="breadcrumb__links">
                  <a href="./index.html">Home</a>
                  <a href="./shop.html">Shop</a>
                  <span>Shopping Cart</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      {/* <!-- Shop Details Section Begin --> */}
      <section className="shop-details">
        <div className="product__details__picc">
          <div className="product__details__picc_left">
            <div className="product__details__picc_left_img">
              <img src={anh} alt="" />
            </div>
            <div className="product__details__picc_left_img">
              <img src={anh} alt="" />
            </div>
            <div className="product__details__picc_left_img">
              <img src={anh} alt="" />
            </div>
            <div className="product__details__picc_left_img">
              <img src={anh} alt="" />
            </div>
          </div>
          <div className="product__details__picc_right">
            <img src={anh} alt="" />
          </div>
        </div>

        <div className="product__details__content">
          <div className="container">
            <div className="row d-flex justify-content-center">
              <div className="col-lg-8">
                <div className="product__details_content__text">
                  <h4>name</h4>
                  <div className="rating">
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star-o"></i>
                    <span> - 5 Reviews</span>
                  </div>
                  <h3>
                    $270.00 <span>70.00</span>
                  </h3>
                  <p>desc</p>
                  <div className="product__details__option">
                    <div className="product__details__option__size">
                      <span>Size:</span>

                      <label>
                        <input type="radio" id="xxl" />
                      </label>
                    </div>
                    <div className="product__details__option__color">
                      <span>Color:</span>

                      <label className="c-1">
                        <input type="radio" id="sp-1" />
                      </label>
                    </div>
                  </div>
                  <div className="product__details__cart__option">
                    <div className="quantity">
                      <div className="pro-qty">
                        <input type="text" value={1} />
                      </div>
                    </div>
                    <div className="addtocart">Add to cart</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div className="row">
        <div className="col-lg-12">
          <div className="product__details__tab">
            <ul className="nav nav-tabs" role="tablist">
              <li className="nav-item">
                <a
                  className="nav-link active"
                  data-toggle="tab"
                  href="#tabs-5"
                  role="tab"
                >
                  Description
                </a>
              </li>
              <li className="nav-item">
                <a
                  className="nav-link"
                  data-toggle="tab"
                  href="#tabs-6"
                  role="tab"
                >
                  Customer Previews(5)
                </a>
              </li>
              <li className="nav-item">
                <a
                  className="nav-link"
                  data-toggle="tab"
                  href="#tabs-7"
                  role="tab"
                >
                  Additional information
                </a>
              </li>
            </ul>
            <div className="tab-content">
              <div
                className="tab-pane active"
                id="tabs-5"
                role="tabpanel"
              ></div>

              <div className="tab-pane" id="tabs-7" role="tabpanel">
                <div className="product__details__tab__content">
                  <div className="product__details__tab__content__item">
                    <p>des</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {/* <!-- Shop Details Section End --> */}

      {/* <!-- Relate Section Begin --> */}
      <div className="secssion-relate">
        <div className="secssion-relate-left">
          <h1>Sản phẩm liên quan</h1>
          <div className="relate-center">
            <div className="relate-center-item">
              <div className="relate-item">
                <div className="card-inner">
                  <div className="card-front">
                    <img src={anh} alt="" />
                  </div>
                  <div className="cart-popup">
                    <div className="cart-popup-favourite">
                      <i className="ti-heart"></i>
                    </div>
                    <div className="cart-popup-cart">
                      <i className="ti-shopping-cart"></i>
                    </div>
                    <div className="cart-popup-search">
                      <i className="ti-search"></i>
                    </div>
                  </div>
                </div>
                <div className="relate-body">
                  <div className="relate-body-item">
                    <Link to={`/products/}`}>
                      {" "}
                      <h6 className="relate-body-title">aaaa</h6>
                    </Link>
                    <div className="relate-body-price">
                      <div className="relate-body-price1">
                        <span>$450.000</span>
                      </div>
                      <div className="relate-body-price2">
                        <span>$590.000</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="relate-check-mau">
                  <div className="check-mau1"></div>
                  <div className="check-mau2"></div>
                  <div className="check-mau3"></div>
                  <div className="check-mau4"></div>
                </div>
              </div>{" "}
              <div className="relate-item">
                <div className="card-inner">
                  <div className="card-front">
                    <img src={anh} alt="" />
                  </div>
                  <div className="cart-popup">
                    <div className="cart-popup-favourite">
                      <i className="ti-heart"></i>
                    </div>
                    <div className="cart-popup-cart">
                      <i className="ti-shopping-cart"></i>
                    </div>
                    <div className="cart-popup-search">
                      <i className="ti-search"></i>
                    </div>
                  </div>
                </div>
                <div className="relate-body">
                  <div className="relate-body-item">
                    <Link to={`/products/}`}>
                      {" "}
                      <h6 className="relate-body-title">aaaa</h6>
                    </Link>
                    <div className="relate-body-price">
                      <div className="relate-body-price1">
                        <span>$450.000</span>
                      </div>
                      <div className="relate-body-price2">
                        <span>$590.000</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="relate-check-mau">
                  <div className="check-mau1"></div>
                  <div className="check-mau2"></div>
                  <div className="check-mau3"></div>
                  <div className="check-mau4"></div>
                </div>
              </div>{" "}
              <div className="relate-item">
                <div className="card-inner">
                  <div className="card-front">
                    <img src={anh} alt="" />
                  </div>
                  <div className="cart-popup">
                    <div className="cart-popup-favourite">
                      <i className="ti-heart"></i>
                    </div>
                    <div className="cart-popup-cart">
                      <i className="ti-shopping-cart"></i>
                    </div>
                    <div className="cart-popup-search">
                      <i className="ti-search"></i>
                    </div>
                  </div>
                </div>
                <div className="relate-body">
                  <div className="relate-body-item">
                    <Link to={`/products/}`}>
                      {" "}
                      <h6 className="relate-body-title">aaaa</h6>
                    </Link>
                    <div className="relate-body-price">
                      <div className="relate-body-price1">
                        <span>$450.000</span>
                      </div>
                      <div className="relate-body-price2">
                        <span>$590.000</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="relate-check-mau">
                  <div className="check-mau1"></div>
                  <div className="check-mau2"></div>
                  <div className="check-mau3"></div>
                  <div className="check-mau4"></div>
                </div>
              </div>{" "}
              <div className="relate-item">
                <div className="card-inner">
                  <div className="card-front">
                    <img src={anh} alt="" />
                  </div>
                  <div className="cart-popup">
                    <div className="cart-popup-favourite">
                      <i className="ti-heart"></i>
                    </div>
                    <div className="cart-popup-cart">
                      <i className="ti-shopping-cart"></i>
                    </div>
                    <div className="cart-popup-search">
                      <i className="ti-search"></i>
                    </div>
                  </div>
                </div>
                <div className="relate-body">
                  <div className="relate-body-item">
                    <Link to={`/products/}`}>
                      {" "}
                      <h6 className="relate-body-title">aaaa</h6>
                    </Link>
                    <div className="relate-body-price">
                      <div className="relate-body-price1">
                        <span>$450.000</span>
                      </div>
                      <div className="relate-body-price2">
                        <span>$590.000</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="relate-check-mau">
                  <div className="check-mau1"></div>
                  <div className="check-mau2"></div>
                  <div className="check-mau3"></div>
                  <div className="check-mau4"></div>
                </div>
              </div>{" "}
              <div className="relate-item">
                <div className="card-inner">
                  <div className="card-front">
                    <img src={anh} alt="" />
                  </div>
                  <div className="cart-popup">
                    <div className="cart-popup-favourite">
                      <i className="ti-heart"></i>
                    </div>
                    <div className="cart-popup-cart">
                      <i className="ti-shopping-cart"></i>
                    </div>
                    <div className="cart-popup-search">
                      <i className="ti-search"></i>
                    </div>
                  </div>
                </div>
                <div className="relate-body">
                  <div className="relate-body-item">
                    <Link to={`/products/}`}>
                      {" "}
                      <h6 className="relate-body-title">aaaa</h6>
                    </Link>
                    <div className="relate-body-price">
                      <div className="relate-body-price1">
                        <span>$450.000</span>
                      </div>
                      <div className="relate-body-price2">
                        <span>$590.000</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="relate-check-mau">
                  <div className="check-mau1"></div>
                  <div className="check-mau2"></div>
                  <div className="check-mau3"></div>
                  <div className="check-mau4"></div>
                </div>
              </div>{" "}
              <div className="relate-item">
                <div className="card-inner">
                  <div className="card-front">
                    <img src={anh} alt="" />
                  </div>
                  <div className="cart-popup">
                    <div className="cart-popup-favourite">
                      <i className="ti-heart"></i>
                    </div>
                    <div className="cart-popup-cart">
                      <i className="ti-shopping-cart"></i>
                    </div>
                    <div className="cart-popup-search">
                      <i className="ti-search"></i>
                    </div>
                  </div>
                </div>
                <div className="relate-body">
                  <div className="relate-body-item">
                    <Link to={`/products/}`}>
                      {" "}
                      <h6 className="relate-body-title">aaaa</h6>
                    </Link>
                    <div className="relate-body-price">
                      <div className="relate-body-price1">
                        <span>$450.000</span>
                      </div>
                      <div className="relate-body-price2">
                        <span>$590.000</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="relate-check-mau">
                  <div className="check-mau1"></div>
                  <div className="check-mau2"></div>
                  <div className="check-mau3"></div>
                  <div className="check-mau4"></div>
                </div>
              </div>
              <div className="relate-item">
                <div className="card-inner">
                  <div className="card-front">
                    <img src={anh} alt="" />
                  </div>
                  <div className="cart-popup">
                    <div className="cart-popup-favourite">
                      <i className="ti-heart"></i>
                    </div>
                    <div className="cart-popup-cart">
                      <i className="ti-shopping-cart"></i>
                    </div>
                    <div className="cart-popup-search">
                      <i className="ti-search"></i>
                    </div>
                  </div>
                </div>
                <div className="relate-body">
                  <div className="relate-body-item">
                    <Link to={`/products/}`}>
                      {" "}
                      <h6 className="relate-body-title">aaaa</h6>
                    </Link>
                    <div className="relate-body-price">
                      <div className="relate-body-price1">
                        <span>$450.000</span>
                      </div>
                      <div className="relate-body-price2">
                        <span>$590.000</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="relate-check-mau">
                  <div className="check-mau1"></div>
                  <div className="check-mau2"></div>
                  <div className="check-mau3"></div>
                  <div className="check-mau4"></div>
                </div>
              </div>
              <div className="relate-item">
                <div className="card-inner">
                  <div className="card-front">
                    <img src={anh} alt="" />
                  </div>
                  <div className="cart-popup">
                    <div className="cart-popup-favourite">
                      <i className="ti-heart"></i>
                    </div>
                    <div className="cart-popup-cart">
                      <i className="ti-shopping-cart"></i>
                    </div>
                    <div className="cart-popup-search">
                      <i className="ti-search"></i>
                    </div>
                  </div>
                </div>
                <div className="relate-body">
                  <div className="relate-body-item">
                    <Link to={`/products/}`}>
                      {" "}
                      <h6 className="relate-body-title">aaaa</h6>
                    </Link>
                    <div className="relate-body-price">
                      <div className="relate-body-price1">
                        <span>$450.000</span>
                      </div>
                      <div className="relate-body-price2">
                        <span>$590.000</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="relate-check-mau">
                  <div className="check-mau1"></div>
                  <div className="check-mau2"></div>
                  <div className="check-mau3"></div>
                  <div className="check-mau4"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {/* <!-- Product Section End --> */}
    </>
  );
};

export default Chitietsp;

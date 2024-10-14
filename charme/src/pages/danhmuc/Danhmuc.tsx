import "./Danhmux.scss";
import product1 from "../../assets/images/product-1.jpg";
import { useState } from "react";
import { Link } from "react-router-dom";
const Danhmuc = () => {
  const [isHovered, setIsHovered] = useState(false);
  return (
    <>
      {/* <!-- Breadcrumb Section Begin --> */}
      <section className="breadcrumb-option">
        <div className="breadcrumb-container">
          <div className="row">
            <div className="col-lg-12">
              <div className="breadcrumb__text">
                <h4>Shop</h4>
                <div className="breadcrumb__links">
                  <Link to={"/"}>Home</Link>
                  <span>Shop</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      {/* <!-- Breadcrumb Section End --> */}

      {/* <!-- Shop Section Begin --> */}
      <section className="shop spad">
        <div className="container">
          <div className="shop-row">
            <div className="col-lg-3">
              <div className="shop__sidebar">
                <div className="shop__sidebar__search">
                  <form action="#">
                    <input type="text" placeholder="Search..." />
                    <div className="shop__sidebar__search_icon">
                      <i className="ti-search"></i>
                    </div>
                    <button type="submit">
                      <span className="icon_search"></span>
                    </button>
                  </form>
                </div>
                <div className="shop__sidebar__accordion">
                  <div className="accordion" id="accordionExample">
                    <div className="card">
                      <div className="card-heading">
                        <a data-toggle="collapse" data-target="#collapseOne">
                          Categories
                        </a>
                      </div>
                      <div
                        id="collapseOne"
                        className="collapse show"
                        data-parent="#accordionExample"
                      >
                        <div className="card-body">
                          <div className="shop__sidebar__categories">
                            <ul className="nice-scroll">
                              <li>
                                <a href="#">Men (20)</a>
                              </li>
                              <li>
                                <a href="#">Women (20)</a>
                              </li>
                              <li>
                                <a href="#">Bags (20)</a>
                              </li>
                              <li>
                                <a href="#">Clothing (20)</a>
                              </li>
                              <li>
                                <a href="#">Shoes (20)</a>
                              </li>
                              <li>
                                <a href="#">Accessories (20)</a>
                              </li>
                              <li>
                                <a href="#">Kids (20)</a>
                              </li>
                              <li>
                                <a href="#">Kids (20)</a>
                              </li>
                              <li>
                                <a href="#">Kids (20)</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div className="card">
                      <div className="card-heading">
                        <a data-toggle="collapse" data-target="#collapseTwo">
                          Branding
                        </a>
                      </div>
                      <div
                        id="collapseTwo"
                        className="collapse show"
                        data-parent="#accordionExample"
                      >
                        <div className="card-body">
                          <div className="shop__sidebar__brand">
                            <ul>
                              <li>
                                <a href="#">Louis Vuitton</a>
                              </li>
                              <li>
                                <a href="#">Chanel</a>
                              </li>
                              <li>
                                <a href="#">Hermes</a>
                              </li>
                              <li>
                                <a href="#">Gucci</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div className="card">
                      <div className="card-heading">
                        <a data-toggle="collapse" data-target="#collapseThree">
                          Filter Price
                        </a>
                      </div>
                      <div
                        id="collapseThree"
                        className="collapse show"
                        data-parent="#accordionExample"
                      >
                        <div className="card-body">
                          <div className="shop__sidebar__price">
                            <ul>
                              <li>
                                <a href="#">$0.00 - $50.00</a>
                              </li>
                              <li>
                                <a href="#">$50.00 - $100.00</a>
                              </li>
                              <li>
                                <a href="#">$100.00 - $150.00</a>
                              </li>
                              <li>
                                <a href="#">$150.00 - $200.00</a>
                              </li>
                              <li>
                                <a href="#">$200.00 - $250.00</a>
                              </li>
                              <li>
                                <a href="#">250.00+</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div className="card">
                      <div className="card-heading">
                        <a data-toggle="collapse" data-target="#collapseFour">
                          Size
                        </a>
                      </div>
                      <div
                        id="collapseFour"
                        className="collapse show"
                        data-parent="#accordionExample"
                      >
                        <div className="card-body">
                          <div className="shop__sidebar__size">
                            <label>
                              <input type="radio" />
                              XS
                            </label>
                            <label>
                              <input type="radio" />S
                            </label>
                            <label>
                              {" "}
                              <input type="radio" />M
                            </label>
                            <label>
                              <input type="radio" />
                              XL
                            </label>
                            <label>
                              <input type="radio" />
                              2XL
                            </label>
                            <label>
                              <input type="radio" />
                              XXL
                            </label>
                            <label>
                              <input type="radio" />
                              3XL
                            </label>
                            <label>
                              <input type="radio" />
                              4XL
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div className="card">
                      <div className="card-heading">
                        <a data-toggle="collapse" data-target="#collapseFive">
                          Colors
                        </a>
                      </div>
                      <div
                        id="collapseFive"
                        className="collapse show"
                        data-parent="#accordionExample"
                      >
                        <div className="card-body">
                          <div className="shop__sidebar__color">
                            <label className="c-1">
                              <input type="radio" id="42" />
                            </label>
                            <label className="c-2">
                              <input type="radio" id="42" />
                            </label>
                            <label className="c-3">
                              <input type="radio" id="42" />
                            </label>
                            <label className="c-4">
                              <input type="radio" id="42" />
                            </label>
                            <label className="c-5">
                              <input type="radio" id="42" />
                            </label>
                            <label className="c-6">
                              <input type="radio" id="42" />
                            </label>
                            <label className="c-7">
                              <input type="radio" id="42" />
                            </label>
                            <label className="c-8">
                              <input type="radio" id="42" />
                            </label>
                            <label className="c-9">
                              <input type="radio" id="42" />
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div className="card">
                      <div className="card-heading">
                        <a data-toggle="collapse" data-target="#collapseSix">
                          Tags
                        </a>
                      </div>
                      <div
                        id="collapseSix"
                        className="collapse show"
                        data-parent="#accordionExample"
                      >
                        <div className="card-body">
                          <div className="shop__sidebar__tags">
                            <a href="#">Product</a>
                            <a href="#">Bags</a>
                            <a href="#">Shoes</a>
                            <a href="#">Fashio</a>
                            <a href="#">Clothing</a>
                            <a href="#">Hats</a>
                            <a href="#">Accessories</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="col-lg-9">
              <div className="shop__product__option">
                <div className="row">
                  <div className="col-lg-6 col-md-6 col-sm-6">
                    <div className="shop__product__option__left">
                      <p>Showing 1–12 of 126 results</p>
                    </div>
                  </div>
                  <div className="col-lg-6 col-md-6 col-sm-6">
                    <div className="shop__product__option__right">
                      <p>Sort by Price:</p>
                      <select className="shop__product__option__right_select">
                        <option value="">Low To High</option>
                        <option value="">$0 - $55</option>
                        <option value="">$55 - $100</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              {/* <!-- Product Section Begin --> */}
              <div className="secssion-main-category">
                <div className="secssion-main-left">
                  <div className="main-center">
                    <div className="main-item">
                      <div className="card-inner">
                        <div className="card-front">
                          <img src={product1} alt="" />
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
                      <div className="main-body">
                        <div className="main-body-item">
                          <h6 className="main-body-title">
                            Cool & Comfy Onlala
                          </h6>
                          <div className="main-body-price">
                            <div className="main-body-price1">
                              <span>$450.000</span>
                            </div>
                            <div className="main-body-price2">
                              <span>$590.000</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="main-check-mau">
                        <div className="check-mau1"></div>
                        <div className="check-mau2"></div>
                        <div className="check-mau3"></div>
                        <div className="check-mau4"></div>
                      </div>
                    </div>
                    <div className="main-item">
                      <div className="card-inner">
                        <div className="card-front">
                          <img src={product1} alt="" />
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
                      <div className="main-body">
                        <div className="main-body-item">
                          <h6 className="main-body-title">
                            Cool & Comfy Onlala
                          </h6>
                          <div className="main-body-price">
                            <div className="main-body-price1">
                              <span>$450.000</span>
                            </div>
                            <div className="main-body-price2">
                              <span>$590.000</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="main-check-mau">
                        <div className="check-mau1"></div>
                        <div className="check-mau2"></div>
                        <div className="check-mau3"></div>
                        <div className="check-mau4"></div>
                      </div>
                    </div>
                    <div className="main-item">
                      <div className="card-inner">
                        <div className="card-front">
                          <img src={product1} alt="" />
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
                      <div className="main-body">
                        <div className="main-body-item">
                          <h6 className="main-body-title">
                            Cool & Comfy Onlala
                          </h6>
                          <div className="main-body-price">
                            <div className="main-body-price1">
                              <span>$450.000</span>
                            </div>
                            <div className="main-body-price2">
                              <span>$590.000</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="main-check-mau">
                        <div className="check-mau1"></div>
                        <div className="check-mau2"></div>
                        <div className="check-mau3"></div>
                        <div className="check-mau4"></div>
                      </div>
                    </div>
                    <div className="main-item">
                      <div className="card-inner">
                        <div className="card-front">
                          <img src={product1} alt="" />
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
                      <div className="main-body">
                        <div className="main-body-item">
                          <h6 className="main-body-title">
                            Cool & Comfy Onlala
                          </h6>
                          <div className="main-body-price">
                            <div className="main-body-price1">
                              <span>$450.000</span>
                            </div>
                            <div className="main-body-price2">
                              <span>$590.000</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="main-check-mau">
                        <div className="check-mau1"></div>
                        <div className="check-mau2"></div>
                        <div className="check-mau3"></div>
                        <div className="check-mau4"></div>
                      </div>
                    </div>
                    <div className="main-item">
                      <div className="card-inner">
                        <div className="card-front">
                          <img src={product1} alt="" />
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
                      <div className="main-body">
                        <div className="main-body-item">
                          <h6 className="main-body-title">
                            Cool & Comfy Onlala
                          </h6>
                          <div className="main-body-price">
                            <div className="main-body-price1">
                              <span>$450.000</span>
                            </div>
                            <div className="main-body-price2">
                              <span>$590.000</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="main-check-mau">
                        <div className="check-mau1"></div>
                        <div className="check-mau2"></div>
                        <div className="check-mau3"></div>
                        <div className="check-mau4"></div>
                      </div>
                    </div>
                    <div className="main-item">
                      <div className="card-inner">
                        <div className="card-front">
                          <img src={product1} alt="" />
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
                      <div className="main-body">
                        <div className="main-body-item">
                          <h6 className="main-body-title">
                            Cool & Comfy Onlala
                          </h6>
                          <div className="main-body-price">
                            <div className="main-body-price1">
                              <span>$450.000</span>
                            </div>
                            <div className="main-body-price2">
                              <span>$590.000</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="main-check-mau">
                        <div className="check-mau1"></div>
                        <div className="check-mau2"></div>
                        <div className="check-mau3"></div>
                        <div className="check-mau4"></div>
                      </div>
                    </div>
                    <div className="main-item">
                      <div className="card-inner">
                        <div className="card-front">
                          <img src={product1} alt="" />
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
                      <div className="main-body">
                        <div className="main-body-item">
                          <h6 className="main-body-title">
                            Cool & Comfy Onlala
                          </h6>
                          <div className="main-body-price">
                            <div className="main-body-price1">
                              <span>$450.000</span>
                            </div>
                            <div className="main-body-price2">
                              <span>$590.000</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="main-check-mau">
                        <div className="check-mau1"></div>
                        <div className="check-mau2"></div>
                        <div className="check-mau3"></div>
                        <div className="check-mau4"></div>
                      </div>
                    </div>
                    <div className="main-item">
                      <div className="card-inner">
                        <div className="card-front">
                          <img src={product1} alt="" />
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
                      <div className="main-body">
                        <div className="main-body-item">
                          <h6 className="main-body-title">
                            Cool & Comfy Onlala
                          </h6>
                          <div className="main-body-price">
                            <div className="main-body-price1">
                              <span>$450.000</span>
                            </div>
                            <div className="main-body-price2">
                              <span>$590.000</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="main-check-mau">
                        <div className="check-mau1"></div>
                        <div className="check-mau2"></div>
                        <div className="check-mau3"></div>
                        <div className="check-mau4"></div>
                      </div>
                    </div>
                    <div className="main-item">
                      <div className="card-inner">
                        <div className="card-front">
                          <img src={product1} alt="" />
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
                      <div className="main-body">
                        <div className="main-body-item">
                          <h6 className="main-body-title">
                            Cool & Comfy Onlala
                          </h6>
                          <div className="main-body-price">
                            <div className="main-body-price1">
                              <span>$450.000</span>
                            </div>
                            <div className="main-body-price2">
                              <span>$590.000</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="main-check-mau">
                        <div className="check-mau1"></div>
                        <div className="check-mau2"></div>
                        <div className="check-mau3"></div>
                        <div className="check-mau4"></div>
                      </div>
                    </div>
                    <div className="main-item">
                      <div className="card-inner">
                        <div className="card-front">
                          <img src={product1} alt="" />
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
                      <div className="main-body">
                        <div className="main-body-item">
                          <h6 className="main-body-title">
                            Cool & Comfy Onlala
                          </h6>
                          <div className="main-body-price">
                            <div className="main-body-price1">
                              <span>$450.000</span>
                            </div>
                            <div className="main-body-price2">
                              <span>$590.000</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="main-check-mau">
                        <div className="check-mau1"></div>
                        <div className="check-mau2"></div>
                        <div className="check-mau3"></div>
                        <div className="check-mau4"></div>
                      </div>
                    </div>
                    <div className="main-item">
                      <div className="card-inner">
                        <div className="card-front">
                          <img src={product1} alt="" />
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
                      <div className="main-body">
                        <div className="main-body-item">
                          <h6 className="main-body-title">
                            Cool & Comfy Onlala
                          </h6>
                          <div className="main-body-price">
                            <div className="main-body-price1">
                              <span>$450.000</span>
                            </div>
                            <div className="main-body-price2">
                              <span>$590.000</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="main-check-mau">
                        <div className="check-mau1"></div>
                        <div className="check-mau2"></div>
                        <div className="check-mau3"></div>
                        <div className="check-mau4"></div>
                      </div>
                    </div>
                    <div className="main-item">
                      <div className="card-inner">
                        <div className="card-front">
                          <img src={product1} alt="" />
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
                      <div className="main-body">
                        <div className="main-body-item">
                          <h6 className="main-body-title">
                            Cool & Comfy Onlala
                          </h6>
                          <div className="main-body-price">
                            <div className="main-body-price1">
                              <span>$450.000</span>
                            </div>
                            <div className="main-body-price2">
                              <span>$590.000</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="main-check-mau">
                        <div className="check-mau1"></div>
                        <div className="check-mau2"></div>
                        <div className="check-mau3"></div>
                        <div className="check-mau4"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {/* <!-- Product Section End --> */}
              <div className="row">
                <div className="col-lg-12">
                  <div className="product__pagination">
                    <a className="active" href="#">
                      1
                    </a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <span>...</span>
                    <a href="#">21</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      {/* <!-- Shop Section End --> */}
    </>
  );
};

export default Danhmuc;

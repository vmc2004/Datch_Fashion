import {
  faFacebook,
  faInstagram,
  faPinterest,
  faTwitter,
} from "@fortawesome/free-brands-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import banner1 from "../../assets/images/banner-1.jpg";
import banner2 from "../../assets/images/banner-2.jpg";
import banner3 from "../../assets/images/banner-3.jpg";
import blog1 from "../../assets/images/blog-1.jpg";
import blog2 from "../../assets/images/blog-2.jpg";
import blog3 from "../../assets/images/blog-3.jpg";
import instagram1 from "../../assets/images/instagram-1.jpg";
import instagram2 from "../../assets/images/instagram-2.jpg";
import instagram3 from "../../assets/images/instagram-3.jpg";
import instagram4 from "../../assets/images/instagram-4.jpg";
import instagram5 from "../../assets/images/instagram-5.jpg";
import instagram6 from "../../assets/images/instagram-6.jpg";
import productsale from "../../assets/images/product-sale.png";
import "./Home.scss";

import { useEffect, useState } from "react";
import { instance } from "../../apis";
import { Product } from "../../types/Product";
import { Link } from "react-router-dom";
import images from "../../data/images";

import CustomSlider from "../../components/slider/custom.slider";
import moment from "moment";
import { Colors } from "../../types/Colors";
const Home = () => {
  const [time, setTime] = useState({
    hours: moment().format("HH"),
    minutes: moment().format("mm"),
    seconds: moment().format("ss"),
  });
  useEffect(() => {
    const interval = setInterval(() => {
      setTime({
        hours: moment().format("HH"),
        minutes: moment().format("mm"),
        seconds: moment().format("ss"),
      });
    }, 1000);
    // Dọn dẹp interval khi component bị huỷ
    return () => clearInterval(interval);
  }, []);
  const date = moment().format("DD");

  const [products, setProducts] = useState<Product[]>([]);
  const getProduct = async () => {
    try {
      const response = await instance.get("/products");

      if (response && Array.isArray(response.data.data)) {
        setProducts(response.data.data); // Chỉ đặt products nếu nó là mảng
      } else {
        console.error("API did not return an array");
      }
    } catch (error) {
      console.error("There was an error fetching the products!", error);
    }
  };
  useEffect(() => {
    getProduct();
  }, []);
  const [colors, setColors] = useState<Colors[]>([]);
  // Hàm để làm sạch mã màu
  const cleanColorCode = (colorCode) => {
    // Sử dụng regex để chỉ giữ lại các ký tự hợp lệ
    const cleanedCode = colorCode.match(/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/);
    return cleanedCode ? cleanedCode[0] : "#000000"; // Mặc định là đen nếu mã màu không hợp lệ
  };
  const getColor = async () => {
    try {
      const response = await instance.get("/colors");
      const cleanedColors = response.data.data.map((color) => ({
        ...color,
        color_code: cleanColorCode(color.color_code), // Làm sạch mã màu
      }));
      setColors(cleanedColors);
    } catch (error) {
      console.error("There was an error fetching the products!", error);
    }
  };
  useEffect(() => {
    getColor();
  }, []);
  return (
    <>
      {/* slider begin */}
      <div className="hero">
        <CustomSlider>
          {images.map((image, index) => {
            return <img key={index} src={image.imgURL} alt={image.imgAlt} />;
          })}
        </CustomSlider>
        <div className="hero-content">
          <div className="hero-text">
            <h6>Summer Collection</h6>
            <h3>Fall - Winter Collections 2030</h3>
            <p>
              A specialist label creating luxury essentials. Ethically crafted
              with an unwavering commitment to exceptional quality.
            </p>
            <div className="hero__social">
              <FontAwesomeIcon icon={faFacebook} size="2x" color="#3b5998" />
              <FontAwesomeIcon icon={faTwitter} size="2x" color="#1DA1F2" />
              <FontAwesomeIcon icon={faInstagram} size="2x" color="#C13584" />
              <FontAwesomeIcon icon={faPinterest} size="2x" color="#3b5998" />
            </div>
          </div>
        </div>
      </div>
      {/* slider end */}
      {/* <!-- Banner Section Begin --> */}
      <section className="banner spad">
        <div className="banner-container">
          <div className="row">
            <div className="col-lg-7 offset-lg-4">
              <div className="banner__item">
                <div className="banner__item__pic">
                  <img src={banner1} alt="" />
                </div>
                <div className="banner__item__text">
                  <h2>Clothing Collections 2030</h2>
                  <a href="#">Shop now</a>
                </div>
              </div>
            </div>
            <div className="col-lg-5">
              <div className="banner__item banner__item--middle">
                <div className="banner__item__pic">
                  <img src={banner2} alt="" />
                </div>
                <div className="banner__item__text">
                  <h2>Accessories</h2>
                  <a href="#">Shop now</a>
                </div>
              </div>
            </div>
            <div className="col-lg-7">
              <div className="banner__item banner__item--last">
                <div className="banner__item__pic">
                  <img src={banner3} alt="" />
                </div>
                <div className="banner__item__text">
                  <h2>Shoes Spring 2030</h2>
                  <a href="#">Shop now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      {/* <!-- Banner Section End --> */}
      {/* <!-- Product Section Begin --> */}
      <div className="secssion-main">
        <div className="secssion-main-left">
          <div className="main-top-bar">
            <div className="main-top-bar-text">Features Products</div>
            <div className="main-top-bar-text">Features Products</div>
            <div className="main-top-bar-text">Features Products</div>
          </div>
          <div className="main-center">
            {products.map((item, index) => (
              <div key={index}>
                <div className="main-item">
                  <div className="card-inner">
                    <div className="card-front">
                      <img src={item.image} alt={item.name} />
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
                      <Link to={`/products/${item.id}`}>
                        {" "}
                        <h6 className="main-body-title">{item.name}</h6>
                      </Link>
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
                    {colors.map((color, index) => (
                      <div
                        className="check-mau1"
                        key={index}
                        style={{ backgroundColor: color.color_code }}
                      >
                        ({color.color_code})
                      </div>
                    ))}
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
      {/* <!-- Product Section End --> */}
      {/* <!-- Categories Section Begin --> */}
      <section className="categories spad">
        <div className="container">
          <div className="categories-row">
            <div className="col-lg-3">
              <div className="categories__text">
                <h2>
                  Clothings Hot <br /> <span>Shoe Collection</span> <br />{" "}
                  Accessories
                </h2>
              </div>
            </div>
            <div className="col-lg-4">
              <div className="categories__hot__deal">
                <img src={productsale} alt="" />
                <div className="hot__deal__sticker">
                  <span>Sale Of</span>
                  <h5>$29.99</h5>
                </div>
              </div>
            </div>
            <div className="col-lg-4 offset-lg-1">
              <div className="categories__deal__countdown">
                <span>Deal Of The Week</span>
                <h2>Multi-pocket Chest Bag Black</h2>
                <div
                  className="categories__deal__countdown__timer"
                  id="countdown"
                >
                  <div className="cd-item">
                    <span>{date}</span>
                    <p>Days</p>
                  </div>
                  <div className="cd-item">
                    <span>{time.hours}</span>
                    <p>Hours</p>
                  </div>
                  <div className="cd-item">
                    <span>{time.minutes}</span>
                    <p>Minutes</p>
                  </div>
                  <div className="cd-item">
                    <span>{time.seconds}</span>
                    <p>Seconds</p>
                  </div>
                </div>
                <a href="#" className="primary-btn">
                  Shop now
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      {/* <!-- Categories Section end --> */}

      {/* <!-- Instagram Section Begin --> */}
      <section className="instagram spad">
        <div className="container">
          <div className="instagram-row">
            <div className="col-lg-8">
              <div className="instagram__pic">
                <div className="instagram__pic__item set-bg">
                  <img src={instagram1} alt="" />
                </div>
                <div className="instagram__pic__item set-bg">
                  {" "}
                  <img src={instagram2} alt="" />
                </div>
                <div className="instagram__pic__item set-bg">
                  {" "}
                  <img src={instagram3} alt="" />
                </div>
                <div className="instagram__pic__item set-bg">
                  {" "}
                  <img src={instagram4} alt="" />
                </div>
                <div className="instagram__pic__item set-bg">
                  {" "}
                  <img src={instagram5} alt="" />
                </div>
                <div className="instagram__pic__item set-bg">
                  {" "}
                  <img src={instagram6} alt="" />
                </div>
              </div>
            </div>
            <div className="col-lg-4">
              <div className="instagram__text">
                <h2>Instagram</h2>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <h3>#Male_Fashion</h3>
              </div>
            </div>
          </div>
        </div>
      </section>
      {/* <!-- Instagram Section End --> */}

      {/* <!-- Latest Blog Section Begin --> */}
      <section className="latest spad">
        <div className="latest-container">
          <div className="row">
            <div className="col-lg-12">
              <div className="section-title">
                <span>Latest News</span>
                <h2>Fashion New Trends</h2>
              </div>
            </div>
          </div>
          <div className="blog-row-item">
            <div className="col-lg-4 col-md-6 col-sm-6">
              <div className="blog__item">
                <div className="blog__item__text">
                  <span>
                    <img src={blog1} alt="" /> 16 February 2020
                  </span>
                  <h5>What Curling Irons Are The Best Ones</h5>
                  <a href="#">Read More</a>
                </div>
              </div>
            </div>
            <div className="col-lg-4 col-md-6 col-sm-6">
              <div className="blog__item">
                <div className="blog__item__text">
                  <span>
                    <img src={blog2} alt="" /> 21 February 2020
                  </span>
                  <h5>Eternity Bands Do Last Forever</h5>
                  <a href="#">Read More</a>
                </div>
              </div>
            </div>
            <div className="col-lg-4 col-md-6 col-sm-6">
              <div className="blog__item">
                <div className="blog__item__text">
                  <span>
                    <img src={blog3} alt="" /> 28 February 2020
                  </span>
                  <h5>The Health Benefits Of Sunglasses</h5>
                  <a href="#">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      {/* <!-- Latest Blog Section End --> */}
    </>
  );
};

export default Home;

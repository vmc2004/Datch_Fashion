import "./Cart.scss";
import product1 from "../../assets/images/product-1.jpg";

const Cart = () => {
  return (
    <>
      {/* <!-- Breadcrumb Section Begin --> */}
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
      {/* <!-- Breadcrumb Section End --> */}

      {/* <!-- Shopping Cart Section Begin --> */}
      <section className="shopping-cart spad">
        <div className="container">
          <div className="shopping-cart-row">
            <div className="col-lg-8">
              <div className="shopping__cart__table">
                <table>
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td className="product__cart__item">
                        <div className="product__cart__item__pic">
                          <img src={product1} alt="" />
                        </div>
                        <div className="product__cart__item__text">
                          <h6>T-shirt Contrast Pocket</h6>
                          <h5>$98.49</h5>
                        </div>
                      </td>
                      <td className="quantity__item">
                        <div className="quantity">
                          <div className="pro-qty-2">
                            <input type="text" value={1} />
                          </div>
                        </div>
                      </td>
                      <div>
                        <div className="cart__price_item">
                          <td className="cart__price">$ 30.00</td>
                        </div>
                      </div>
                      <td className="cart__close">
                        <i className="ti-close"></i>
                      </td>
                    </tr>
                    <tr>
                      <td className="product__cart__item">
                        <div className="product__cart__item__pic">
                          <img src={product1} alt="" />
                        </div>
                        <div className="product__cart__item__text">
                          <h6>Diagonal Textured Cap</h6>
                          <h5>$98.49</h5>
                        </div>
                      </td>
                      <td className="quantity__item">
                        <div className="quantity">
                          <div className="pro-qty-2">
                            <input type="text" value={1} />
                          </div>
                        </div>
                      </td>
                      <div className="cart__price_item">
                        <td className="cart__price">$ 30.00</td>
                      </div>
                      <td className="cart__close">
                        <i className="ti-close"></i>
                      </td>
                    </tr>
                    <tr>
                      <td className="product__cart__item">
                        <div className="product__cart__item__pic">
                          <img src={product1} alt="" />
                        </div>
                        <div className="product__cart__item__text">
                          <h6>Basic Flowing Scarf</h6>
                          <h5>$98.49</h5>
                        </div>
                      </td>
                      <td className="quantity__item">
                        <div className="quantity">
                          <div className="pro-qty-2">
                            <input type="text" value={1} />
                          </div>
                        </div>
                      </td>
                      <div className="cart__price_item">
                        <td className="cart__price">$ 30.00</td>
                      </div>
                      <td className="cart__close">
                        <i className="ti-close"></i>
                      </td>
                    </tr>
                    <tr>
                      <td className="product__cart__item">
                        <div className="product__cart__item__pic">
                          <img src={product1} alt="" />
                        </div>
                        <div className="product__cart__item__text">
                          <h6>Basic Flowing Scarf</h6>
                          <h5>$98.49</h5>
                        </div>
                      </td>
                      <td className="quantity__item">
                        <div className="quantity">
                          <div className="pro-qty-2">
                            <input type="text" value={1} />
                          </div>
                        </div>
                      </td>
                      <div className="cart__price_item">
                        <td className="cart__price">$ 30.00</td>
                      </div>
                      <td className="cart__close">
                        <i className="ti-close"></i>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div className="row">
                <div className="continue-item">
                  <div className="continue__btn">
                    <a href="#">Continue Shopping</a>
                  </div>{" "}
                  <div className="continue__btn update__btn_cart">
                    <a href="#">
                      <i className="fa fa-spinner"></i> Update cart
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div className="col-lg-4">
              <div className="cart__discount">
                <h6>Discount codes</h6>
                <form action="#">
                  <input type="text" placeholder="Conpon code" />
                  <button type="submit">Apply</button>
                </form>
              </div>
              <div className="cart__total">
                <h6>Cart total</h6>
                <ul>
                  <li>
                    Subtotal <span>$ 169.50</span>
                  </li>
                  <li>
                    Total <span>$ 169.50</span>
                  </li>
                </ul>
                <a href="#" className="primary-btn">
                  Proceed to checkout
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      {/* <!-- Shopping Cart Section End --> */}
    </>
  );
};

export default Cart;

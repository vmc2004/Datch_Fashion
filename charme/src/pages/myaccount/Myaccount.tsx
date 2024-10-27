import { useEffect, useState } from "react";
import "./Myaccount.scss";
import { Order } from "../../types/Order";
import { instance } from "../../apis";

type Props = {};

const Myaccount = (props: Props) => {
  const [order, setOrder] = useState<Order[]>([]);

  const getOrder = async () => {
    try {
      const response = await instance.get("/orders");
      setOrder(response.data.data);
      console.log(response);
    } catch (error) {
      console.error("There was an error fetching the products!", error);
    }
  };
  useEffect(() => {
    getOrder();
  }, []);
  const [activeSection, setActiveSection] = useState("accountpage");
  const renderContent = () => {
    switch (activeSection) {
      case "accountpage":
        return (
          <div className="accountpage-title">
            <p>
              {" "}
              Xin chào hieutvph44496@fpt.edu.vn (không phải tài khoản
              hieutvph44496@fpt.edu.vn? Hãy thoát ra và đăng nhập vào tài khoản
              của bạn)
            </p>
            <p>
              {" "}
              Từ trang quản lý tài khoản bạn có thể xem đơn hàng mới, quản lý
              địa chỉ giao hàng và thanh toán, và sửa mật khẩu và thông tin tài
              khoản.
            </p>
          </div>
        );
      case "order":
        return (
          <div>
            {order.map((order, index) => (
              <div key={index}>
                <div>{order.email}</div>
              </div>
            ))}
          </div>
        );
      case "download":
        return <div>abcdxyzss</div>;
      case "address":
        return <div className="address-item"></div>;
      case "account":
        return (
          <div className="account-content">
            <div className="fullname">
              <div className="name">
                <label>Tên</label>
                <input type="text" />
              </div>
              <div className="surname">
                <label>Họ</label>
                <input type="text" />
              </div>
            </div>
            <div>
              <label>Tên hiển thị</label>
              <input type="text" />
              <p>
                tên này hiển thị trong trang Tài khoản và phần đánh giá sản phẩm
              </p>
            </div>
            <div>
              <label>Địa chủ Email</label>
              <input type="text" />
            </div>
            <div>
              <p>Thay đổi mật khẩu</p>
              <div>
                <label>Mật khẩu hiện tại(bỏ trống nếu không thay đổi)</label>
                <input type="text" />
              </div>
              <div>
                <label>Mật khẩu mới(bỏ trống nếu không thay đổi)</label>
                <input type="text" />
              </div>
              <div>
                <label>
                  Xác nhận mật khẩu mới(bỏ trống nếu không thay đổi)
                </label>
                <input type="text" />
              </div>
            </div>
            <div>
              <button>Lưu thay đổi</button>
            </div>
          </div>
        );
      default:
        return null; // Trả về null nếu không có trường hợp nào khớp
    }
  };

  return (
    <div className="myaccount">
      <div className="myaccount-left">
        <div
          className={`myaccount-left-title ${
            activeSection === "accountpage" ? "active" : ""
          }`}
          onClick={() => setActiveSection("accountpage")}
        >
          Trang tài khoản
        </div>
        <div
          className={`myaccount-left-title ${
            activeSection === "order" ? "active" : ""
          }`}
          onClick={() => setActiveSection("order")}
        >
          Đơn hàng
        </div>
        <div
          className={`myaccount-left-title ${
            activeSection === "download" ? "active" : ""
          }`}
          onClick={() => setActiveSection("download")}
        >
          Tải xuống
        </div>
        <div
          className={`myaccount-left-title ${
            activeSection === "address" ? "active" : ""
          }`}
          onClick={() => setActiveSection("address")}
        >
          Địa chỉ
        </div>
        <div
          className={`myaccount-left-title ${
            activeSection === "account" ? "active" : ""
          }`}
          onClick={() => setActiveSection("account")}
        >
          Tài khoản
        </div>
        <div className="myaccount-left-title">Log out</div>
      </div>
      <div className="myaccount-right">{renderContent()}</div>
    </div>
  );
};

export default Myaccount;

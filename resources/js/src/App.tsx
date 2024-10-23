import { useRoutes } from "react-router-dom";
import { ToastContainer } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";
import LayoutClient from "./layouts/layoutClient";
import Home from "./pages/Home/Home";
import Chitietsp from "./pages/chitietsanpham/Chitietsp";
import Danhmuc from "./pages/danhmuc/Danhmuc";
import Lienhe from "./pages/lienhe/Lienhe";
import Login from "./pages/login/Login";
import Myaccount from "./pages/myaccount/Myaccount";
import Register from "./pages/register/Register";
import Checkout from "./pages/thanhtoan/Checkout";
import Tintuc from "./pages/tintuc/Tintuc";
import Cart from "./pages/giohang/Cart";
function App() {
  const routes = useRoutes([
    {
      path: "",
      element: <LayoutClient />,
      children: [
        {
          path: "",
          element: <Home />,
        },
        {
          path: "products/:id",
          element: <Chitietsp />,
        },
        {
          path: "danhmuc",
          element: <Danhmuc />,
        },
        {
          path: "lienhe",
          element: <Lienhe />,
        },
        {
          path: "tintuc",
          element: <Tintuc />,
        },
        {
          path: "register",
          element: <Register />,
        },
        {
          path: "login",
          element: <Login />,
        },
        {
          path: "myaccount",
          element: <Myaccount />,
        },
        {
          path: "cart",
          element: <Cart />,
        },
        {
          path: "checkout",
          element: <Checkout />,
        },
      ],
    },
  ]);

  return (
    <>
      <ToastContainer />
      <div>{routes}</div>
    </>
  );
}

export default App;

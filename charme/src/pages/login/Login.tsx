import "./Login.scss";
const Login = () => {
  return (
    <>
      <div className="container-login">
        <form>
          <div className="form-login">
            <h2>Login</h2>
            <div className="form-group">
              <label className="form-lable">Email</label>
              <input
                type="text"
                className="form-control"
                placeholder="Email của bạn"
              />
            </div>
            <div className="form-group">
              <label className="form-lable">Mật khẩu</label>
              <input
                type="text"
                className="form-control"
                placeholder="Tạo mật khẩu mới của bạn"
              />
            </div>

            <div className="form-btn">
              <input type="submit" />
            </div>
          </div>
        </form>
      </div>
    </>
  );
};

export default Login;

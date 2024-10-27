import "./Register.scss";

const Register = () => {
  return (
    <>
      <div className="container-register">
        <form>
          <div className="form-register">
            <h2>Register</h2>
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

export default Register;

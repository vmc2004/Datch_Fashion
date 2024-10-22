import { useForm } from "react-hook-form";
import { instance } from "../../apis";
import "./Register.scss";
import { UserInputs } from "../../types/Auth";
import axios from "axios";
type RegisterFormParams = {
  username: string;
  email: string;
  password: string;
};
const Register = () => {
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm<UserInputs>();
  const onSubmit = async (value: RegisterFormParams) => {
    const response = await axios.post(
      "http://localhost:8000/api/register",
      value
    );
    console.log(response.data);
  };
  return (
    <>
      <div className="container-register">
        <form onSubmit={handleSubmit(onSubmit)}>
          <div className="form-register">
            <h2>Register</h2>
            <div className="form-group">
              <label className="form-lable">Email</label>
              <input
                type="text"
                className="form-control"
                placeholder="Email của bạn"
                {...register("email")}
              />
            </div>
            <div className="form-group">
              <label className="form-lable">Mật khẩu</label>
              <input
                type="text"
                className="form-control"
                placeholder="Tạo mật khẩu mới của bạn"
                {...register("password")}
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

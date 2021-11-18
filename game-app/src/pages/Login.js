import React from "react";
import {
  Card,
  Form,
  FormControl,
  FormGroup,
  Button,
  FormLabel,
} from "react-bootstrap";
import { useNavigate } from "react-router";

const Login = ({ user, setUser, judul }) => {
  const navigate = useNavigate();

  React.useEffect(() => {
    if (user) {
      navigate("/");
    }
  }, []);

  const isLogin = (e) => {
    e.preventDefault();
    const data = {
      email: e.target.username.value,
      password: e.target.password.value,
    };
    postLogin(data);
  };

  const postLogin = async (data) => {
    try {
      const response = await fetch("http://127.0.0.1:8000/api/login", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data),
      });

      const user = await response.json();

      if (user.status === "success") {
        localStorage.setItem("user", JSON.stringify(user.data));
        setUser(user.data);
        navigate("/");
      } else {
        alert("Username atau password salah");
      }
    } catch (e) {
      alert("Username atau password salah");
    }
  };

  return (
    <Card className="my-5">
      <Form onSubmit={isLogin}>
        <Card.Title>
          <h2 className="text-center my-4">{judul}</h2>
        </Card.Title>
        <Card.Body>
          <FormGroup>
            <FormLabel>Username</FormLabel>
            <FormControl placeholder="Username" name="username" />
          </FormGroup>
          <FormGroup>
            <FormLabel>Password</FormLabel>
            <FormControl
              type="password"
              placeholder="Password"
              name="password"
            />
          </FormGroup>
        </Card.Body>
        <Card.Footer className="d-grid gap-2">
          <Button type="submit" variant="success">
            Login
          </Button>
        </Card.Footer>
      </Form>
    </Card>
  );
};

export default Login;

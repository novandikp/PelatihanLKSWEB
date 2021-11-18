import Navigation from "../component/Navigation";
import Home from "./Home";
import "../styles/style.css";
import { Container } from "react-bootstrap";
import { Route, Routes } from "react-router";
import Login from "./Login";
import React from "react";
import Detail from "./Detail";
const Homepage = () => {
  const getDataUser = () => {
    if (localStorage.getItem("user")) {
      return JSON.parse(localStorage.getItem("user"));
    }
    return null;
  };
  const [user, setUser] = React.useState(getDataUser());
  return (
    <div>
      <Navigation user={user} setUser={setUser} />
      <Container>
        <Routes>
          <Route path="/" element={<Home />} />
          <Route
            path="/login"
            element={<Login judul="Masuk" user={user} setUser={setUser} />}
          />
          <Route path="/game/:id" element={<Detail />} />
        </Routes>
      </Container>
    </div>
  );
};

export default Homepage;

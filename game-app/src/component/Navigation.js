import { Navbar, Nav, Container } from "react-bootstrap";
import { Link } from "react-router-dom";
const Navigation = ({ user, setUser }) => {
  return (
    <Navbar variant="dark" expand="lg">
      <Container>
        <Navbar.Brand href="#home">Game Store</Navbar.Brand>
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="ms-auto">
            <Link className="nav-link" to="/">
              Home
            </Link>
            {user ? (
              <Nav.Link
                onClick={(e) => {
                  e.preventDefault();
                  setUser(null);
                  localStorage.removeItem("user");
                }}
              >
                Logout
              </Nav.Link>
            ) : (
              <Link className="nav-link" to="/login">
                Login
              </Link>
            )}
          </Nav>
        </Navbar.Collapse>
      </Container>
    </Navbar>
  );
};

export default Navigation;

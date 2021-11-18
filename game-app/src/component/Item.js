import { Col, Card, Button } from "react-bootstrap";
import { Link } from "react-router-dom";

const Item = ({ game }) => {
  const img =
    game.asset.length > 0
      ? "http://127.0.0.1:8000/assets/images/game/" +
        game.id +
        "/" +
        game.asset[0].path
      : "https://images.bizlaw.id/gbr_artikel/images-2_294.webp";
  return (
    <Col lg={3} md={4} xs={6}>
      <Card className="mt-2">
        <Card.Img variant="top" src={img} />
        <Card.Body>
          <Card.Title>{game.name}</Card.Title>
          <Card.Text>{game.description}</Card.Text>
          <Link className="btn btn-primary" to={"/game/" + game.homepage}>
            Detail
          </Link>
        </Card.Body>
      </Card>
    </Col>
  );
};

export default Item;

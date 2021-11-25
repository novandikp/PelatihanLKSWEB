import { Card } from "react-bootstrap";
import Ratingbar from "./Ratingbar";

const Komentar = ({ item }) => {
  return (
    <Card className="mt-2">
      <Card.Body>
        <Ratingbar rate={item ? item.rate : 0} />
        <h5 className="mt-2">{item.user.name}</h5>
        <p>{item.message}</p>
      </Card.Body>
    </Card>
  );
};

export default Komentar;

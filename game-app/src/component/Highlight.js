import { Carousel } from "react-bootstrap";

const Highlight = ({ item }) => {
  return (
    <Carousel>
      {item.map((slide) => {
        const img =
          "http://127.0.0.1:8000/assets/images/game/" +
          slide.game_id +
          "/" +
          slide.path;
        return (
          <Carousel.Item>
            <img className="d-block w-100" src={img} alt="First slide" />
            <Carousel.Caption>
              <h3>{slide.name}</h3>
              <p>{slide.description}</p>
            </Carousel.Caption>
          </Carousel.Item>
        );
      })}
    </Carousel>
  );
};

export default Highlight;

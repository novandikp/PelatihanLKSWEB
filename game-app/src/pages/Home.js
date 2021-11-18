import React from "react";
import { Row } from "react-bootstrap";
import Highlight from "../component/Highlight";
import Item from "../component/Item";

const Home = () => {
  const [games, setGames] = React.useState([]);
  const [featured, setFeatured] = React.useState([]);

  const getDataGame = async () => {
    try {
      const data = await fetch("http://127.0.0.1:8000/api/game");
      const games = await data.json();
      setGames(games);
    } catch (e) {}
  };
  const getFeatured = async () => {
    try {
      const data = await fetch("http://127.0.0.1:8000/api/featured");
      const feature = await data.json();
      feature.map((item) => {
        item.name = item.game.name;
        item.description = item.game.description;
      });
      setFeatured(feature);
    } catch (e) {}
  };

  React.useEffect(() => {
    getDataGame();
    getFeatured();
  }, []);

  return (
    <div>
      <Highlight item={featured} />
      <Row>
        {games.map((game) => {
          return <Item key={game.id} game={game} />;
        })}
      </Row>
    </div>
  );
};

export default Home;

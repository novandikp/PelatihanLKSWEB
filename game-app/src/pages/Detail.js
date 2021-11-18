import React from "react";
import { Card } from "react-bootstrap";
import { useParams } from "react-router";
import Highlight from "../component/Highlight";
const Detail = () => {
  const [game, setGame] = React.useState();
  const [asset, setAsset] = React.useState([]);
  const { id } = useParams();

  React.useEffect(() => {
    getGame();
  }, []);

  const getGame = async () => {
    const response = await fetch("http://127.0.0.1:8000/api/game/" + id);
    const data = await response.json();
    data.asset.map((item) => {
      item.name = "";
      item.description = "";
    });
    setGame(data);
    setAsset(data.asset);
    console.log(data);
  };
  return (
    <div className="mt-4">
      {asset.length > 0 ? <Highlight item={asset} /> : <></>}
      <h1>{game ? game.name : ""}</h1>
      <p>{game?.description}</p>
      <p>By : {game?.developer.name}</p>

      <div className="mt-3">
        <h3>Komentar</h3>
        {game?.comments.map((item) => {
          return (
            <Card className="mt-2">
              <Card.Body>
                <p>{item.message}</p>
              </Card.Body>
            </Card>
          );
        })}
      </div>
    </div>
  );
};

export default Detail;

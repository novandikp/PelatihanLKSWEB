import React from "react";
import { Card } from "react-bootstrap";
import { useParams } from "react-router";
import Highlight from "../component/Highlight";
import Komentar from "../component/Komentar";
import PostKomentar from "../component/PostKomentar";
import Ratingbar from "../component/Ratingbar";

import Background from "../game/assets/space.png";
import Plane from "../game/assets/airplane.png";
import Ufo from "../game/assets/ufo.png";
import Laser from "../game/assets/laser.png";
import LaserSound from "../game/assets/laser.mp3";
import Boom from "../game/assets/bomb.mp3";

const Detail = () => {
  const [game, setGame] = React.useState();
  const [asset, setAsset] = React.useState([]);

  const { id } = useParams();

  React.useEffect(() => {
    getGame();
    //import external script
    const script = document.createElement("script");
    script.src = "http://localhost:3000/script.js";
    script.async = true;
    document.body.appendChild(script);
  }, []);

  const getIDUser = () => {
    if (localStorage.getItem("user")) {
      const { id } = JSON.parse(localStorage.getItem("user"));
      return id;
    }
    return null;
  };

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
      <img src={Background} id="background" class="d-none" />
      <img src={Ufo} id="ufo" class="d-none" />
      <img src={Plane} id="plane" class="d-none" />
      <img src={Laser} id="laser" class="d-none" />
      <audio id="laser-sound" src={LaserSound}></audio>
      <audio id="boom" src={Boom}></audio>
      <canvas id="canvas" width="750" height="750"></canvas>

      <h1>{game ? game.name : ""}</h1>
      <Ratingbar rate={game ? game.average_rating : 0} />
      <p>{game?.description}</p>
      <p>By : {game?.developer.name}</p>

      <div className="mt-3">
        <h3>Komentar</h3>
        {getIDUser() ? (
          <PostKomentar refresh={getGame} id_game={game?.id} className="my-2" />
        ) : (
          <></>
        )}

        <hr />
        {game?.comments.map((item) => {
          return <Komentar item={item} />;
        })}
      </div>
    </div>
  );
};

export default Detail;

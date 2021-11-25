import React from "react";
import { Col, FormControl, FormGroup, Row } from "react-bootstrap";
import Highlight from "../component/Highlight";
import Item from "../component/Item";

const Home = () => {
  const [games, setGames] = React.useState([]);
  const [carts, setCarts] = React.useState([]);
  const [featured, setFeatured] = React.useState([]);
  const [search, setSearch] = React.useState("");
  const getDataGame = async () => {
    try {
      const data = await fetch("http://127.0.0.1:8000/api/game");
      const games = await data.json();
      setGames(games);
    } catch (e) {}
  };
  const getIDUser = () => {
    if (localStorage.getItem("user")) {
      const { id } = JSON.parse(localStorage.getItem("user"));
      return id;

      //   const user = JSON.parse(localStorage.getItem("user"));
      //   return user.id;
    }
    return null;
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

  const handleDragOver = (e) => {
    e.preventDefault();
  };

  const handleDropCart = (e) => {
    const id = e.dataTransfer.getData("id");

    const game = games.find((item) => {
      return item.id == id;
    });
    if (game) {
      const game = games.find((item) => {
        return item.id == id;
      });
      setCarts((old) => [...old, game]);
      let dataGame = [...games];
      dataGame.splice(games.indexOf(game), 1);
      setGames(dataGame);
    }
  };

  const handleDropGame = (e) => {
    const id = e.dataTransfer.getData("id");
    const cart = carts.find((item) => {
      return item.id == id;
    });
    if (cart) {
      setGames((old) => [...old, cart]);
      let dataCart = [...carts];
      dataCart.splice(carts.indexOf(cart), 1);
      setCarts(dataCart);
    }
  };

  return (
    <div>
      <Highlight item={featured} />
      <h5 className="mt-2 mb-1">Pencarian Game</h5>

      <Row className="mt-2">
        <Col
          onDragOver={handleDragOver}
          onDrop={handleDropGame}
          className="p-2"
          xs={6}
        >
          <FormControl
            classname="my-2"
            value={search}
            onChange={(e) => setSearch(e.target.value)}
            type="text"
            placeholder="Search"
          />
          <Row>
            {games
              .filter((e) => {
                return e.name.toLowerCase().includes(search.toLowerCase());
              })
              .map((game) => {
                return <Item key={game.id} game={game} />;
              })}
          </Row>
        </Col>
        <Col
          onDragOver={handleDragOver}
          onDrop={handleDropCart}
          className="bg-primary p-2"
          xs={6}
        >
          {getIDUser() ? (
            <>
              <h3>Keranjang</h3>
              <Row>
                {carts.map((game) => {
                  return <Item key={game.id} game={game} />;
                })}
              </Row>
            </>
          ) : (
            <div>
              <h3 className="text-danger text-center">
                Harap login dulu untuk membuka keranjang
              </h3>
            </div>
          )}
        </Col>
      </Row>
    </div>
  );
};

export default Home;

import React from "react";
import { Form, Button } from "react-bootstrap";
import Ratingbar from "./Ratingbar";

const PostKomentar = ({ id_game, refresh }) => {
  const [rate, setRate] = React.useState(0);

  const getIDUser = () => {
    if (localStorage.getItem("user")) {
      const { id } = JSON.parse(localStorage.getItem("user"));
      return id;

      //   const user = JSON.parse(localStorage.getItem("user"));
      //   return user.id;
    }
    return null;
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    const message = e.target.komentar.value;
    if (message.trim().length === 0) {
      alert("Harap isi pesan dahulu");
      return;
    }
    const idUser = getIDUser();
    const data = {
      user_id: idUser,
      game_id: id_game,
      rate,
      message,
    };
    try {
      const response = await fetch("http://127.0.0.1:8000/api/komentar", {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
          "Content-Type": "application/json",
        },
      });
      const result = await response.json();
      e.target.komentar.value = "";
      setRate(0);
      refresh();
    } catch (error) {}
  };
  return (
    <Form onSubmit={handleSubmit}>
      <h5>Tulis Komentar</h5>
      <Ratingbar rate={rate} setRate={setRate} enabled={true} />
      <textarea name="komentar" className="form-control my-2"></textarea>
      <Button type="submit">Post</Button>
    </Form>
  );
};

export default PostKomentar;

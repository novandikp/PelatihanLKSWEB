import React from "react";
import * as Icon from "react-bootstrap-icons";

const Ratingbar = ({ rate, setRate, enabled }) => {
  //
  const maxRate = 5;
  const emptyRate = maxRate - rate;

  const handleClick = (index) => {
    if (enabled) {
      setRate(index);
    }
  };
  return (
    <div>
      {[...Array(rate)].map((e, i) => {
        return (
          <Icon.StarFill
            size={20}
            onClick={() => handleClick(i + 1)}
            color="gold"
          />
        );
      })}
      {[...Array(emptyRate)].map((e, i) => {
        return (
          <Icon.Star
            size={20}
            onClick={() => handleClick(rate + i + 1)}
            color="gold"
          />
        );
      })}
    </div>
  );
};

export default Ratingbar;

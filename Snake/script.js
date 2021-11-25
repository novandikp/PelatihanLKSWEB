const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
const height = canvas.height;
const width = canvas.width;

// Variables
const size = 50;

let currentLocation = { x: 0, y: 0 };
let snakeBody = [{ x: 0, y: 0 }];
const initTail = 4;
let tails = initTail;
let gameloop;
let direction;

let appleLocation = { x: 350, y: 350 };

window.onload = function () {
  gameloop = setInterval(draw, 150);
  document.onkeydown = controller;
};

const draw = function () {
  handlerSnake();
  drawBackground();
  drawSnake();
  drawApple();
  collision();
  drawScore();
};

const randFood = function () {
  const x = Math.floor(Math.random() * (width / size)) * size;
  const y = Math.floor(Math.random() * (height / size)) * size;
  snakeBody.forEach(function (e, i, array) {
    if (e.x == x && e.y == y) {
      randFood();
    }
  });
  appleLocation = {
    x: x,
    y: y,
  };
};

const collision = function () {
  if (
    currentLocation.x == appleLocation.x &&
    currentLocation.y == appleLocation.y
  ) {
    tails += 10;
    randFood();
  }
};

const drawApple = function () {
  ctx.fillStyle = "red";
  ctx.fillRect(appleLocation.x, appleLocation.y, size, size);
};

const drawSnake = function () {
  snakeBody.forEach(function (e, i, array) {
    if (i == snakeBody.length - 1) {
      ctx.fillStyle = "blue";
    } else {
      ctx.fillStyle = "green";
    }

    ctx.fillRect(e.x, e.y, size, size);

    // Destroy himself
    if (i != 0 && tails > 5) {
      if (e.x == currentLocation.x && e.y == currentLocation.y) {
        alert("Game Over");
        clearInterval(gameloop);
      }
    }
  });

  snakeBody.push({ x: currentLocation.x, y: currentLocation.y });
  while (snakeBody.length > tails) {
    snakeBody.shift();
  }

  //
};

const drawScore = function () {
  ctx.fillStyle = "white";
  ctx.font = "20px Arial";
  ctx.fillText(`Score: ${tails - initTail}`, 10, 20);
};

const drawBackground = function () {
  ctx.fillStyle = "black";
  ctx.fillRect(0, 0, width, height);
};

const handlerSnake = function () {
  if (direction == "down") {
    currentLocation.y += size;
  } else if (direction == "up") {
    currentLocation.y -= size;
  } else if (direction == "left") {
    currentLocation.x -= size;
  } else if (direction == "right") {
    currentLocation.x += size;
  }

  // Outside area

  if (currentLocation.x > width - size) {
    currentLocation.x = 0;
  } else if (currentLocation.x < 0) {
    currentLocation.x = width;
  } else if (currentLocation.y > height - size) {
    currentLocation.y = 0;
  } else if (currentLocation.y < 0) {
    currentLocation.y = height;
  }
};

const controller = function (e) {
  if (e.key == "ArrowDown" && direction != "up") {
    direction = "down";
  } else if (e.key == "ArrowUp" && direction != "down") {
    direction = "up";
  } else if (e.key == "ArrowLeft" && direction != "right") {
    direction = "left";
  } else if (e.key == "ArrowRight" && direction != "left") {
    direction = "right";
  }
};

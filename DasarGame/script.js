const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
const width = canvas.width;
const height = canvas.height;

const widthPlayer = 50;
const heightPlayer = 50;

let xPlayer = 0;
let yPlayer = 0;

const widthEnemy = 50;
const heightEnemy = 50;

let xEnemy = 100;
let yEnemy = 100;

let score = 0;

window.onload = function () {
  setInterval(gameLoop, 100);
  document.onkeydown = controller;
};

const controller = (e) => {
  switch (e.key) {
    case "ArrowUp":
      yPlayer -= 50;
      break;
    case "ArrowDown":
      yPlayer += 50;
      break;
    case "ArrowLeft":
      xPlayer -= 50;
      break;
    case "ArrowRight":
      xPlayer += 50;
      break;
  }

  //tembus kembali lagi
  if (yPlayer > height - heightPlayer) {
    yPlayer = 0;
  } else if (yPlayer < 0) {
    yPlayer = height - heightPlayer;
  } else if (xPlayer > width - widthPlayer) {
    xPlayer = 0;
  } else if (xPlayer < 0) {
    xPlayer = width - widthPlayer;
  }
  //terbatas
  //   if (yPlayer > height - heightPlayer) {

  //     yPlayer = height - heightPlayer;
  //   } else if (yPlayer < 0) {
  //     yPlayer = 0;
  //   } else if (xPlayer > width - widthPlayer) {
  //     xPlayer = width - widthPlayer;
  //   } else if (xPlayer < 0) {

  //     xPlayer = 0;
  //   }
};

const gameLoop = () => {
  drawBackground();
  drawPlayer();
  drawEnemy();
  collision();
  drawScore();
};

const collision = () => {
  if (
    xPlayer < xEnemy + widthEnemy &&
    xPlayer + widthPlayer > xEnemy &&
    yPlayer < yEnemy + heightEnemy &&
    yPlayer + heightPlayer > yEnemy
  ) {
    score++;
    const gridWidth = width / widthEnemy - 1; // 9
    const gridHeight = height / heightEnemy - 1; //9
    xEnemy = Math.floor(Math.random() * gridWidth) * widthEnemy;
    yEnemy = Math.floor(Math.random() * gridHeight) * heightEnemy;
  }
};

const drawScore = () => {
  ctx.font = "12px Arial";
  ctx.fillStyle = "white";
  ctx.fillText(`Score: ${score}`, 10, 30);
};

const drawBackground = () => {
  ctx.fillStyle = "black";
  ctx.fillRect(0, 0, width, height);
};

const drawPlayer = () => {
  ctx.fillStyle = "green";
  ctx.fillRect(xPlayer, yPlayer, widthPlayer, heightPlayer);
};

const drawEnemy = () => {
  ctx.fillStyle = "red";
  ctx.fillRect(xEnemy, yEnemy, widthEnemy, heightEnemy);
};

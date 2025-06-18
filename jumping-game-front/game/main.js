import Phaser from "phaser";
import GameScene from "./gamescene.js";

const config = {
  type: Phaser.AUTO,
  width: 800,
  height: 600,
  backgroundColor: "#1d1d1d",
  parent: "game",
  scene: [GameScene],
  physics: {
    default: "arcade",
    arcade: {
      gravity: { y: 600 },
      debug: true,
    },
  },
};

new Phaser.Game(config);

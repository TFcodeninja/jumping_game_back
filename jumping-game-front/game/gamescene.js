export default class GameScene extends Phaser.Scene {
    constructor() {
        super("GameScene");
        this.platforms = [];
        this.enemies = [];
    }

    async preload() {
        try {
            // Charger les plateformes depuis le back
            const platformRes = await fetch(
                "http://localhost:8000/api/platforms"
            );
            if (!platformRes.ok) throw new Error("Failed to fetch platforms");
            this.platforms = await platformRes.json();

            // Charger les ennemis depuis le back
            const enemyRes = await fetch("http://localhost:8000/api/enemies");
            if (!enemyRes.ok) throw new Error("Failed to fetch enemies");
            this.enemies = await enemyRes.json();

            // Charger les assets (1 image pour l'instant)
            this.load.image("platform", "/game/assets/platform.png");

            // Vérifier si this.enemies existe avant d'utiliser forEach
            if (Array.isArray(this.enemies)) {
                this.enemies.forEach((enemy) => {
                    if (enemy && enemy.name && enemy.imagePath) {
                        this.load.image(enemy.name, enemy.imagePath);
                    }
                });
            }
        } catch (error) {
            console.error("Error loading game data:", error);
            // Initialiser avec des valeurs par défaut en cas d'erreur
            this.platforms = [];
            this.enemies = [];
        }
    }

    create() {
        this.add.text(20, 20, "Plateformes et ennemis chargés depuis API 🔗", {
            font: "16px Arial",
            fill: "#ffffff",
        });

        // Vérifier si this.platforms existe et est un tableau
        if (Array.isArray(this.platforms)) {
            // Ajouter les plateformes dans un groupe statique
            this.platformGroup = this.physics.add.staticGroup();
            this.platforms.forEach((platformData) => {
                if (
                    platformData &&
                    platformData.positionX &&
                    platformData.positionY
                ) {
                    const platform = this.platformGroup.create(
                        platformData.positionX,
                        platformData.positionY,
                        "platform"
                    );
                    platform.setDisplaySize(
                        platformData.width || 100,
                        platformData.height || 20
                    );
                    platform.refreshBody();
                }
            });
        }

        // Vérifier si this.enemies existe et est un tableau
        if (Array.isArray(this.enemies)) {
            // Affichage des ennemis
            this.enemies.forEach((enemy, i) => {
                if (enemy && enemy.name) {
                    this.add
                        .image(100 + i * 100, 300, enemy.name)
                        .setScale(0.5);
                }
            });
        }
    }
}

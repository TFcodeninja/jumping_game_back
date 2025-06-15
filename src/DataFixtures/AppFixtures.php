<?php

namespace App\DataFixtures;

use App\Entity\Enemy;
use App\Entity\Item;
use App\Entity\Player;
use App\Entity\Platform;
use App\Entity\Score;
use app\entity\projectile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // 1. Joueur de test
        $player = new Player();
        $player->setUsername('TestPlayer');
        $player->setLives(3);
        $player->setMaxScore(1800);
        $player->setCreatedAt(new \DateTime());
        $player->setHasWeapon(true);
        $manager->persist($player);

        // 2. Score lié au joueur
        $score = new Score();
        $score->setValue(1500);
        $score->setDuration(90);
        $score->setCreatedAt(new \DateTime());
        $score->setPlayer($player); // association avec le joueur
        $manager->persist($score);

        // 3. Ennemis de test
        for ($i = 0; $i < 5; $i++) {
            $enemy = new Enemy();
            $enemy->setName("Enemy-$i");
            $enemy->setHealth(100);
            $enemy->setDamage(10);
            $enemy->setSpeed(1.5);
            $enemy->setSize('medium');
            $enemy->setSpawnFrequency(0.25);
            $enemy->setImagePath('/images/enemy.png');
            $manager->persist($enemy);
        }

        // 4. Items de test
        $itemNames = ['extra_life', 'boost_jump', 'shield'];
        foreach ($itemNames as $name) {
            $item = new Item();
            $item->setName($name);
            $item->setEffectType($name);
            $item->setValue(1);
            $item->setDuration(5);
            $item->setImagePath('/images/items/' . $name . '.png');
            $manager->persist($item);
        }

        // 5. Plateformes de test
        $types = ['static', 'moving', 'breakable'];
        $movements = ['none', 'left-right', 'up-down'];

        for ($i = 0; $i < 5; $i++) {
            $platform = new Platform();
            $platform->setType($types[array_rand($types)]);
            $platform->setPositions(rand(0, 300));
            $platform->setPositionY(rand(0, 600));
            $platform->setWidth(80);
            $platform->setHeight(20);
            $platform->setMovement($movements[array_rand($movements)]);
            $platform->setSpeed(rand(1, 3));
            $platform->setImagePath('/images/platform.png');
            $manager->persist($platform);
        }
        // 6. projectiles de test liés au joueur
        for ($i = 0; $i < 5; $i++) {
            $projectile = new projectile();
            $projectile->setspeed(rand(5, 15));
            $projectile->setdirection('up');
            $projectile->setdamage(rand(10, 30));
            $projectile->setcreatedat(new \datetime());
            $projectile->setplayer($player); // lien avec le joueur
            $projectile->setimagepath('/images/projectile.png');
            $manager->persist($projectile);
}

        // Enregistrement final
        $manager->flush();
    }
}

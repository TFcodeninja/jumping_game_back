<?php

namespace App\DataFixtures;

use App\Entity\Enemy;
use App\Entity\Item;
use App\Entity\Player;
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
        $player->setMaxScore(1500);
        $player->setCreatedAt(new \DateTime());
        $player->setHasWeapon(true);
        $manager->persist($player);

        // 2. Ennemis de test
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

        // 3. Items de test
        $itemNames = ['extra_life', 'boost_jump', 'shield'];
        foreach ($itemNames as $name) {
            $item = new Item();
            $item->setName($name);
            $item->setEffectType($name);
            $item->setValue(1);
            $item->setDuration(5);
            $item->setImagePath('/images/items/'.$name.'.png');
            $manager->persist($item);
        }

        $manager->flush();
    }
}

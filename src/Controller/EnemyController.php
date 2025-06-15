<?php

namespace App\Controller;

use App\Repository\EnemyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class EnemyController extends AbstractController
{
    #[Route('/api/enemies', name: 'api_enemies', methods: ['GET'])]
    public function index(EnemyRepository $enemyRepository): JsonResponse
    {
        $enemies = $enemyRepository->findAll();

        $data = [];

        foreach ($enemies as $enemy) {
            $data[] = [
                'id' => $enemy->getId(),
                'name' => $enemy->getName(),
                'health' => $enemy->getHealth(),
                'damage' => $enemy->getDamage(),
                'speed' => $enemy->getSpeed(),
                'size' => $enemy->getSize(),
                'spawnFrequency' => $enemy->getSpawnFrequency(),
                'imagePath' => $enemy->getImagePath(),
            ];
        }

        return new JsonResponse($data);
    }
}

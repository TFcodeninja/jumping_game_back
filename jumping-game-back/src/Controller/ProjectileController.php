<?php

namespace App\Controller;

use App\Repository\ProjectileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProjectileController extends AbstractController
{
    #[Route('/api/projectiles', name: 'api_projectiles', methods: ['GET'])]
    public function index(ProjectileRepository $projectileRepository): JsonResponse
    {
        $projectiles = $projectileRepository->findAll();

        $data = [];

        foreach ($projectiles as $projectile) {
            $data[] = [
                'id' => $projectile->getId(),
                'speed' => $projectile->getSpeed(),
                'direction' => $projectile->getDirection(),
                'damage' => $projectile->getDamage(),
                'createdAt' => $projectile->getCreatedAt()?->format('Y-m-d H:i:s'),
                'player' => $projectile->getPlayer()?->getUsername(),
                'imagePath' => $projectile->getImagePath(),
            ];
        }

        return new JsonResponse($data);
    }
}

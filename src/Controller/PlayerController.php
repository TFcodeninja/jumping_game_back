<?php

namespace App\Controller;

use App\Repository\PlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PlayerController extends AbstractController
{
    #[Route('/api/players', name: 'api_players', methods: ['GET'])]
    public function index(PlayerRepository $playerRepository): JsonResponse
    {
        $players = $playerRepository->findAll();

        $data = [];

        foreach ($players as $player) {
            $data[] = [
                'id' => $player->getId(),
                'username' => $player->getUsername(),
                'lives' => $player->getLives(),
                'maxScore' => $player->getMaxScore(),
                'hasWeapon' => $player->getHasWeapon(),
                'createdAt' => $player->getCreatedAt()?->format('Y-m-d H:i:s'),
            ];
        }

        return new JsonResponse($data);
    }
}

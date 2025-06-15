<?php

namespace App\Controller;

use App\Repository\PlatformRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PlatformController extends AbstractController
{
    #[Route('/api/platforms', name: 'api_platforms', methods: ['GET'])]
    public function index(PlatformRepository $platformRepository): JsonResponse
    {
        $platforms = $platformRepository->findAll();

        $data = [];

        foreach ($platforms as $platform) {
            $data[] = [
                'id' => $platform->getId(),
                'type' => $platform->getType(),
                'positionX' => $platform->getPositions(),
                'positionY' => $platform->getPositionY(),
                'width' => $platform->getWidth(),
                'height' => $platform->getHeight(),
                'movement' => $platform->getMovement(),
                'speed' => $platform->getSpeed(),
                'imagePath' => $platform->getImagePath(),
            ];
        }

        return new JsonResponse($data);
    }
}


<?php

namespace App\Controller;

use App\Repository\ScoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ScoreController extends AbstractController
{
    #[Route('/api/scores', name: 'api_scores', methods: ['GET'])]
    public function index(ScoreRepository $scoreRepository): JsonResponse
    {
        $scores = $scoreRepository->findAll();

        $data = [];

        foreach ($scores as $score) {
            $data[] = [
                'id' => $score->getId(),
                'value' => $score->getValue(),
                'duration' => $score->getDuration(),
                'createdAt' => $score->getCreatedAt()?->format('Y-m-d H:i:s'),
                'player' => $score->getPlayer()?->getUsername(), // raccourci utile
            ];
        }

        return new JsonResponse($data);
    }
}

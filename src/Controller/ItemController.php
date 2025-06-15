<?php

namespace App\Controller;

use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{
    #[Route('/api/items', name: 'api_items', methods: ['GET'])]
    public function index(ItemRepository $itemRepository): JsonResponse
    {
        $items = $itemRepository->findAll();

        $data = [];

        foreach ($items as $item) {
            $data[] = [
                'id' => $item->getId(),
                'name' => $item->getName(),
                'effectType' => $item->getEffectType(),
                'value' => $item->getValue(),
                'duration' => $item->getDuration(),
                'imagePath' => $item->getImagePath(),
            ];
        }

        return new JsonResponse($data);
    }
}

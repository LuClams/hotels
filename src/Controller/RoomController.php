<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoomController extends AbstractController
{
    #[Route('/rooms', name: 'app_rooms_index')]
    public function index(RoomRepository $roomRepository): Response
    {
        $rooms = $roomRepository->findAll();
        return $this->render('room/index.html.twig', [
            'controller_name' => 'RoomController',
            'rooms' => $rooms
        ]);
    }

    /**
     * Permet d'afficher une seule Suite
     * @return Response
     */
    #[Route('/rooms/{title}', name: 'app_rooms_show')]
    public function show($title, RoomRepository $roomRepository) {
        // Je récupère la Suite qui correspond au title-
        $room = $roomRepository->findOneByTitle($title);

        return $this->render('room/show.html.twig', [
            'room' => $room
        ]);

    }
}

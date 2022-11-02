<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Room;
use App\Form\BookingFormType;
use App\Repository\RoomRepository;
use App\Repository\SlideimageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function show($title, RoomRepository $roomRepository, SlideimageRepository $slideimageRepository) {
        // Je récupère la Suite qui correspond au title-
        $room = $roomRepository->findOneByTitle($title);
        $slides = $slideimageRepository->findByRoom($title);
        return $this->render('room/show.html.twig', [
            'room' => $room,
            'slideimages' => $slides
        ]);

    }

    #[Route('/rooms/create', name: 'app_room_create')]
    public function inde(Room $room, Request $request, EntityManagerInterface $entityManager)
    {
        $newroom = new Room();

        $form = $this->createForm(BookingFormType::class, $newroom);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$bookings->createdAt(new \DateTime());
            $user = $this->getUser();


            $newroom->setSupervisor($user);


                $entityManager->persist($newroom);
                $entityManager->flush();

        }
        return $this->render('room/create.html.twig', [
            'newroom' => $newroom,
            'form' => $form->createView()
        ]);

    }
}

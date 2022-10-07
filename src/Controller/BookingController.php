<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Room;
use App\Form\BookingFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{
    #[Route('/booking', name: 'app_booking')]
    public function index(Room $room, Request $request, EntityManagerInterface $entityManager)
    {
        $bookings = new Booking();

        $form = $this->createForm(BookingFormType::class, $bookings);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$booking->setSentAt(new \DateTime());
            $user = $this->getUser();


            $bookings->setBooker($user)
                     ->setRoom($room);
            // Si les dates ne sont pas disponibles , message d'erreur
            if(!$bookings->isBookableDates()) {
                $this->addFlash(
                    'warning',
                    "Les dates que vous avez choisi sont indisponibles"
                );
            } else {
                $entityManager->persist($bookings);
                $entityManager->flush();

                $this->addFlash(
                    'success',
                    'Réservation effectuée'
                );

                return $this->redirectToRoute('app_account');
            }
        }
        return $this->render('booking/booking.html.twig', [
            'controller_name' => 'BookingController',
            'room' => $room,
            'form' => $form->createView()
        ]);

    }
}

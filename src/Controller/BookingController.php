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
    #[Route('/rooms/{title}/book', name: 'app_booking_create')]
    public function index(Room $room, Request $request, EntityManagerInterface $entityManager)
    {
        $bookings = new Booking();

        $form = $this->createForm(BookingFormType::class, $bookings);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$bookings->createdAt(new \DateTime());
            $user = $this->getUser();


            $bookings->setBooker($user)
                     ->setRoom($room)
                     ->setAmount($bookings->getRoom()->getPrice() * $bookings->getDuration());
            // Si les dates ne sont pas disponibles , message d'erreur
            if(!$bookings->isBookableDates()) {
                $this->addFlash(
                    'warning',
                    "Les dates que vous avez choisi sont indisponibles"
                );
            } else {
                $entityManager->persist($bookings);
                $entityManager->flush();

                return $this->redirectToRoute('app_booking_show', ['id' => $bookings->getId(), 'withSuccess' => true]);
            }
        }
        return $this->render('booking/book.html.twig', [
            'room' => $room,
            'form' => $form->createView()
        ]);

    }

    #[Route('/booking/{id}', name:'app_booking_show')]
    public function show(Booking $booking) {

        return $this->render('booking/show.html.twig', [
            'booking' => $booking
        ]);

    }

}

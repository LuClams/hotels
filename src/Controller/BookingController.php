<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Contact;
use App\Entity\Room;
use App\Form\BookingFormType;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{
    #[Route('/booking', name: 'app_booking')]
    public function index(Request $request, EntityManagerInterface $entityManager, Room $room): Response
    {
        $booking = new Booking();

        $form = $this->createForm(BookingFormType::class, $booking);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$booking->setSentAt(new \DateTime());
            $user = $this->getUser();

            $booking->setBooker($user)
                    ->setRoom($room);
            // Si les dates ne sont pas disponibles , message d'erreur
            if(!$booking->isBookableDates()) {
                $this->addFlash(
                    'warning',
                    "Les dates que vous avez choisi sont indisponibles"
                );
            } else {


            $entityManager->persist($booking);
            $entityManager->flush();

            $this->addFlash('success', 'Réservation effectuée');

            return $this->redirectToRoute('app_account');
            }
        }
        return $this->render('hotel/roomhyatt.html.twig', [
            'controller_name' => 'BookingController',
            'form' => $form->createView()
        ]);

    }
}

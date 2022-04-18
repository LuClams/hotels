<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Contact;
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
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $booking = new Booking();

        $form = $this->createForm(BookingFormType::class, $booking);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$booking->setSentAt(new \DateTime());

            $entityManager->persist($booking);
            $entityManager->flush();

            $this->addFlash('success', 'Message envoyé');

            return $this->redirectToRoute('contact');
        }
        return $this->render('booking/index.html.twig', [
            'controller_name' => 'BookingController',
            'form' => $form->createView()
        ]);

    }
}

<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Slideimage;
use App\Form\BookingFormType;
use App\Form\SlideimageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SlideimageController extends AbstractController
{
    #[Route('/slideimage', name: 'app_slideimage')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $slideimages = new Slideimage();

        $form = $this->createForm(SlideimageType::class, $slideimages);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           // $slideimage->createdAt(new \DateTime());
         //   $user = $this->getUser();

            $entityManager->persist($slideimages);
            $entityManager->flush();


           // $bookings->setBooker($user)
           //     ->setRoom($room)
           //     ->setAmount($bookings->getRoom()->getPrice() * $bookings->getDuration());
            // Si les dates ne sont pas disponibles , message d'erreur
         //   if(!$bookings->isBookableDates()) {
         //       $this->addFlash(
         //           'warning',
         //           "Les dates que vous avez choisi sont indisponibles"
         //       );
         //   } else {
         //       $entityManager->persist($bookings);
         //       $entityManager->flush();
         //
         //       return $this->redirectToRoute('app_booking_show', ['id' => $bookings->getId(), 'withSuccess' => true]);
         //   }
        }

        return $this->render('slideimage/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Room;
use App\Entity\User;
use App\Repository\BookingRepository;
use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
   #[Route('/account', name: 'app_account')]
   public function myAccount() {
      return $this->render('user/account.html.twig', [
          'user' => $this->getUser()
      ]);
   }


    // public function index(): Response
   // {
   //     return $this->render('account/account.html.twig', [
   //         'controller_name' => 'AccountController',
   //     ]);
   // }
//  #[Route('/user/{id}', name: 'app_user_show')]
//  public function index($booker, $user, BookingRepository $bookingRepository): Response
//  {
//      $bookings = $bookingRepository->findBy($booker);
//
//      return $this->render('inde.html.twig', [
//          'controller_name' => 'AccountController',
//          'bookings' => $bookings,
//          'user' => $user
//      ]);
//  }


    #[Route('/account/bookings', name: 'app_account_bookings')]
    public function bookings() {

        $user = $this->getUser();

        return $this->render('account/bookings.html.twig', [
            'user' => $user
        ]);
    }
}
<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Hostel;
use App\Entity\Room;
use App\Form\BookingFormType;
use App\Repository\HostelRepository;
use App\Repository\RoomRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HotelController extends AbstractController
{
     #[Route('/hotels', name: 'app_nos-hotels')]
     public function findHostel(HostelRepository $hostelRepository): Response
     {
         // Retourne un tableau avec tous les hotels en base de données
         $hostels = $hostelRepository->findAll();

         $westeen ='Westeen';
         $hyatt ='Hyatt';
         $cap ='Cap';
         $ibis ='Ibis';
         $hotelv ='Hotel V';
         $jazzy ='Jazzy';
         $yadel ='Yadel';
         return $this->render('hotel/nos-hotels.html.twig', [
             'controller_name' => 'HotelController',
             'hostels' => $hostels,
             'Westeen' => $westeen,
             'Hyatt' => $hyatt,
             'Cap' => $cap,
             'Ibis' => $ibis,
             'HotelV' => $hotelv,
             'Jazzy' => $jazzy,
             'Yadel' => $yadel
         ]);
     }

  //  /**
  //   * On cherche un utilisateur un paramètre username
  //   * @Route("/find-user/{username}")
  //   *
  //   * On indique que l'on attend un User en paramètre
  //   */
  //  public function findUserWithParamConverter(User $user): Response
  //  {
  //      return new Response('Utilisateur '.$user->getUsername().' récupéré depuis la base de données grâce au ParamConverter');
  //  }
  //
     #[Route('/hotel/{?name}', name: 'app_nos-hotels_{?name}')]
     public function findHostelWithParamConverter(Hostel $hostel): Response
     {
         //$hostel =
             dd($hostel->getName());

         // dump($hostelRepository->findAll());
         //
         // dump($hostelRepository->findBy([
         //     'name' => 'Hyatt',
         //     'city' => 'Paris'
         // ]));
         //
         // dump($hostelRepository->findByName('Westeen'));
         //
         // $hostel = $hostelRepository->find(2);
         // dump($hostel->getCity());
         //
         // dump($hostelRepository->findOneBy(['name' => 'Hyatt']));

         //dump($room->getTitle());
         //return new Response('<body></body>')

       // return $this->render('hotel/inde.html.twig', [
       //       'controller_name' => 'HotelController',
       //       'hostel' => $hostel
       //   ]);
     }



    #[Route('/hotel-hyatt', name: 'app_hotel_hyatt')]
    public function findRoomHyatt(RoomRepository $roomRepository): Response
    {
        // Retourne un tableau avec tous les hotels en base de données

        $hyattRooms =($roomRepository->findBy([
                     'hostel' => '2'
                 ]));
        $img = "https://cdn.pixabay.com/photo/2014/05/18/19/15/walkway-347319__480.jpg";

        return $this->render('hotel/hyatt.html.twig', [
            'controller_name' => 'HotelController',
            'rooms' => $hyattRooms,
            'img' => $img
        ]);
    }


   // #[Route('/hotel-westeen', name: 'app_hotel_westeen', requirements: ['id' => '/d+'])]
    #[Route('/hotel-westeen', name: 'app_hotel_westeen')]
    public function findRoomWesteen(RoomRepository $roomRepository): Response
    {

        $westeenRooms =($roomRepository->findBy([
            'hostel' => '1'
        ]));
        $img = "https://cdn.pixabay.com/photo/2014/07/10/17/17/hotel-389256__480.jpg";
        return $this->render('hotel/westeen.html.twig', [
            'controller_name' => 'HotelController',
            'img' => $img,
            'rooms' => $westeenRooms
        ]);
    }

    #[Route('/hotel-cap/', name: 'app_hotel_cap')]
    public function findRoomCap(RoomRepository $roomRepository): Response
    {
        $capRooms = $roomRepository->findBy([
            'hostel' => '3'
        ]);

        $img = "https://cdn.pixabay.com/photo/2015/09/21/09/53/villa-cortine-palace-949547__480.jpg";
        return $this->render('hotel/cap.html.twig', [
            'controller_name' => 'HotelController',
            'img' => $img,
            'rooms' => $capRooms
        ]);
    }

    #[Route('/hotel-ibis/', name: 'app_hotel_ibis', requirements: ['id' => '/d+'])]
    public function findRoomIbis(RoomRepository $roomRepository): Response
    {
        $ibisRooms = $roomRepository->findBy([
            'hostel' => '4'
        ]);

        $img = "https://cdn.pixabay.com/photo/2014/05/30/18/30/vancouver-358515__480.jpg";
        return $this->render('hotel/ibis.html.twig', [
            'controller_name' => 'HotelController',
            'img' => $img,
            'rooms' => $ibisRooms
        ]);
    }


    #[Route('/hotel-hotel-v/', name: 'app_hotel_hotel-v')]
    public function findRoomHotelv(RoomRepository $roomRepository): Response
    {
        $hotelvRooms = $roomRepository->findBy([
            'hostel' => '5'
        ]);

        $img = "https://cdn.pixabay.com/photo/2015/09/21/09/54/villa-cortine-palace-949552__480.jpg";
        return $this->render('hotel/hotel-v.html.twig', [
            'controller_name' => 'HotelController',
            'img' => $img,
            'rooms' => $hotelvRooms
        ]);
    }


    #[Route('/hotel-jazzy/', name: 'app_hotel_jazzy')]
    public function findRoomJazzy(RoomRepository $roomRepository): Response
    {
        $jazzyRooms = $roomRepository->findBy([
            'hostel' => '6'
        ]);

        $img = "https://cdn.pixabay.com/photo/2018/10/01/00/51/luxury-hotel-3715115__480.jpg";
        return $this->render('hotel/jazzy.html.twig', [
            'controller_name' => 'HotelController',
            'img' => $img,
            'rooms' => $jazzyRooms
        ]);

    }

    #[Route('/hotel-yadel/', name: 'app_hotel_yadel')]
    public function findRoomYadel(RoomRepository $roomRepository): Response
    {
        $yadelRooms = $roomRepository->findBy([
            'hostel' => '7'
        ]);

        $img = "https://cdn.pixabay.com/photo/2014/09/26/04/59/holiday-complex-461633__480.jpg";
        return $this->render('hotel/yadel.html.twig', [
            'controller_name' => 'HotelController',
            'img' => $img,
            'rooms' => $yadelRooms
        ]);
    }
}
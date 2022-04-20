<?php

namespace App\Controller;

use App\Entity\Hostel;
use App\Entity\Room;
use App\Repository\HostelRepository;
use App\Repository\RoomRepository;
use Doctrine\ORM\Mapping\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HotelController extends AbstractController
{
     #[Route('/hotels', name: 'app_nos-hotels')]
     public function findHostel(HostelRepository $hostelRepository): Response
     {
         // Retourne un tableau avec tous les hotels en base de données
         $hostels = $hostelRepository->findAll();

         return $this->render('hotel/nos-hotels.html.twig', [
             'controller_name' => 'HotelController',
             'hostels' => $hostels
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
     #[Route('/find-hostel/{?name}', name: 'app_nos-hotels_{?name}')]
     public function findHostelWithParamConverter(Hostel $hostel): Response
     {
         $hostel = $hostel->getName();

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

         return $this->render('hotel/index.html.twig', [
               'controller_name' => 'HotelController',
               'hostel' => $hostel
           ]);
     }



    #[Route('/hotel-hyatt', name: 'app_hotel_hyatt')]
    public function findRoom(RoomRepository $roomRepository): Response
    {
        // Retourne un tableau avec tous les hotels en base de données
        $rooms = $roomRepository->findAll();
        $img = "https://cdn.pixabay.com/photo/2014/05/18/19/15/walkway-347319__480.jpg";

        return $this->render('hotel/hyatt.html.twig', [
            'controller_name' => 'HotelController',
            'rooms' => $rooms,
            'img' => $img
        ]);
    }



    //#[Route('/hotel-hyatt/{title}', name: 'app_hotel_hyatttt')]
    public function room($title, $roomRepository): Response
    {
        $roomDetails = $roomRepository->findOneBy(['title' => $title]);
        if(!$roomDetails){
            // Si aucun article n'est trouvé, nous créons une exception
            throw $this->createNotFoundException('L\'article n\'existe pas');
        }

        return $this->render('hotel/roomhyatt.html.twig', [
            'controller_name' => 'HotelController',
            'roomDetails' => $roomDetails,
        ]);
    }


  //  #[Route('/hotel-hyatt/{id?}', name: 'app_hotel_hyatt', requirements: ['id' => '/d+'])]
  //  public function hyatt(?int $id): Response
  //  {
  //      $hyattRooms = [
  //          1 => [
  //              "title" => "Ragnar",
  //              "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
  //                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
  //              "image" => "https://cdn.pixabay.com/photo/2017/01/14/12/48/hotel-1979406__480.jpg"
  //          ],
  //          2 => [
  //              "title" => "Lilo",
  //              "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
  //                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
  //              "image" => "https://cdn.pixabay.com/photo/2021/08/27/01/33/bedroom-6577523__340.jpg"
  //          ],
  //          3 => [
  //              "title" => "Grand Tsibili",
  //              "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
  //                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
  //              "image" => "https://cdn.pixabay.com/photo/2019/08/19/13/58/bed-4416515__340.jpg"
  //          ],
  //
  //      ];
  //
  //      $img = "https://cdn.pixabay.com/photo/2014/05/18/19/15/walkway-347319__480.jpg";
  //      return $this->render('hotel/hyatt.html.twig', [
  //          'controller_name' => 'HotelController',
  //          'img' => $img,
  //          'hyattRooms' => $hyattRooms
  //      ]);
  //  }


    #[Route('/hotel-westeen/{id?}', name: 'app_hotel_westeen', requirements: ['id' => '/d+'])]
    public function westeen(?int $id): Response
    {
        $westeenRooms = [
            1 => [
                "title" => "Azur",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2017/01/14/12/48/hotel-1979406__480.jpg"
            ],
            2 => [
                "title" => "Cote",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2021/08/27/01/33/bedroom-6577523__340.jpg"
            ],
            3 => [
                "title" => "Tezami",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2019/08/19/13/58/bed-4416515__340.jpg"
            ],
            4 => [
                "title" => "Lux",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2019/08/19/13/58/bed-4416515__340.jpg"
            ],

        ];

        $img = "https://cdn.pixabay.com/photo/2014/07/10/17/17/hotel-389256__480.jpg";
        return $this->render('hotel/westeen.html.twig', [
            'controller_name' => 'HotelController',
            'img' => $img,
            'westeenRooms' => $westeenRooms
        ]);
    }

    #[Route('/hotel-cap/{id?}', name: 'app_hotel_cap', requirements: ['id' => '/d+'])]
    public function cap(?int $id): Response
    {
        $capRooms = [
            1 => [
                "title" => "Ragnar",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2017/01/14/12/48/hotel-1979406__480.jpg"
            ],
            2 => [
                "title" => "Lilo",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2021/08/27/01/33/bedroom-6577523__340.jpg"
            ],
            3 => [
                "title" => "Grand Tsibili",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2019/08/19/13/58/bed-4416515__340.jpg"
            ],

        ];

        $img = "https://cdn.pixabay.com/photo/2015/09/21/09/53/villa-cortine-palace-949547__480.jpg";
        return $this->render('hotel/cap.html.twig', [
            'controller_name' => 'HotelController',
            'img' => $img,
            'capRooms' => $capRooms
        ]);
    }

    #[Route('/hotel-ibis/{id?}', name: 'app_hotel_ibis', requirements: ['id' => '/d+'])]
    public function ibis(?int $id): Response
    {
        $ibisRooms = [
            1 => [
                "title" => "Ragnar",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2017/01/14/12/48/hotel-1979406__480.jpg"
            ],
            2 => [
                "title" => "Lilo",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2021/08/27/01/33/bedroom-6577523__340.jpg"
            ],

        ];

        $img = "https://cdn.pixabay.com/photo/2014/05/30/18/30/vancouver-358515__480.jpg";
        return $this->render('hotel/ibis.html.twig', [
            'controller_name' => 'HotelController',
            'img' => $img,
            'ibisRooms' => $ibisRooms
        ]);
    }


    #[Route('/hotel-hotel-v/{id?}', name: 'app_hotel_hotel-v', requirements: ['id' => '/d+'])]
    public function hotelv(?int $id): Response
    {
        $hotelvRooms = [
            1 => [
                "title" => "Ragnar",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2017/01/14/12/48/hotel-1979406__480.jpg"
            ],
            2 => [
                "title" => "Lilo",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2021/08/27/01/33/bedroom-6577523__340.jpg"
            ],
            3 => [
                "title" => "Grand Tsibili",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2019/08/19/13/58/bed-4416515__340.jpg"
            ],
            4 => [
                "title" => "Grand Tsibili",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2019/08/19/13/58/bed-4416515__340.jpg"
            ],

        ];

        $img = "https://cdn.pixabay.com/photo/2015/09/21/09/54/villa-cortine-palace-949552__480.jpg";
        return $this->render('hotel/hotel-v.html.twig', [
            'controller_name' => 'HotelController',
            'img' => $img,
            'hotelvRooms' => $hotelvRooms
        ]);
    }


    #[Route('/hotel-jazzy/{id?}', name: 'app_hotel_jazzy', requirements: ['id' => '/d+'])]
    public function jazzy(?int $id): Response
    {
        $jazzyRooms = [
            1 => [
                "title" => "Ragnar",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2017/01/14/12/48/hotel-1979406__480.jpg"
            ],
            2 => [
                "title" => "Lilo",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2021/08/27/01/33/bedroom-6577523__340.jpg"
            ],
            3 => [
                "title" => "Grand Tsibili",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2019/08/19/13/58/bed-4416515__340.jpg"
            ],

        ];

        $img = "https://cdn.pixabay.com/photo/2018/10/01/00/51/luxury-hotel-3715115__480.jpg";
        return $this->render('hotel/jazzy.html.twig', [
            'controller_name' => 'HotelController',
            'img' => $img,
            'jazzyRooms' => $jazzyRooms
        ]);

    }

    #[Route('/hotel-yadel/{id?}', name: 'app_hotel_yadel', requirements: ['id' => '/d+'])]
    public function yadel(?int $id): Response
    {
        $yadelRooms = [
            1 => [
                "title" => "Ragnar",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2017/01/14/12/48/hotel-1979406__480.jpg"
            ],
            2 => [
                "title" => "Lilo",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2021/08/27/01/33/bedroom-6577523__340.jpg"
            ],

        ];

        $img = "https://cdn.pixabay.com/photo/2014/09/26/04/59/holiday-complex-461633__480.jpg";
        return $this->render('hotel/yadel.html.twig', [
            'controller_name' => 'HotelController',
            'img' => $img,
            'yadelRooms' => $yadelRooms
        ]);
    }
}
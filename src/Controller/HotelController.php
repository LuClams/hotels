<?php

namespace App\Controller;

use App\Entity\Room;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HotelController extends AbstractController
{
     #[Route('/hotels', name: 'app_nos-hotels')]
     public function index(): Response
     {
         return new Response('');
     }

     #[Route('/find-hotels/{title}')]
     #[ParamConverter(data: 'title', class: 'azur:Post')]
     public function findRoom(Room $title): Response
     {
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

         return $this->render('hotel/roomhyatt.html.twig', [
               'controller_name' => 'EtablissementController',
               'title' => $title,

           ]);
     }



    #[Route('/hotel-hyatt/{title}', name: 'app_hotel_hyatttt')]
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






    //     $roometails = [
    //        1=>[
    //             "title" => "Ragnar",
    //             "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    //                           Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
    //             "ima1" => "https://cdn.pixabay.com/photo/2017/01/14/12/48/hotel-1979406__480.jpg",
    //             "ima2" => "https://cdn.pixabay.com/photo/2017/01/14/12/48/hotel-1979406__480.jpg",
    //             "ima3" => "https://cdn.pixabay.com/photo/2017/01/14/12/48/hotel-1979406__480.jpg"
    //         ],
    //         2 =>[
    //             "title" => "Lilo",
    //             "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    //                           Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
    //             "ima1" => "https://cdn.pixabay.com/photo/2021/08/27/01/33/bedroom-6577523__340.jpg",
    //             "ima2" => "https://cdn.pixabay.com/photo/2017/01/14/12/48/hotel-1979406__480.jpg",
    //             "ima3" => "https://cdn.pixabay.com/photo/2017/01/14/12/48/hotel-1979406__480.jpg"
    //         ],
    //         3 =>[
    //             "title" => "Grand Tsibili",
    //             "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    //                           Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
    //             "ima1" => "https://cdn.pixabay.com/photo/2021/08/27/01/33/bedroom-6577523__340.jpg",
    //             "ima2" => "https://cdn.pixabay.com/photo/2017/01/14/12/48/hotel-1979406__480.jpg",
    //             "ima3" => "https://cdn.pixabay.com/photo/2017/01/14/12/48/hotel-1979406__480.jpg"
    //         ]
    //     ];
    //
    //     return $this->render('etablissement/roomhyatt.html.twig', [
    //         'controller_name' => 'EtablissementController',
    //         'roometails' => $roometails,
    //         'id' => $id
    //     ]);
    // }

    #[Route('/hotel-hyatt/{id?}', name: 'app_hotel_hyatt', requirements: ['id' => '/d+'])]
    public function hyatt(?int $id): Response
    {
        $hyattRooms = [
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

        $img = "https://cdn.pixabay.com/photo/2014/05/18/19/15/walkway-347319__480.jpg";
        return $this->render('hotel/hyatt.html.twig', [
            'controller_name' => 'HotelController',
            'img' => $img,
            'hyattRooms' => $hyattRooms
        ]);
    }


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

        $img = "https://cdn.pixabay.com/photo/2014/05/18/19/15/walkway-347319__480.jpg";
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

        $img = "https://cdn.pixabay.com/photo/2014/05/18/19/15/walkway-347319__480.jpg";
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

        $img = "https://cdn.pixabay.com/photo/2014/05/18/19/15/walkway-347319__480.jpg";
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

        $img = "https://cdn.pixabay.com/photo/2014/05/18/19/15/walkway-347319__480.jpg";
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

        $img = "https://cdn.pixabay.com/photo/2014/05/18/19/15/walkway-347319__480.jpg";
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

        $img = "https://cdn.pixabay.com/photo/2014/05/18/19/15/walkway-347319__480.jpg";
        return $this->render('hotel/yadel.html.twig', [
            'controller_name' => 'HotelController',
            'img' => $img,
            'yadelRooms' => $yadelRooms
        ]);
    }
}
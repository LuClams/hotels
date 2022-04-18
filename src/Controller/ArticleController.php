<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/nos-hotels', name: 'app_nos-hotels')]
    public function hotels()
    {
        $hotels = [
            1 => [
                "title" => "Westeen",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2014/05/30/18/30/vancouver-358515__480.jpg"
            ],
            2 => [
                "title" => "Hyatt",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2014/05/18/19/15/walkway-347319__480.jpg"
            ],
            3 => [
                "title" => "Cap",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2014/07/10/17/17/hotel-389256__480.jpg"
            ],
            4 => [
                "title" => "Ibis",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2017/05/31/10/23/manor-house-2359884_1280.jpg"
            ],
            5 => [
                "title" => "Hotel V",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2015/09/21/09/54/villa-cortine-palace-949552__480.jpg"
            ],
            6 => [
                "title" => "Jazzy",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2018/02/24/17/17/window-3178666__480.jpg"
            ],
            7 => [
                "title" => "Yadel",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "image" => "https://cdn.pixabay.com/photo/2014/05/17/18/03/lobby-346426__480.jpg"
            ],

        ];


        return $this->render('hotel/nos-hotels.html.twig', [
            'controller_name' => 'ArticleController',
            'hotels' => $hotels,
        ]);
    }
    // #[Route('/nos-hotels', name: 'app_nos-hotels')]
    // public function index(): Response
    // {
    // }
    //
    // #[Route('/find-nos-hotels/{name}')]
    // public function findHostel(Hostel $hostel): Response
    // {
    //  // dump($hostelRepository->findAll());
    //  //
    //  // dump($hostelRepository->findBy([
    //  //     'name' => 'Hyatt',
    //  //     'city' => 'Paris'
    //  // ]));
    //  //
    //  // dump($hostelRepository->findByName('Westeen'));
    //  //
    //  // $hostel = $hostelRepository->find(2);
    //  // dump($hostel->getCity());
    //  //
    //  // dump($hostelRepository->findOneBy(['name' => 'Hyatt']));
    //
    //     dump($hostel->getName());
    //     return new Response('<body></body>');
    // }
}

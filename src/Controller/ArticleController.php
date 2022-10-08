<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
  // #[Route('/hotel-westeen/{name}', name: 'app_hotel_westeen_{name}', methods:"POST")]
  // public function roomDetails(string $name = 'AZUR') :Response
  // {
  //     return $this->render('article/inde.html.twig', [
  //     'controller_name' => 'ArticleController',
  //         'name' => $name
  //     ]);
  // }


    /**
     * @Route("/message/{name}")
     */
    public function room(string $name): Response
    {
        dd($roomRepository->findBy(['name' => 'AZUR',]));
        // Si l'id n'appartient pas au tableau messages, une HttpException est levée

        return new Response($roomRepository[$name]);
    }
}
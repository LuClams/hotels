<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
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

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function app_home(): Response
    {
        $articles = [
            1 => [
                "title" => "Prestation ",
                "content" => "Pellentesque mattis scelerisque massa at tincidunt. Donec tempus auctor elementum. Mauris rhoncus mauris commodo lorem feugiat, nec porta dolor mattis. Nullam pulvinar nibh quis blandit imperdiet. Duis vel molestie eros, in imperdiet velit. Proin at ante eu elit laoreet condimentum ac vitae leo. Aliquam erat volutpat. Maecenas pharetra tortor sed accumsan ultrices. Pellentesque pharetra porttitor molestie.",
                "image" => "https://cdn.pixabay.com/photo/2017/12/06/08/12/pool-3001209__480.jpg",
            ],
            2 => [
                "title" => "Prestation ",
                "content" => "Pellentesque mattis scelerisque massa at tincidunt. Donec tempus auctor elementum. Mauris rhoncus mauris commodo lorem feugiat, nec porta dolor mattis. Nullam pulvinar nibh quis blandit imperdiet. Duis vel molestie eros, in imperdiet velit. Proin at ante eu elit laoreet condimentum ac vitae leo. Aliquam erat volutpat. Maecenas pharetra tortor sed accumsan ultrices. Pellentesque pharetra porttitor molestie.",
                "image" => "https://cdn.pixabay.com/photo/2015/08/25/03/51/lemon-906141_1280.jpg",
            ],
            3 => [
                "title" => "Prestation",
                "content" => "Pellentesque mattis scelerisque massa at tincidunt. Donec tempus auctor elementum. Mauris rhoncus mauris commodo lorem feugiat, nec porta dolor mattis. Nullam pulvinar nibh quis blandit imperdiet. Duis vel molestie eros, in imperdiet velit. Proin at ante eu elit laoreet condimentum ac vitae leo. Aliquam erat volutpat. Maecenas pharetra tortor sed accumsan ultrices. Pellentesque pharetra porttitor molestie.",
                "image" => "https://cdn.pixabay.com/photo/2015/07/20/23/08/spa-853462_1280.jpg",
            ]
        ];

        $img = 'https://cdn.pixabay.com/photo/2017/03/09/06/30/pool-2128578__480.jpg';
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
            'articles' => $articles,
            'img' => $img
        ]);

    }
}

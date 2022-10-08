<?php

namespace App\Controller;

use App\Entity\Room;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user/{id}', name: 'app_user')]
    public function index(User $user, Room $room): Response
    {
        return $this->render('user/account.html.twig', [
            'user' => $user,
            'room' => $room
        ]);
    }
}

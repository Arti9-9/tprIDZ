<?php

namespace App\Controller;

use App\Repository\EquipmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EquipmentRepository $Equipment): Response
    {
        return $this->render('home/index.html.twig', [
            'Equipment' => $Equipment->findBy([], ['date'=>'DESC']),
        ]);
    }
}

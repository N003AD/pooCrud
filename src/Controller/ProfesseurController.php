<?php

namespace App\Controller;

use App\Entity\Professeur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfesseurController extends AbstractController
{
    #[Route('/professeur', name: 'app_professeur')]
    public function index(): Response
    {
        $prof= new Professeur();
        dd($prof);
        return $this->render('professeur/index.html.twig', [
            'controller_name' => 'ProfesseurController',
        ]);
    }
}

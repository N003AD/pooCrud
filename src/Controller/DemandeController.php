<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Repository\DemandeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DemandeController extends AbstractController
{
    #[Route('/demande', name: 'app_demande')]
    public function index(
        DemandeRepository $repo,
        PaginatorInterface $paginator,
        Request $request
    ): Response
    {
        $data= $demandes=$repo->findAll();
        // $modules = new Module;
        $demandes=$paginator->paginate (
     // Contient les modules de notre paginator
        $data,
        $request->query->getInt('page', 1),
        6
        );
        return $this->render('demande/index.html.twig', [
            'controller_name' => 'DemandeController',
            'demandes'=>$demandes,
        ]);
    }
}

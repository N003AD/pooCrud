<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Repository\EtudiantRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'app_etudiant')]
    public function index(
        EtudiantRepository $repo,
        PaginatorInterface $paginator,
        Request $request
    ): Response{
        $data=$etudiants=$repo->findAll();
        $etudiants=$paginator->paginate(
            $data,
            $request->query->getInt('page',1),
            10
        );
        // $etudiants = new Etudiant;
        // dd($etudiants);
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
            'etudiants'=>$etudiants
        ]);
    }
}

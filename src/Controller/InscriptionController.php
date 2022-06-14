<?php

namespace App\Controller;

use App\Entity\Inscription;
use App\Form\InscriptionType;
use App\Repository\InscriptionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(): Response
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    #[Route('/addInscription', name: 'app_addInscription', methods:['GET', 'POST'])]
    public function addInscription(Request $request, Inscription $inscription = null, InscriptionRepository $repo): Response{
        if(!$inscription){
            $inscription= new Inscription();
        }
        $inscriptionform = $this->createForm(InscriptionType::class, $inscription);
        $inscriptionform->handleRequest($request);

        if($inscriptionform->isSubmitted() &&  $inscriptionform->isValid()){
            
            $repo->add($inscriptionform->getData(),true);
            // dd($professeur);
            $this->addFlash('success', 'Vous a avez ajouter un étudiant avec succés');
            return $this->redirectToRoute('app_inscription');
        }

        return $this->render('inscription/addInscription.html.twig', [
            'inscriptionform' => $inscriptionform ->createView(),
            "controller_name" => "Ajouter une nouvelle inscription"
        ]);
    }

}

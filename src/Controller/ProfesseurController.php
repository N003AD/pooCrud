<?php

namespace App\Controller;

use App\Entity\Professeur;
use App\Form\ModuleType;
use App\Form\ProfesseurType;
use App\Repository\ProfesseurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfesseurController extends AbstractController
{
    #[Route('/professeur', name: 'app_professeur')]
    public function index(
        ProfesseurRepository $repo,
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        // $prof = new Professeur();
        //  dd($prof);
        $data=$professeurs= $repo->findAll();
            $professeurs= $paginator->paginate(
                $data,
                $request->query->getInt('page',1),
                6
            );
        return $this->render('professeur/index.html.twig', [
            'controller_name' => 'ProfesseurController',
            'professeurs'=>$professeurs
        ]);
    }

    #[Route('/ajoutProfesseur', name: 'ajout_prof', methods:['GET', 'POST'])]
    public function addClasse(Request $request, ProfesseurRepository $repo): Response{
        $professeur= new Professeur();
        $professeurform= $this->createForm(ProfesseurType::class);
        $professeurform->handleRequest($request);

        if($professeurform->isSubmitted() &&  $professeurform->isValid()){

            $repo->add($professeurform->getData(),true);
            // dd($professeur);
            $this->addFlash('success', 'Vous a avez crée un professeur avec succés');
            return $this->redirectToRoute('app_professeur');
        }

        return $this->render('classe/add.html.twig', [
            'classeform' => $professeurform ->createView(),
            "controller_name" => "Ajouter une nouvelle Professeur"
        ]);
    }
}


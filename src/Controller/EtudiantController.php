<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantType;
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
        $data=$repo->findAll();
        $etudiants=$paginator->paginate(
            $data,
            $request->query->getInt('page',1),
            10
        );
        //
    //  dd($data[0]);
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
            'etudiants'=>$data
        ]);
    }

    #[Route('/addEtudiant', name: 'app_addEtudiant', methods:['GET', 'POST'])]
    // #[Route('/edit/{id}', name:'etudiant_edit' , methods:['GET','POST'])]
    public function addEtudiant(Request $request, Etudiant $etudiant = null, EtudiantRepository $repo): Response{
        if(!$etudiant){
            $etudiant= new Etudiant();
        }
        $etudiantform = $this->createForm(EtudiantType::class, $etudiant);
        $etudiantform->handleRequest($request);

        if($etudiantform->isSubmitted() &&  $etudiantform->isValid()){

            $repo->add($etudiantform->getData(),true);
            // dd($professeur);
            $this->addFlash('success', 'Vous a avez ajouter un étudiant avec succés');
            return $this->redirectToRoute('app_etudiant');
        }

        return $this->render('classe/add.html.twig', [
            'classeform' => $etudiantform ->createView(),
            "controller_name" => "Ajouter une nouvelle étudiant"
        ]);
    }

    // #[Route('/delete/{id}', name:'professeur_delete' , methods:['GET','POST'])]

    public function delete(Etudiant $etudiant = null, EtudiantRepository $repo){
        if($etudiant){
            $repo->remove($etudiant, true);
        }
        return $this->redirectToRoute('ajout_prof');
    }
}
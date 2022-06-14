<?php

namespace App\Controller;

use App\Entity\Demande;

use App\Form\DemandeType;
use App\Repository\DemandeRepository;
use Doctrine\ORM\EntityManagerInterface;
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
    #[Route('/addDemande', name: 'app_addDemande', methods:['GET', 'POST'])]
    public function addDemande(Request $request, Demande $demande=null, EntityManagerInterface $manager): Response{
        if(!$demande){
            $demande= new Demande();
        }
        $demandeform = $this->createForm(DemandeType::class,$demande);
        $demandeform ->handleRequest($request);

        if($demandeform ->isSubmitted() && $demandeform->isValid()){
            $manager->persist($demande);
            $manager->flush();
            $this->addFlash('success', 'Vous a avez crée une classe avec succés');
            return $this->redirectToRoute('app_demande');
        }

        return $this->render('demande/ajoutDemande.html.twig', [
            'demandeform' => $demandeform ->createView(),
            "controller_name" => "Ajouter une nouvelle classe"
        ]);
        
    }
    // #[Route('/delete/{id}', name:'demande_delete' , methods:['GET','POST'])]

    public function delete(Demande $demande = null, DemandeRepository $repo){
        if($demande){
            $repo->remove($demande, true);
        }
        // return $this->redirectToRoute('app_demande');
    }

}


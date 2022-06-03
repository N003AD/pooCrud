<?php

namespace App\Controller;

use App\Entity\Module;
use App\Repository\ModuleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ModuleController extends AbstractController
{
    #[Route('/module', name: 'app_module')]
    public function index(
        ModuleRepository $repo,
        PaginatorInterface $paginator,
        Request $request
        ): Response{
            $data= $modules=$repo->findAll();
            // $modules = new Module;
            $modules=$paginator->paginate (
         // Contient les modules de notre paginator
            $data,
            $request->query->getInt('page', 1),
    6
            );
        // dd($modules);
        return $this->render('module/index.html.twig', [
            'controller_name' => 'ModuleController',
            'modules'=>$modules,
        ]);
    }

    #[Route('/addnew', name: 'app_create', methods:['GET', 'POST'])]
    public function addClasse(Request $request, EntityManagerInterface $manager): Response{
        $module= new Module();
        $moduleform = $this->createForm(ClasseType::class,$module);
        $moduleform->handleRequest($request);

        if($moduleform->isSubmitted() &&  $moduleform->isValid()){
            $module = $moduleform->getData();
            // dd($classeform->getData());
            $this->addFlash(
                'sucess',
                'Vous avez ajouté une classe',
            );

            $manager->persist($module);
            $manager->flush();
            return $this->redirectToRoute('classe');
        }

        return $this->render('classe/add.html.twig', [
            'classeform' => $moduleform->createView(),
            "controller_name" => "Ajouter une nouvelle Module"
        ]);
    }
}

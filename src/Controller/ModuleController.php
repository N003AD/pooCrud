<?php

namespace App\Controller;

use App\Entity\Module;
use App\Repository\ModuleRepository;
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
}

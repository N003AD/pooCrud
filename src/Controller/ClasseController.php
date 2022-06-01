<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Repository\ClasseRepository;
use COM;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ClasseController extends AbstractController
{
    #[Route('/classe', name: 'app_classe')]
    public function index(
        ClasseRepository $repo,
        PaginatorInterface $paginator,
        Request $request
        ): Response{
            $data=$classes= $repo->findAll();
            $classes= $paginator->paginate(
                $data,
                $request->query->getInt('page',1),
                6
            );
        // $classes=new Classe;
        // dd($classes);
        return $this->render('classe/index.html.twig', [
            'controller_name' => 'ClasseController',
            'classes'=>$classes
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Form\ClasseType;
use App\Repository\ClasseRepository;
use COM;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use phpDocumentor\Reflection\Types\Null_;
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
    ): Response {
        $data=$classes= $repo->findAll();
        $classes= $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            6
        );
        // $classes=new Classe;
        // dd($classes);
        return $this->render('classe/index.html.twig', [
            'controller_name' => 'ClasseController',
            'classes'=>$classes
        ]);
    }


        #[Route('/classe/new', name: 'app_addClasse', methods:['GET', 'POST'])]
        #[Route('/edit/{id}', name:'classe_edit' , methods:['GET','POST'])]
        public function addClasse(Request $request, Classe $classe=null, EntityManagerInterface $manager): Response{
            if(!$classe){
                $classe= new Classe();
            }
            $classeform = $this->createForm(ClasseType::class,$classe);
            $classeform->handleRequest($request);

            if($classeform->isSubmitted() && $classeform->isValid()){
                $manager->persist($classe);
                $manager->flush();
                $this->addFlash('success', 'Vous a avez crée une classe avec succés');
                return $this->redirectToRoute('app_classe');
            }

            return $this->render('classe/add.html.twig', [
                'classeform' => $classeform->createView(),
                "controller_name" => "Ajouter une nouvelle classe"
            ]);
            
        }
        #[Route('/delete/{id}', name:'classe_delete' , methods:['GET','POST'])]

        public function delete(Classe $classe = null, ClasseRepository $repo){
            if($classe){
                $repo->remove($classe, true);
            }
            return $this->redirectToRoute('app_classe');
        }
    
        // public function edit(ClasseRepository $repo, $id):Response{
           
        //     $classeform=$repo->findOneBy(["id" => $id]);
           
        //     $classeform=$this->createForm(ClasseType::class, $classeform);
        // return $this->render('classe/edit.html.twig', [
        //     'classeform' => $classeform->createVIew()
        // ]);
        // }
}

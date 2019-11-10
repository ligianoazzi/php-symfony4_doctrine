<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Form\AnimalType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnimaisController extends AbstractController
{
    /**
    * @Route("/animais", name="listar_animais")
    * @Template("animais/index.html.twig")
    */
    public function index()
    {
      $em = $this->getDoctrine()->getManager();
      $animais = $em->getRepository( Animal::class)->findAll();

      return [
        'animais' => $animais
      ];
    }

    /**
    * @Route("/animais/visualizar/{id}", name="visualizar_animal")
    * @Template("animais/view.html.twig")
    * @param Animal $animal
    * @return array
    */
    public function view(Animal $animal)
    {
      return [
        'animal' => $animal
      ];
    }

    /**
    * @Route("/animal/cadastrar", name="cadastrar_animal")
    * @Template("animais/create.html.twig")
    * @param Animal $animal
    */
    public function create(Request $request)
    {
      $animal = new Animal();
      $form = $this->createForm(AnimalType::class, $animal );
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid() ){
         $em = $this->getDoctrine()->getManager();
         $em->persist($animal);
         $em->flush();

//         $this->addFlash( type: 'success', message: 'Saved!' );
         $this->addFlash('success', "Saved!");

         return $this->redirectToRoute( 'listar_animais' );
      }

      return[
        'form' => $form->createView()
      ];
    }

}

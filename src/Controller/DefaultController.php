<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use App\Entity\Cliente;


use App\Entity\Animal;
use Symfony\Component\HttpFoundation\Request;



class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     * @Template("default/index.html.twig")
     */
    public function index()
    {

      $em = $this->getDoctrine()->getManager();

      $qts_animais = $em->getRepository(Cliente::class)->qtsAnimaisPorCliente();

      $qte_racas = $em->getRepository(Animal::class)->qtsPorRaca();


    	return [
        'qts_animais' => $qts_animais,
        'qtde_por_raca' => $qte_racas
      ];
    }
}

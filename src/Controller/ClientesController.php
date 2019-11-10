<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Form\ClienteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;


class ClientesController extends AbstractController
{
    /**
     * @Route("/clientes", name="listar_clientes")
     * @Template("clientes/index.html.twig")
     */
    public function index()
    {

        $em = $this->getDoctrine()->getManager();
        $clientes = $em->getRepository( Cliente::class)->findAll();

        return [
          'clientes' => $clientes
        ];

    }

    /**
     * @Route("/cliente/visualizar/{id}", name="visualizar_cliente")
     * @Template("clientes/view.html.twig")
     * @param Cliente $cliente
     */
    public function view(Cliente $cliente)
    {
      return [
        'cliente' => $cliente
      ];
    }

    /**
      * @Route("cliente/cadastrar", name="cadastrar_cliente")
      * @Template("clientes/create.html.twig")
      *
      * @return array
      */
     public function create(Request $request)
     {
         $cliente = new Cliente();
         $form = $this->createForm(ClienteType::class, $cliente);
         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
             $em = $this->getDoctrine()->getManager();
             $em->persist($cliente);
             $em->flush();
             $this->addFlash('success', "Saved!");
             return $this->redirectToRoute('listar_clientes');
         }
         return [
             'form' => $form->createView()
         ];
     }

}

<?php

namespace App\Controller;

use App\Entity\Contenutest;
use App\Form\ContenutestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contenutest")
 */
class ContenutestController extends AbstractController
{
    /**
     * @Route("/", name="contenutest_index", methods="GET")
     */
    public function index(): Response
    {
        $contenutests = $this->getDoctrine()
            ->getRepository(Contenutest::class)
            ->findAll();

        return $this->render('contenutest/index.html.twig', ['contenutests' => $contenutests]);
    }

    /**
     * @Route("/new", name="contenutest_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $contenutest = new Contenutest();
        $form = $this->createForm(ContenutestType::class, $contenutest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contenutest);
            $em->flush();

            return $this->redirectToRoute('contenutest_index');
        }

        return $this->render('contenutest/new.html.twig', [
            'contenutest' => $contenutest,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idtest}", name="contenutest_show", methods="GET")
     */
    public function show(Contenutest $contenutest): Response
    {
        return $this->render('contenutest/show.html.twig', ['contenutest' => $contenutest]);
    }

    /**
     * @Route("/{idtest}/edit", name="contenutest_edit", methods="GET|POST")
     */
    public function edit(Request $request, Contenutest $contenutest): Response
    {
        $form = $this->createForm(ContenutestType::class, $contenutest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contenutest_edit', ['idtest' => $contenutest->getIdtest()]);
        }

        return $this->render('contenutest/edit.html.twig', [
            'contenutest' => $contenutest,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idtest}", name="contenutest_delete", methods="DELETE")
     */
    public function delete(Request $request, Contenutest $contenutest): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contenutest->getIdtest(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contenutest);
            $em->flush();
        }

        return $this->redirectToRoute('contenutest_index');
    }
}

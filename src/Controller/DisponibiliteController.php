<?php

namespace App\Controller;

use App\Entity\Disponibilite;
use App\Entity\Doctor;
use App\Form\DisponibiliteType;
use App\Repository\DisponibiliteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisponibiliteController extends AbstractController
{
    /**
     * @Route("/disponibilite", name="calendar_index", methods={"GET"})
     */
    public function index(DisponibiliteRepository $disponibiliteRepository): Response
    {
        return $this->render('disponibilite/index.html.twig', [
            'calendars' => $disponibiliteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="calendar_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $calendar = new  Disponibilite();
        //$c = $this->getDoctrine()->getRepository(Doctor::class)->find(1);
        //$calendar->setReftoMed($c);
        $form = $this->createForm( DisponibiliteType::class, $calendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($calendar);
            $entityManager->flush();

            return $this->redirectToRoute('calendar_index');
        }

        return $this->render('disponibilite/new.html.twig', [
            'calendar' => $calendar,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}/edit", name="calendar_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Disponibilite $calendar): Response
    {
        $form = $this->createForm(DisponibiliteType::class, $calendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('calendar_index');
        }

        return $this->render('Disponibilite/edit.html.twig', [
            'calendar' => $calendar,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="calendar_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Disponibilite $calendar): Response
    {
        if ($this->isCsrfTokenValid('delete'.$calendar->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($calendar);
            $entityManager->flush();
        }

        return $this->redirectToRoute('calendar_index');
    }

    /**
     * @Route("/disponibilite/{id}", name="calendar_show", methods={"GET"})
     */
    public function show(Disponibilite $calendar): Response
    {
        return $this->render('disponibilite/show.html.twig', [
            'calendar' => $calendar,
        ]);
    }



}

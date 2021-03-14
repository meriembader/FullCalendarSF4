<?php

namespace App\Controller;

use App\Entity\Consultation;
use App\Entity\Ordonance;
use App\Form\OrdonnanceType;
use App\Repository\OrdonanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrdonnanceController extends AbstractController
{

    /**
     * @Route("/ordonnance", name="ordonnance_index", methods={"GET"})
     */
    public function index(OrdonanceRepository $ordonanceRepository): Response
    {
        return $this->render('ordonnance/index.html.twig', [
            'ordonnances' => $ordonanceRepository->findAll(),
        ]);
    }

    /**
     *  * @param $id_con
     * @Route("/ordonnance/con/{id_con}", name="ordonnancebycon_index", methods={"GET"})
     */
    public function indexcon(OrdonanceRepository $ordonanceRepository,$id_con): Response
    {
        return $this->render('ordonnance/index.html.twig', [
            'ordonnances' => $ordonanceRepository->findBy(array('refToConsultation' => $id_con)),'id_con'=>$id_con,
        ]);
    }
    /**
     * * @param $id_consultation
     * @Route("/ordonnance/new/{id_consultation}", name="ordonnance_new", methods={"GET","POST"})
     */
    public function new(Request $request, $id_consultation): Response
    {
        $ord = new  Ordonance();
        $date = new \DateTime('@'.strtotime('now'));
        $ord->setDate($date);
        $c = $this->getDoctrine()->getRepository(Consultation::class)->find($id_consultation);
        $ord->setRefToConsultation($c);
        $form = $this->createForm( OrdonnanceType::class, $ord);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ord);
            $entityManager->flush();

            return $this->redirectToRoute('ordonnance_index');
        }

        return $this->render('ordonnance/new.html.twig', [
            'ordonnance' => $ord,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/ordonnance/{id}/edit", name="ordonnance_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ordonance $ord): Response
    {
        $con= $ord->getRefToConsultation();
        $form = $this->createForm(OrdonnanceType::class, $ord);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ordonnancebycon_index');
        }

        return $this->render('Ordonnance/edit.html.twig', [
            'id_con'=>$con->getId(),
            'ordonnance' => $ord,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/ordonnance/{id}", name="ordonnance_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ordonance $ord): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ord->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ord);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ordonnance_index');
    }


    /**
     * @Route("/ordonnance/{id}", name="ordonnance_show", methods={"GET"})
     */
    public function show(Ordonance $ord): Response
    {
        return $this->render('ordonnance/show.html.twig', [
            'ordonnance' => $ord,
        ]);
    }

}

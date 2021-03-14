<?php

namespace App\Controller;

use App\Entity\Consultation;
use App\Entity\Doctor;
use App\Entity\Patient;
use App\Entity\RDV;
use App\Form\RdvType;
use App\Repository\RDVRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RdvController extends AbstractController
{

    /**
     * @Route("/rdv", name="rdv_index", methods={"GET"})
     */
    public function index(RDVRepository $RDVRepository): Response
    {
        return $this->render('rdv/index.html.twig', [
            'rdvs' => $RDVRepository->findAll(),
        ]);
    }


    /**
     * * @param $id_doc
     * @Route("/rdvbydoc/{id_doc}", name="rdvbydoc_index", methods={"GET"})
     */
    public function indexbydoc(RDVRepository $RDVRepository ,$id_doc): Response
    {
        return $this->render('rdv/index.html.twig', [
            'rdvs' => $RDVRepository->findBy(array('refToDoc' => $id_doc)),
        ]);
    }
    /**
     * @Route("/rdv/new", name="rdv_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rdv = new  RDV();
        $form = $this->createForm( RdvType::class, $rdv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rdv);
            $entityManager->flush();

            return $this->redirectToRoute('rdv_index');
        }

        return $this->render('rdv/new.html.twig', [
            'rdv' => $rdv,
            'form' => $form->createView(),
        ]);
    }
    /**
     *
     *
     * @Route("/rdv/newby/{doc}/{pat}", name="rdv_newby", methods={"GET","POST"})
     */
    public function newby(Request $request,$doc,$pat): Response
    {
        $rdv = new  RDV();
       // $c = $this->getDoctrine()->getRepository(Doctor::class)->findOneBy(['id'=>$id_doc]);
          // $p = $this->getDoctrine()->getRepository(Patient::class)->findOneBy(['id'=>$id_pat]);

        $form = $this->createForm( RdvType::class, $rdv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rdv->setRefDoc($doc);
            $rdv->setRefPatient($pat);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rdv);
            $entityManager->flush();

            return $this->redirectToRoute('rdv_index');
        }

        return $this->render('rdv/new.html.twig', [
            'rdv' => $rdv,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/rdv/{id}/edit", name="rdv_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RDV $rdv): Response
    {
        $form = $this->createForm(RdvType::class, $rdv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rdv_index');
        }

        return $this->render('rdv/edit.html.twig', [
            'rdv' => $rdv,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/rdv/{id}", name="rdv_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RDV $rdv): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rdv->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rdv);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rdv_index');
    }

    /**
     * @Route("/rdv/{id}", name="rdv_show", methods={"GET"})
     */
    public function show(RDV $rdv): Response
    {
        return $this->render('rdv/show.html.twig', [
            'rdv' => $rdv,
        ]);
    }



}

<?php

namespace App\Controller;

use App\Entity\Affiliate;
use App\Form\AffiliateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/affiliate")
 */
class AffiliateController extends Controller
{
    /**
     * @Route("/", name="affiliate_index", methods="GET")
     */
    public function index(): Response
    {
        $affiliates = $this->getDoctrine()
            ->getRepository(Affiliate::class)
            ->findAll();

        return $this->render('affiliate/index.html.twig', ['affiliates' => $affiliates]);
    }

    /**
     * @Route("/new", name="affiliate_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $affiliate = new Affiliate();
        $form = $this->createForm(AffiliateType::class, $affiliate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($affiliate);
            $em->flush();

            return $this->redirectToRoute('affiliate_index');
        }

        return $this->render('affiliate/new.html.twig', [
            'affiliate' => $affiliate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="affiliate_show", methods="GET")
     */
    public function show(Affiliate $affiliate): Response
    {
        return $this->render('affiliate/show.html.twig', ['affiliate' => $affiliate]);
    }

    /**
     * @Route("/{id}/edit", name="affiliate_edit", methods="GET|POST")
     */
    public function edit(Request $request, Affiliate $affiliate): Response
    {
        $form = $this->createForm(AffiliateType::class, $affiliate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('affiliate_edit', ['id' => $affiliate->getId()]);
        }

        return $this->render('affiliate/edit.html.twig', [
            'affiliate' => $affiliate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="affiliate_delete", methods="DELETE")
     */
    public function delete(Request $request, Affiliate $affiliate): Response
    {
        if ($this->isCsrfTokenValid('delete'.$affiliate->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($affiliate);
            $em->flush();
        }

        return $this->redirectToRoute('affiliate_index');
    }
}

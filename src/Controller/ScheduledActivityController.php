<?php

namespace App\Controller;

use App\Entity\ScheduledActivity;
use App\Form\ScheduledActivityType;
use App\Repository\ScheduledActivityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/scheduled/activity")
 */
class ScheduledActivityController extends AbstractController
{
    /**
     * @Route("/", name="scheduled_activity_index", methods={"GET"})
     */
    public function index(ScheduledActivityRepository $scheduledActivityRepository): Response
    {
        return $this->render('scheduled_activity/index.html.twig', ['scheduled_activities' => $scheduledActivityRepository->findAll()]);
    }

    /**
     * @Route("/new", name="scheduled_activity_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $scheduledActivity = new ScheduledActivity();
        $form = $this->createForm(ScheduledActivityType::class, $scheduledActivity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($scheduledActivity);
            $entityManager->flush();

            return $this->redirectToRoute('scheduled_activity_index');
        }

        return $this->render('scheduled_activity/new.html.twig', [
            'scheduled_activity' => $scheduledActivity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scheduled_activity_show", methods={"GET"})
     */
    public function show(ScheduledActivity $scheduledActivity): Response
    {
        return $this->render('scheduled_activity/show.html.twig', ['scheduled_activity' => $scheduledActivity]);
    }

    /**
     * @Route("/{id}/edit", name="scheduled_activity_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ScheduledActivity $scheduledActivity): Response
    {
        $form = $this->createForm(ScheduledActivityType::class, $scheduledActivity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('scheduled_activity_index', ['id' => $scheduledActivity->getId()]);
        }

        return $this->render('scheduled_activity/edit.html.twig', [
            'scheduled_activity' => $scheduledActivity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scheduled_activity_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ScheduledActivity $scheduledActivity): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scheduledActivity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($scheduledActivity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('scheduled_activity_index');
    }
}

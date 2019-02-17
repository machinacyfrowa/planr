<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Form\ActivityType;
use App\Repository\ActivityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/scheduled/activity")
 */
class ActivityController extends AbstractController
{
    /**
     * @Route("/", name="Activity_index", methods={"GET"})
     */
    public function index(ActivityRepository $scheduledActivityRepository): Response
    {
        return $this->render('Activity/index.html.twig', ['scheduled_activities' => $scheduledActivityRepository->findAll()]);
    }

    /**
     * @Route("/new", name="Activity_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $scheduledActivity = new Activity();
        $form = $this->createForm(ActivityType::class, $scheduledActivity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($scheduledActivity);
            $entityManager->flush();

            return $this->redirectToRoute('Activity_index');
        }

        return $this->render('Activity/new.html.twig', [
            'Activity' => $scheduledActivity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="Activity_show", methods={"GET"})
     */
    public function show(Activity $scheduledActivity): Response
    {
        return $this->render('Activity/show.html.twig', ['Activity' => $scheduledActivity]);
    }

    /**
     * @Route("/{id}/edit", name="Activity_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Activity $scheduledActivity): Response
    {
        $form = $this->createForm(ActivityType::class, $scheduledActivity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Activity_index', ['id' => $scheduledActivity->getId()]);
        }

        return $this->render('Activity/edit.html.twig', [
            'Activity' => $scheduledActivity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="Activity_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Activity $scheduledActivity): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scheduledActivity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($scheduledActivity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('Activity_index');
    }
}

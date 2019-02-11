<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ScheduledActivity;

class ScheduledActivityController extends AbstractController
{
    /**
     * @Route("/scheduled/activity", name="scheduled_activity")
     */
    public function index()
    {
        return $this->render('scheduled_activity/index.html.twig', [
            'controller_name' => 'ScheduledActivityController',
        ]);
    }
    /**
     * @Route("/list", name="scheduled_activity_list")
     */
    public function scheduled_activity_list() {
        $repository = $this->getDoctrine()->getRepository(ScheduledActivity::class);
        $activities = $repository->findAll();
        return $this->render('scheduled_activity/list.html.twig', [
            'activities' => $activities,
        ]);
    }
}

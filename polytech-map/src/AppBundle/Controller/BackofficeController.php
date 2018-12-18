<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\User;


class BackofficeController extends Controller
{
    /**
     * @Route("/backoffice", name="backoffice_home")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        $entityManager = $this->getDoctrine()->getManager();



        $repository = $this->getDoctrine()->getRepository(User::class);
        dump($repository->findAll());
        return $this->render('default/backoffice.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/backoffice/users", name="backoffice_users")
     */
    public function usersAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/user.html.twig');
    }

    /**
     * @Route("/backoffice/data", name="backoffice_data")
     */
    public function dataAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/data.html.twig');
    }

    /**
     * @Route("/backoffice/content", name="backoffice_content")
     */
    public function contentAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/content.html.twig');
    }

    /**
     * @Route("/backoffice/maps", name="backoffice_maps")
     */
    public function mapsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/maps.html.twig');
    }

    /**
     * @Route("/backoffice/notifications", name="backoffice_notifications")
     */
    public function notificationsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/notifications.html.twig');
    }




}

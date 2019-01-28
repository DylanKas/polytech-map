<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\User;
use AppBundle\Entity\Gare;
use AppBundle\Entity\Pollution;
use AppBundle\Entity\Ecole;
class DefaultController extends Controller
{
    /**
         * @Route("/", name="homepage")
         */
        public function indexAction(Request $request)
        {
            // replace this example code with whatever you need
            return $this->render('default/index.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            ]);
        }
        /**
       * @Route("/ajax", name="homepage_ajax")
    */
    public function ajaxAction(Request $request) {
       $students = $this->getDoctrine()
          ->getRepository('AppBundle:Gare')
          ->findAll();

          $gareRepository = $this->getDoctrine()->getRepository(Gare::class);

          $pollutionRepository = $this->getDoctrine()->getRepository(Pollution::class);
          $ecoleRepository = $this->getDoctrine()->getRepository(Ecole::class);


          $data = json_decode($request->getContent(), true);

           if ($request->isXmlHttpRequest()) {
              $jsonData = array();
              $idx = 0;
              return new JsonResponse($gareRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10));
           } else {
              return $this->render('default/index.html.twig');
           }
    }
}

<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\User;
use AppBundle\Entity\Gare;
use AppBundle\Entity\Pollution;
use AppBundle\Entity\Interet;
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
          $interetRepository = $this->getDoctrine()->getRepository(Interet::class);


          $data = json_decode($request->getContent(), true);
          dump($data['criterions']);
           if ($request->isXmlHttpRequest()) {
              $jsonResult = array();
              $idx = 0;
              foreach($data['criterions'] as $critere){
                  if($critere=='gare'){
                      $result=$gareRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10);
                  }
                  else if($critere=='ecole'){
                      $result=$ecoleRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10);
                  }
                  else if($critere=='pollution'){
                      $result=$pollutionRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10);
                  }
                  else if($critere=='post_office'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10,'post_office');
                  }
                  else if($critere=='bench'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10,'bench');
                  }
                  else if($critere=='parking'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10,'parking');
                  }
                  else if($critere=='cafe'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10,'cafe');
                  }
                  else if($critere=='atm'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10,'atm');
                  }
                  else if($critere=='restaurant'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10,'restaur');
                  }
                  else if($critere=='bank'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10,'bank');
                  }
                  else if($critere=='library'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10,'library');
                  }
                  else if($critere=='pharmacy'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10,'pharmac');
                  }
                  else if($critere=='toilets'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10,'toilets');
                  }
                  else if($critere=='fuel'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10,'fuel');
                  }
                  $jsonResult[$critere]=$result;

              }

              return new JsonResponse($jsonResult);
           } else {
              return $this->render('default/index.html.twig');
           }
    }
}

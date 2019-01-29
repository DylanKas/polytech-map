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

           if ($request->isXmlHttpRequest()) {
              $jsonResult = array();

              $idx = 0;
              foreach($data['criterions'] as $critere){
                  if($critere=='gare'){
                      $result=$gareRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 15);
                  }
                  else if($critere=='ecole'){
                      $result=$ecoleRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 6);
                  }
                  else if($critere=='pollution'){
                     //$result=$pollutionRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10,true);

                  }
                  else if($critere=='post_office'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 12,'post_office');
                  }
                  else if($critere=='bench'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1,'bench');
                  }
                  else if($critere=='parking'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 4,'parking');
                  }
                  else if($critere=='cafe'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,'cafe');
                  }
                  else if($critere=='atm'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,'atm');
                  }
                  else if($critere=='restaurant'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 5,'restaur');
                  }
                  else if($critere=='bank'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 5,'bank');
                  }
                  else if($critere=='library'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 8,'library');
                  }
                  else if($critere=='pharmacy'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 8,'pharmacy');
                  }
                  else if($critere=='toilets'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 6,'toilets');
                  }
                  else if($critere=='fuel'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10,'fuel');
                  }


                  $jsonResult['map'][$critere]=json_decode($result);
                  $features=json_decode($result);
                  $jsonResult['result']['criteres'][$critere]['score']=count($features->features);
                  $jsonResult['result']['criteres'][$critere]['description']="Test";
              }
              $coef=15;
              $scoreTotal=0;
              foreach($data['criterions'] as $critere){
                   $jsonResult['result']['criteres'][$critere]['score']=$jsonResult['result']['criteres'][$critere]['score']*$coef;

                   $scoreTotal+=$jsonResult['result']['criteres'][$critere]['score'];
                   $coef--;
              }
              $jsonResult['result']['scoretotal']=$scoreTotal;
              return new JsonResponse($jsonResult);
           } else {
              return $this->render('default/index.html.twig');
           }
    }
}

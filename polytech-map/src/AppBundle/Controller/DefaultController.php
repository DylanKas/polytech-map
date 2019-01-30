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
                      $result_1km=$gareRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1);
                      $result_3km=$gareRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3);
                  }
                  else if($critere=='ecole'){
                      $result=$ecoleRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'],10);
                      $result_1km=$ecoleRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1);
                      $result_3km=$ecoleRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3);
                  }
                  else if($critere=='pollution'){
                     //$result=$pollutionRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10,true);
                     //$result_1km=$pollutionRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1,true);
                     //$result_3km=$pollutionRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,true);
                  }
                  else if($critere=='post_office'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 12,'post_office');
                      $result_1km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1,'post_office');
                      $result_3km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,'post_office');
                  }
                  else if($critere=='bench'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1,'bench');
                      $result_1km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1,'bench');
                      $result_3km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,'bench');
                  }
                  else if($critere=='parking'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 4,'parking');
                      $result_1km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1,'parking');
                      $result_3km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,'parking');
                  }
                  else if($critere=='cafe'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,'cafe');
                      $result_1km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1,'cafe');
                      $result_3km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,'cafe');
                  }
                  else if($critere=='atm'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,'atm');
                      $result_1km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1,'atm');
                      $result_3km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,'atm');
                  }
                  else if($critere=='restaurant'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 5,'restaurant');
                      $result_1km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1,'restaurant');
                      $result_3km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,'restaurant');
                  }
                  else if($critere=='bank'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 5,'bank');
                      $result_1km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1,'bank');
                      $result_3km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,'bank');
                  }
                  else if($critere=='library'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 8,'library');
                      $result_1km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1,'library');
                      $result_3km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,'library');
                  }
                  else if($critere=='pharmacy'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 8,'pharmacy');
                      $result_1km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1,'pharmacy');
                      $result_3km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,'pharmacy');
                  }
                  else if($critere=='toilets'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 6,'toilets');
                      $result_1km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1,'toilets');
                      $result_3km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,'toilets');
                  }
                  else if($critere=='fuel'){
                      $result=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 10,'fuel');
                      $result_1km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 1,'fuel');
                      $result_3km=$interetRepository->genererGeoJSON($data['latlng']['lat'], $data['latlng']['lng'], 3,'fuel');
                  }

                  $jsonResult['map'][$critere]=json_decode($result);
                  $features=json_decode($result);
                  $features_1km=json_decode($result_1km);
                  $features_3km=json_decode($result_3km);
                  $count_10km=count($features->features);
                  $count_1km=count($features_1km->features);
                  $count_3km=count($features_3km->features);

                  if($critere=='gare' || $critere=='fuel' || $critere=='post_office' || $critere=='bank'){
                      $count_10km=$count_10k*5;
                      $count_1km=$count_1k*5;
                      $count_3km=$count_3k*5;
                  }

                  $jsonResult['result']['criteres'][$critere]['score']=(5*$count_1km)+(3*($count_3km-$count_1km))+($count_10km-$count_1km-$count_3km);
                  $jsonResult['result']['criteres'][$critere]['description']="Test";
              }
              $coef=5;
              $scoreTotal=0;
              foreach($data['criterions'] as $critere){
                   $jsonResult['result']['criteres'][$critere]['score']=$jsonResult['result']['criteres'][$critere]['score']*$coef;
                   $scoreTotal+=$jsonResult['result']['criteres'][$critere]['score'];
                   if($coef>1){
                       $coef--;
                   }
               }
              $jsonResult['result']['scoretotal']=$scoreTotal;
              return new JsonResponse($jsonResult);
           } else {
              return $this->render('default/index.html.twig');
           }
    }
}

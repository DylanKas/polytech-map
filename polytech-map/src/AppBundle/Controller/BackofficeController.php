<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\User;
use AppBundle\Entity\Gare;
use AppBundle\Entity\Pollution;
use AppBundle\Entity\Ecole;
use AppBundle\Entity\Interet;
use AppBundle\Entity\Recherche;
use AppBundle\Form\RechercheData;


class BackofficeController extends Controller
{
    /**
     * @Route("/backoffice", name="backoffice_home")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        $entityManager = $this->getDoctrine()->getManager();

        $gareRepository = $this->getDoctrine()->getRepository(Gare::class);

        $pollutionRepository = $this->getDoctrine()->getRepository(Pollution::class);
        $ecoleRepository = $this->getDoctrine()->getRepository(Ecole::class);
        $interetRepository = $this->getDoctrine()->getRepository(Interet::class);
        $rechercheRepository = $this->getDoctrine()->getRepository(recherche::class);
        dump($rechercheRepository->findAll());
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
        
        $em = $this->getDoctrine()->getManager();
        
        $nbPharmacies = $em->getRepository('AppBundle:Interet')->findNbDataPharmacies()[0][1];
        $nbBiblio = $em->getRepository('AppBundle:Interet')->findNbDataBibliotheque()[0][1];
        $nbBanque = $em->getRepository('AppBundle:Interet')->findNbDataBanque()[0][1];
        $nbCafe = $em->getRepository('AppBundle:Interet')->findNbDataCafe()[0][1];
        $nbAtm = $em->getRepository('AppBundle:Interet')->findNbDataDistributeur()[0][1];
        $nbResto = $em->getRepository('AppBundle:Interet')->findNbDataRestaurant()[0][1];
        $nbEssence = $em->getRepository('AppBundle:Interet')->findNbDataEssence()[0][1];
        $nbParking = $em->getRepository('AppBundle:Interet')->findNbDataParking()[0][1];
        $nbEcole = $em->getRepository('AppBundle:Ecole')->findNbDataEcole()[0][1];
        $nbGare = $em->getRepository('AppBundle:Gare')->findNbDataGare()[0][1];
        $nbPollution = $em->getRepository('AppBundle:Pollution')->findNbDataPollution()[0][1];
        return $this->render('default/data.html.twig', ["pharma" => $nbPharmacies, "biblio" => $nbBiblio, "banque" => $nbBanque, "cafe" => $nbCafe, "atm" => $nbAtm, "resto" => $nbResto, "essence" => $nbEssence, "parking" => $nbParking, "ecole" => $nbEcole, "gare" => $nbGare, "pollution" => $nbPollution]);
    }

    /**
     * @Route("/backoffice/content", name="backoffice_content")
     */
    public function contentAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        if ($request->getMethod() == 'POST') {
            $recherche = $request->request->get('keyword');
            $ecoles = $em->getRepository('AppBundle:Ecole')->findAllByRecherche($recherche);
            $gares = $em->getRepository('AppBundle:Gare')->findAllByRecherche($recherche);
            $interets = $em->getRepository('AppBundle:Interet')->findAllByRecherche($recherche);
            $pollutions = $em->getRepository('AppBundle:Pollution')->findBy(array(), null, 0, null);
        } else {
        //$request->query->get
            $ecoles = $em->getRepository('AppBundle:Ecole')->findBy(array(), null, 50, null);
            $gares = $em->getRepository('AppBundle:Gare')->findBy(array(), null, 50, null);
            $interets = $em->getRepository('AppBundle:Interet')->findBy(array(), null, 50, null);
            $pollutions = $em->getRepository('AppBundle:Pollution')->findBy(array(), null, 50, null);
        }
        
        return $this->render('default/content.html.twig', ["ecoles" => $ecoles, "gares" => $gares, "interets" => $interets, "pollutions" => $pollutions]);
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

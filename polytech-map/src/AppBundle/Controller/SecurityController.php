<?php
// src/AppBundle/Controller/SecurityController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
     public function loginAction(AuthenticationUtils $authenticationUtils)
 {
     // get the login error if there is one
     $error = $authenticationUtils->getLastAuthenticationError();
    // dump($error);

     // last username entered by the user
     $lastUsername = $authenticationUtils->getLastUsername();
     dump($authenticationUtils);

     return $this->render('security/login.html.twig', array(
         'last_username' => $lastUsername,
         'error'         => $error,
     ));
 }

     /**
      * @Route("/logincheck", name="login_check")
      */
      public function logincheckAction(AuthenticationUtils $authenticationUtils)
    {
      // get the login error if there is one
      $error = $authenticationUtils->getLastAuthenticationError();

      // last username entered by the user
      $lastUsername = $authenticationUtils->getLastUsername();
      dump($authenticationUtils);

      return $this->render('security/login.html.twig', array(
          'last_username' => $lastUsername,
          'error'         => $error,
      ));
    }

}
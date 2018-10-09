<?php
/**
 * Created by PhpStorm.
 * User: kashi
 * Date: 20/09/2018
 * Time: 11:32
 */

namespace App\Controller;


use App\Entity\ContenuFormation;
use App\Entity\ContenuImg;
use App\Entity\Formation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction(){

        $repository = $this->getDoctrine()->getRepository(Formation::class);
        // query for a single Product by its primary key (usually "id")
        $formations = $repository->findall();
        
        return $this->render('Main/index.html.twig', array('formations' => $formations ));

        //return $this->redirectToRoute('fos_user_security_login');
    }

    public function Contact(){
        return $this->render('Contact/contact.html.twig');
    }


    // permettra d'afficher le menu sur toutes les pages
    public function menuAction()
    {
        $requestStack =$this->get('request_stack');
        $maseterResquest = $requestStack->getMasterRequest();
        $route = null;
        if ($maseterResquest)
        {
            $route = $maseterResquest->attributes->get( '_route');
        }
        return $this->render( 'Mai/menu.html.twig',array('activeRoute' => $route ) );
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: kashi
 * Date: 20/09/2018
 * Time: 11:32
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction(){
        $user = $this->getUser();
        return $this->render('Main/index.html.twig', array('user' => $user));
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
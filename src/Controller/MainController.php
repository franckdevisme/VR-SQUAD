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

        if ($this ->getUser()) {
            if ($this->getUser()->hasRole('ROLE_ADMIN')) {
                return $this->redirect('admin/deshboards');
            }
            if ($this->getUser()->hasRole('ROLE_FORMATEUR')) {
                return $this->redirect('formatuer/deshboards');
            }
            if ($this->getUser()->hasRole('ROLE_USER')) {
                return $this->redirectToRoute('mon_deshboards');
            }

        }
        else{
            $repository = $this->getDoctrine()->getRepository(Formation::class);
            // query for a single Product by its primary key (usually "id")
            $formations = $repository->findall();


            return $this->render('Main/index.html.twig', array('formations' => $formations));

        }


        //return $this->redirectToRoute('fos_user_security_login');
    }

    public  function notfond(){
        return $this->render('Main/404.html.twig');
    }

    public function Contact(){
        return $this->render('Contact/contact.html.twig');
    }


    // permettra d'afficher le menu sur toutes les pages
    public function menu()
    {
        $requestStack =$this->get('request_stack');
        $maseterResquest = $requestStack->getMasterRequest();
        $route = null;
        if ($maseterResquest)
        {
            $route = $maseterResquest->attributes->get( '_route');
        }
        return $this->render( 'Main/meun.html.twig',array('activeRoute' => $route ) );
    }

}
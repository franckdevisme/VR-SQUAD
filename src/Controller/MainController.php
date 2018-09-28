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

        $repository = $this->getDoctrine()->getRepository(ContenuFormation::class);
        $repositoryimg = $this->getDoctrine()->getRepository(ContenuImg::class);
        // query for a single Product by its primary key (usually "id")

        foreach ($formations as $formation)
        {
        $ContenuFormation = $repository->findOneByidformation($formation->getIdformation());
            foreach ($ContenuFormation as $item){


                var_dump($item->getIdimage());
            $img = $repositoryimg->findBy($item->getIdimage());

        }

        }







        return $this->render('Main/index.html.twig', array('formations' => $formations , 'ContenuFormation' => $ContenuFormation));

        //return $this->redirectToRoute('fos_user_security_login');
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
<?php
/**
 * Created by PhpStorm.
 * User: kashi
 * Date: 17/10/2018
 * Time: 12:25
 */

namespace App\Controller;
use CMEN\GoogleChartsBundle\GoogleCharts\Options\Histogram\Histogram;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Formation;
use App\Entity\User;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\AreaChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ComboChart;



class UserController extends Controller
{
    /**
     * @Route("/mon_deshboards", name="mon_deshboards", methods="GET")
     */
    public function indexAction(){

        $formations = $this->getDoctrine()
            ->getRepository(Formation::class)
            ->findAll();

        $requestStack = $this->get('request_stack');
        $maseterResquest = $requestStack->getMasterRequest();
        $route = null;
        if ($maseterResquest) {
            $route = $maseterResquest->attributes->get('_route');
        }

        return $this->render('User/Dashboard.html.twig', array('formations' => $formations,'route' => $route));

        //return $this->redirectToRoute('fos_user_security_login');
    }


    /**
     * @Route("/user_deshboards", name="mon_tablo_bord", methods="GET")
     */
    public function tabloAction(){

        $formations = $this->getDoctrine()
            ->getRepository(Formation::class)
            ->findAll();

        return $this->render('User/index.html.twig', array('formations' => $formations));

        //return $this->redirectToRoute('fos_user_security_login');
    }

    /**
     * @Route("/user_formation/{id}", name="mesformation")
     */
    public function showformation(Request $request){

        if ($request->isXmlHttpRequest()){
            $id = $request->get('id');
            $formation = $this->getDoctrine()->getRepository(Formation::class)->find($id);
            $payload['nom'] =$formation->getNomFormation();
            $payload['Description'] =  $formation->getDescription();
            foreach ($formation->getcontenuImg() as $key => $item){
                $payload['images'][$key] = $item->geturlImage();
            }
            foreach ($formation->getContenutext() as $key => $item){
                $payload['titre'][$key] = $item->getTitre();
                $payload['text'][$key] = $item->getText();
            }
            return new JsonResponse(array('formation' => json_encode($payload)));

        }

    }


    /**
 * @Route("/user/profile", name="myprofile", methods="GET")
 */
    public function  monprofil(){
        if ($this->getUser()->getRoles()[0] == "ROLE_USER") {
            $requestStack = $this->get('request_stack');
            $maseterResquest = $requestStack->getMasterRequest();
            $route = null;
            if ($maseterResquest) {
                $route = $maseterResquest->attributes->get('_route');
            }

            $user = $this->getDoctrine()->getRepository(User::class)->find($this->getUser()->getId());
            return $this->render('user/monprofile.html.twig', array('user' => $user, 'route' => $route));
        }
        else {
            return $this->redirectToRoute('fos_user_security_login');
        }

    }


    /**
     * @Route("/user/formation", name="userformation", methods="GET")
     */
    public function  vrformation(){
        if ($this->getUser()->getRoles()[0] == "ROLE_USER") {
            $requestStack = $this->get('request_stack');
            $maseterResquest = $requestStack->getMasterRequest();
            $route = null;
            if ($maseterResquest) {
                $route = $maseterResquest->attributes->get('_route');
            }

            $user = $this->getDoctrine()->getRepository(User::class)->find($this->getUser()->getId());
            $formation = $this->getDoctrine()->getRepository(Formation::class)->findAll();
            return $this->render('user/nosformation.html.twig', array('user' => $user, 'route' => $route,'formations' => $formation ));
        }
        else {
            return $this->redirectToRoute('fos_user_security_login');
        }

    }


    /**
     * @Route("/user/byformation/{id}", name="oneformation", methods="GET")
     */
    public function  oneformation(Request $request){

            $requestStack = $this->get('request_stack');
            $maseterResquest = $requestStack->getMasterRequest();
            $route = null;
            if ($maseterResquest) {
                $route = $maseterResquest->attributes->get('_route');
            }

            $user = $this->getDoctrine()->getRepository(User::class)->find($this->getUser()->getId());
            $formation = $this->getDoctrine()->getRepository(Formation::class)->find($request->get('id'));
            return $this->render('user/nosformation.html.twig', array('user' => $user, 'route' => $route,'formation' => $formation ));

    }

}
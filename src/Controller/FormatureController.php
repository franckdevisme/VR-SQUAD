<?php
/**
 * Created by PhpStorm.
 * User: kashi
 * Date: 24/10/2018
 * Time: 15:34
 */

namespace App\Controller;
use App\Entity\Formation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class FormatureController extends Controller
{
    /**
     * @Route("/formatuer/deshboards", name="mes_formations", methods="GET")
     */
    public function indexAction(){

        $repository = $this->getDoctrine()->getRepository(Formation::class);
        // query for a single Product by its primary key (usually "id")
        $formations = $repository->findall();

        return $this->render('formateur/index.html.twig' , array('formations' => $formations));

    }

    /**
     * @Route("/maformation/{id}", name="maformation")
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

}
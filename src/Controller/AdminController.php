<?php
/**
 * Created by PhpStorm.
 * User: kashi
 * Date: 22/10/2018
 * Time: 18:00
 */

namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends Controller
{
    /**
     * @Route("/admin/deshboards", name="Admin_deshboards", methods="GET")
     */
    public function  indexAction(){

         return $this->render('admin/index.html.twig');
    }

    /**
     * @Route("/admin/users", name="listeuser", methods="GET")
     */
    public function  lstuser(){
        $user = $rps = $this->getDoctrine()->getRepository(User::class)->findAll();


        return $this->render('admin/lstuser.html.twig', array('users' =>$user));
    }

    /**
     * @Route("/admin/formatuer", name="listformatuer", methods="GET")
     */
    public function  lstformateur(){

        $allowedUsers = array();
        $users = $rps = $this->getDoctrine()->getRepository(User::class)->findAll();
        foreach($users as $user){

            if($user->getRoles() === "ROLE_FORMATEUR");
            {
                $allowedUsers = $user;
            }
        }
        return $this->render('admin/lstformatuer.html.twig', array('users' => $allowedUsers));
    }
    /**
     * @Route("/admin/user/{id}", name="user", methods="GET")
     */
    public function  findOneuser(Request $request){
        if ($request->isXmlHttpRequest()){
            $id = $request->get('id');
            $user = $this->getDoctrine()->getRepository(User::class)->find($id);
            $payload['username'] = $user->getUsername();
            $payload['nom'] = $user->getNom();
            $payload['prenom'] = $user->getPrenom();
            $payload['poste'] = $user->getPoste();
            $payload['email'] = $user->getEmail();
            //$payload['entreprise'] = $user->getIdentreprise();


            return new JsonResponse(array('user' => json_encode($payload)));

        }

        return $this->render('admin/lstuser.html.twig');
    }


}
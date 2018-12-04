<?php
/**
 * Created by PhpStorm.
 * User: kashi
 * Date: 22/10/2018
 * Time: 18:00
 */

namespace App\Controller;
use App\Entity\Entreprise;
use App\Entity\Formation;
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
        if ($this->getUser()->getRoles()[0] == "ROLE_ADMIN") {

            dump($this->getUser()->getRoles()[0]);
            $requestStack = $this->get('request_stack');
            $maseterResquest = $requestStack->getMasterRequest();
            $route = null;
            if ($maseterResquest) {
                $route = $maseterResquest->attributes->get('_route');
            }

            $query = $this->getDoctrine()->getEntityManager()
                ->createQuery(
                    'SELECT u FROM App:User u WHERE u.roles LIKE :role'
                )->setParameter('role', '%"ROLE_FORMATEUR"%'
                );
            $usersFormateur = $query->getResult();

            $query = $this->getDoctrine()->getEntityManager()
                ->createQuery(
                    'SELECT u FROM App:User u WHERE u.roles NOT LIKE :role'
                )->setParameter('role', '%"ROLE_FORMATEUR"%'
                );
            $users = $query->getResult();

            $formation = $this->getDoctrine()->getRepository(Formation::class)->findAll();


            return $this->render('admin/index.html.twig', array('route' => $route, 'ROLEFORMATEUR' => $usersFormateur, 'ROLEUSER' => $users));
        }
        else {
            return $this->redirectToRoute('fos_user_security_login');
        }

    }

    /**
     * @Route("/admin/users", name="listeuser", methods="GET")
     */
    public function  lstuser(){
        if ($this->getUser()->getRoles()[0] == "ROLE_ADMIN") {
            $requestStack = $this->get('request_stack');
            $maseterResquest = $requestStack->getMasterRequest();
            $route = null;
            if ($maseterResquest) {
                $route = $maseterResquest->attributes->get('_route');
            }

            $users = $rps = $this->getDoctrine()->getRepository(User::class)->findAll();

            return $this->render('admin/lstuser.html.twig', array('users' => $users, 'route' => $route));
        }
        else {
            return $this->redirectToRoute('fos_user_security_login');
        }
    }

    /**
     * @Route("/admin/formatuer", name="listformatuer", methods="GET")
     */
    public function  lstformateur(){
        if ($this->getUser()->getRoles()[0] == "ROLE_ADMIN") {
            $requestStack = $this->get('request_stack');
            $maseterResquest = $requestStack->getMasterRequest();
            $route = null;
            if ($maseterResquest) {
                $route = $maseterResquest->attributes->get('_route');
            }

            $query = $this->getDoctrine()->getEntityManager()
                ->createQuery(
                    'SELECT u FROM App:User u WHERE u.roles LIKE :role'
                )->setParameter('role', '%"ROLE_FORMATEUR"%'
                );
            $users = $query->getResult();

            return $this->render('admin/lstformatuer.html.twig', array('users' => $users, 'route' => $route));
        }
        else {
            return $this->redirectToRoute('fos_user_security_login');
        }
    }
    /**
     * @Route("/admin/formation", name="listformation", methods="GET")
     */
    public function  lstformation(){
        if ($this->getUser()->getRoles()[0] == "ROLE_ADMIN") {
            $requestStack = $this->get('request_stack');
            $maseterResquest = $requestStack->getMasterRequest();
            $route = null;
            if ($maseterResquest) {
                $route = $maseterResquest->attributes->get('_route');
            }
            $formations = $this->getDoctrine()->getRepository(Formation::class)->findAll();
            return $this->render('admin/lstformtion.html.twig', array('formations' => $formations, 'route' => $route));
        }
        else {
            return $this->redirectToRoute('fos_user_security_login');
        }
    }



    /**
     * @Route("/admin/profile", name="monprofile", methods="GET")
     */
    public function  monprofil(){
        if ($this->getUser()->getRoles()[0] == "ROLE_ADMIN") {
            $requestStack = $this->get('request_stack');
            $maseterResquest = $requestStack->getMasterRequest();
            $route = null;
            if ($maseterResquest) {
                $route = $maseterResquest->attributes->get('_route');
            }

            $user = $this->getDoctrine()->getRepository(User::class)->find($this->getUser()->getId());
            return $this->render('admin/monprofile.html.twig', array('user' => $user, 'route' => $route));
        }
        else {
            return $this->redirectToRoute('fos_user_security_login');
        }

    }
    /**
     * @Route("/admin/user/{id}", name="user", methods="GET")
     */
    public function  findOneuser(Request $request){
        if ($this->getUser()->getRoles()[0] == "ROLE_ADMIN") {
            if ($request->isXmlHttpRequest()) {
                $id = $request->get('id');
                $user = $this->getDoctrine()->getRepository(User::class)->find($id);
                $payload['username'] = $user->getUsername();
                $payload['nom'] = $user->getNom();
                $payload['prenom'] = $user->getPrenom();
                $payload['job'] = $user->getPoste();
                $payload['email'] = $user->getEmail();
                foreach ($user->getIdentreprise() as $item) {
                    $payload['Entreprise'] = $item->getNomEntreprise();
                    $payload['address'] = $item->getAdresse();
                    $payload['cp'] = $item->getCp();
                    $payload['ville'] = $item->getVille();
                    $payload['pays'] = $item->getPays();
                }
                return new JsonResponse(array('user' => json_encode($payload)));
            }
            return $this->render('admin/lstuser.html.twig');
        }
        else {
            return $this->redirectToRoute('fos_user_security_login');
        }
    }

    /**
     * @Route("/admin/formation/{id}", name="formation", methods="GET")
     */
    public function  findOneFormation(Request $request){

            if ($request->isXmlHttpRequest()) {
                $id = $request->get('id');
                dump($id);
                $formation = $this->getDoctrine()->getRepository(Formation::class)->find($id);
                $payload['nom'] = $formation->getNomformation();
                $payload['Date'] = $formation->getDateDePublication();
                $payload['Description'] = $formation->getDescription();
                foreach ($formation->getContenutext() as $item) {
                    $payload['text'] = $item->getText();
                    $payload['titre'] = $item->getTitre();
                }
                foreach ($formation->getContenuImg() as $item) {
                    $payload['Urlimage'] = $item->getUrlimage();
                }



                return new JsonResponse(array('formation' => json_encode($payload)));
            }
            return $this->render('admin/lstformation.html.twig');

    }



}
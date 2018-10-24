<?php
/**
 * Created by PhpStorm.
 * User: kashi
 * Date: 22/10/2018
 * Time: 18:00
 */

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends Controller
{
    /**
     * @Route("/admin/deshboards", name="Admin_deshboards", methods="GET")
     */
    public function  indexAction(){

         return $this->render('Admin/index.html.twig');
    }

}
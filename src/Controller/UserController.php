<?php
/**
 * Created by PhpStorm.
 * User: kashi
 * Date: 20/09/2018
 * Time: 13:49
 */

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class UserController extends AbstractController
{
    public function new(Request $request)
    {

        // creates a user and gives it some dummy data for this example
        $user = new User();

        //$user->setIdentreprise(Entreprise(1));

        $form = $this->createFormBuilder($user)
            ->add('Username', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $user = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('Users/newusers.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
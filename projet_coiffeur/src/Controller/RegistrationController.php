<?php
// src/Controller/RegistrationController.php
namespace App\Controller;

use App\Form\SalonType;
use App\Entity\Salon;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="registration")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $salon = new Salon();
        $form = $this->createForm(SalonType::class, $salon);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $passwordEncoder->encodePassword($salon, $salon->getPassword());
            $salon->setPassword($password);

            // Par defaut l'utilisateur aura toujours le rôle ROLE_USER
            $salon->setRoles(['ROLE_USER']);

            // On enregistre l'utilisateur dans la base
            $em = $this->getDoctrine()->getManager();
            $em->persist($salon);
            $em->flush();

            return $this->redirectToRoute('login');
        }

        return $this->render(
            'inscription/register.html.twig',
            array('form' => $form->createView())
        );
    }
}
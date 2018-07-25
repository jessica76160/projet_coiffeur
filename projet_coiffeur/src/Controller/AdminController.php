<?php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Salon;
use App\Form\Salon1Type;
use App\Repository\SalonRepository;
use App\Entity\PrestationClient;
use App\Form\PrestationClient1Type;
use App\Repository\PrestationClientRepository;
use App\Entity\PrestationComposee;
use App\Form\PrestationComposeeType;
use App\Repository\PrestationComposeeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
     //----------------------------------------------------------- SALON ---------------------------------------------
    /**
     * @Route("/admin/salon/", name="salon_index", methods="GET")
     */
    public function indexsalon(SalonRepository $salonRepository): Response
    {
        return $this->render('admin/salon/index.html.twig', ['salons' => $salonRepository->findAll()]);
    }
    /**
     * @Route("/admin/salon/new", name="salon_new", methods="GET|POST")
     */
    public function newsalon(Request $request): Response
    {
        $salon = new Salon();
        $form = $this->createForm(Salon1Type::class, $salon);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($salon);
            $em->flush();
            return $this->redirectToRoute('salon_index');
        }
        return $this->render('admin/salon/new.html.twig', [
            'salon' => $salon,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/salon/{id}", name="salon_show", methods="GET")
     */
    public function showsalon(Salon $salon): Response
    {
        return $this->render('admin/salon/show.html.twig', ['salon' => $salon]);
    }
    /**
     * @Route("/admin/salon/{id}/edit", name="salon_edit", methods="GET|POST")
     */
    public function editsalon(Request $request, Salon $salon): Response
    {
        $form = $this->createForm(Salon1Type::class, $salon);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('salon_edit', ['id' => $salon->getId()]);
        }
        return $this->render('admin/salon/edit.html.twig', [
            'salon' => $salon,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/salon/{id}", name="salon_delete", methods="DELETE")
     */
    public function deletesalon(Request $request, Salon $salon): Response
    {
        if ($this->isCsrfTokenValid('delete'.$salon->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($salon);
            $em->flush();
        }
        return $this->redirectToRoute('salon_index');
    }
    //------------------------------------------------ PRESTATION CLIENT ------------------------------------------
    
    /**
     * @Route("/admin/prestation/client/", name="prestation_client_index", methods="GET")
     */
    public function indexprestation_client(PrestationClientRepository $prestationClientRepository): Response
    {
        return $this->render('admin/prestation_client/index.html.twig', ['prestation_clients' => $prestationClientRepository->findAll()]);
    }
    /**
     * @Route("/admin/prestation/client/new", name="prestation_client_new", methods="GET|POST")
     */
    public function newprestation_client(Request $request): Response
    {
        $prestationClient = new PrestationClient();
        $form = $this->createForm(PrestationClient1Type::class, $prestationClient);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($prestationClient);
            $em->flush();
            return $this->redirectToRoute('prestation_client_index');
        }
        return $this->render('admin/prestation_client/new.html.twig', [
            'prestation_client' => $prestationClient,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/prestation/client/{id}", name="prestation_client_show", methods="GET")
     */
    public function showprestation_client(PrestationClient $prestationClient): Response
    {
        return $this->render('admin/prestation_client/show.html.twig', ['prestation_client' => $prestationClient]);
    }
    /**
     * @Route("/admin/prestation/client/{id}/edit", name="prestation_client_edit", methods="GET|POST")
     */
    public function editprestation_client(Request $request, PrestationClient $prestationClient): Response
    {
        $form = $this->createForm(PrestationClient1Type::class, $prestationClient);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('prestation_client_edit', ['id' => $prestationClient->getId()]);
        }
        return $this->render('admin/prestation_client/edit.html.twig', [
            'prestation_client' => $prestationClient,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/prestation/client/{id}", name="prestation_client_delete", methods="DELETE")
     */
    public function deleteprestation_client(Request $request, PrestationClient $prestationClient): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prestationClient->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($prestationClient);
            $em->flush();
        }
        return $this->redirectToRoute('admin/prestation_client_index');
    }
    //------------------------------------------ PRESTATION COMPOSEE -----------------------------------------------
    /**
     * @Route("/admin/prestation/composee/", name="prestation_composee_index", methods="GET")
     */
    public function indexprestation_composee(PrestationComposeeRepository $prestationComposeeRepository): Response
    {
        return $this->render('admin/prestation_composee/index.html.twig', ['prestation_composees' => $prestationComposeeRepository->findAll()]);
    }
    /**
     * @Route("/admin/prestation/composee/new", name="prestation_composee_new", methods="GET|POST")
     */
    public function newprestation_composee(Request $request): Response
    {
        $prestationComposee = new PrestationComposee();
        $form = $this->createForm(PrestationComposeeType::class, $prestationComposee);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($prestationComposee);
            $em->flush();
            return $this->redirectToRoute('prestation_composee_index');
        }
        return $this->render('admin/prestation_composee/new.html.twig', [
            'prestation_composee' => $prestationComposee,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/prestation/composee/{id}", name="prestation_composee_show", methods="GET")
     */
    public function showprestation_composee(PrestationComposee $prestationComposee): Response
    {
        return $this->render('admin/prestation_composee/show.html.twig', ['prestation_composee' => $prestationComposee]);
    }
    /**
     * @Route("/admin/prestation/composee/{id}/edit", name="prestation_composee_edit", methods="GET|POST")
     */
    public function editprestation_composee(Request $request, PrestationComposee $prestationComposee): Response
    {
        $form = $this->createForm(PrestationComposeeType::class, $prestationComposee);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('prestation_composee_edit', ['id' => $prestationComposee->getId()]);
        }
        return $this->render('admin/prestation_composee/edit.html.twig', [
            'prestation_composee' => $prestationComposee,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/prestation/composee/{id}", name="prestation_composee_delete", methods="DELETE")
     */
    public function deleteprestation_composee(Request $request, PrestationComposee $prestationComposee): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prestationComposee->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($prestationComposee);
            $em->flush();
        }
        return $this->redirectToRoute('prestation_composee_index');
    }
}
<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Livre;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Categorie;

class DefaultController extends Controller
{
    /**
     * Lists all product entities.
     *
     * @Route("/", name="livre_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $livre = $em->getRepository('AppBundle:Livre')->findAll();

        return $this->render(':default:index.html.twig', array(
            'livres' => $livre,
        ));
    }

    /**
     * Creates a new product entity.
     *
     * @Route("/ajout", name="ajouter")
     * @Method({"GET", "POST"})
     */

    public function ajoutAction(Request $request)
    {
        $livre = new Livre();
        $form = $this->createForm('AppBundle\Form\LivreType', $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($livre);
            $em->flush();

            return $this->redirectToRoute('livre_index', array('id' => $livre->getId()));
        }

        return $this->render(':default:form.html.twig', array(
            'livre' => $livre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Deletes a product entity.
     *
     * @Route("/{id}", name="livre_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Livre $livre)
    {
        $form = $this->createDeleteForm($livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($livre);
            $em->flush();
        }

        return $this->redirectToRoute('livre_index');
    }

    /**
     * Creates a form to delete a product entity.
     *
     * @param Livre $livre The product entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Livre $livre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('livre_delete', array('id' => $livre->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    /**
     * Finds and displays a product entity.
     *
     * @Route("/{id}", name="livre_show")
     * @Method("GET")
     */
    public function showAction(Livre $livre)
    {
        $deleteForm = $this->createDeleteForm($livre);

        return $this->render(':default:show.html.twig', array(
            'livre' => $livre,
            'delete_form' => $deleteForm->createView(),
        ));
    }
}
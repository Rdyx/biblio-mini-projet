<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Livre;
//use Doctrine\DBAL\Types\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request = null)
    {
//        return new Response('<a href="http://127.0.0.1:8000/app_dev.php/login">login</a>');
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/ajout", name="ajouter")
     */
    public function ajoutAction()
    {
        $livre = new Livre();
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $livre);

        $formBuilder->add('liv_titre', TextType::class);
        $formBuilder->add('liv_auteur', TextType::class);
        $formBuilder->add('liv_description', TextType::class);

        $form = $formBuilder->getForm();

        return $this->render('ajouter', array('form' => $form->createView()));
    }
}
//    /**
//     * Lists all product entities.
//     *
//     * @Route("/", name="product_index")
//     * @Method("GET")
//     */
//    public function indexAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $products = $em->getRepository('AppBundle:Product')->findAll();
//
//        return $this->render('product/index.html.twig', array(
//            'products' => $products,
//        ));
//    }
//}

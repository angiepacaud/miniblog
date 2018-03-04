<?php

namespace Blog\ArticlesBundle\Controller;

use OC\PlatformBundle\Entity\Articles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
         $listAdverts = array(
      array(
        'title'   => 'Article 1',
        'id'      => 1,
        'author'  => 'User 1',
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        ),
        
      array(
        'title'   => 'Article 2',
        'id'      => 2,
        'author'  => 'User 2',
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        )
        
    );

    // Et modifiez le 2nd argument pour injecter notre liste
    return $this->render('BlogArticlesBundle:Default:index.html.twig', array(
      'listAdverts' => $listAdverts
    ));

    }

  public function menuAction($limit)
  {
    // On fixe en dur une liste ici, bien entendu par la suite
    // on la récupérera depuis la BDD !
    $listAdverts = array(
      array('id' => 1, 'title' => 'Article 1'),
      array('id' => 2, 'title' => 'Article 2'),
      array('id' => 3, 'title' => 'Article 3')
    );

    return $this->render('BlogArticlesBundle:Default:menu.html.twig', array(
      'listAdverts' => $listAdverts
    ));
  }

    public function viewAction($id)
  {
	$repository = $this->getDoctrine()

      ->getManager()
      ->getRepository('BlogArticlesBundle:Default');

    	$advert = $repository->find($id);

    return $this->render('BlogArticlesBundle:Default:view.html.twig', array(
      'advert' => $advert
    ));

  }


   public function addAction(Request $request)
  {

    $advert = new Advert();
    $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $advert);

    // On ajoute les champs 
    $formBuilder
      ->add('title',     TextType::class)
      ->add('content',   TextareaType::class)
      ->add('author',    TextType::class)
      ->add('save',      SubmitType::class)
      ->getForm()
    ;

     if ($request->isMethod('POST')) {
      $form->handleRequest($request);
      if ($form->isValid()) {

        $em = $this->getDoctrine()->getManager();
        $em->persist($advert);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Article bien enregistré.');
        return $this->redirectToRoute('blog_articles_view', array('id' => $advert->getId()));

      }
    }

    return $this->render('BlogArticlesBundle:Default:add.html.twig', array(
      'form' => $form->createView(),
    ));
  }
  


  public function editAction($id, Request $request)
  {

   if ($request->isMethod('POST')) {
      $request->getSession()->getFlashBag()->add('notice', 'Article bien modifié.');

      return $this->redirectToRoute('blog_articles_view', array('id' => 1));
    }

    $advert = array(
 	'title'   => 'Article 1',
    'id'      => $id,
    'author'  => 'User 1',
    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'

    );

    return $this->render('BlogArticlesBundle:Default:edit.html.twig', array(
      'advert' => $advert

    ));
  }



  public function deleteAction($id)
  {

    return $this->render('BlogArticlesBundle:Default:delete.html.twig');

  }




}

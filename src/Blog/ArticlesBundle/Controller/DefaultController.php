<?php

namespace Blog\ArticlesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
	  return $this->render('BlogArticlesBundle:Default:view.html.twig', array(
      'id' => $id
    ));
  
  }


   public function addAction(Request $request)
  {

    if ($request->isMethod('POST')) {

      $request->getSession()->getFlashBag()->add('article', 'Article bien enregistré.');

      return $this->redirectToRoute('blog_articles_view', array('id' => 1));

    }

    return $this->render('BlogArticlesBundle:Default:add.html.twig');

  }


  public function editAction($id, Request $request)
  {

    if ($request->isMethod('POST')) {

      $request->getSession()->getFlashBag()->add('notice', 'Article bien modifié.');

      return $this->redirectToRoute('blog_articles_view', array('id' => 5));

    }

    return $this->render('BlogArticlesBundle:Default:edit.html.twig');

  }



  public function deleteAction($id)
  {

    return $this->render('BlogArticlesBundle:Default:delete.html.twig');

  }




}

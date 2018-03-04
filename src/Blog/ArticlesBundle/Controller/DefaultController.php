<?php

namespace Blog\ArticlesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
         $content = $this->get('templating')->render('BlogArticlesBundle:Default:index.html.twig', array('listAdverts' => array()
         	));
    
    return new Response($content);

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

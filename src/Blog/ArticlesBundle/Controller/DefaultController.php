<?php

namespace Blog\ArticlesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
         $content = $this->get('templating')->render('BlogArticlesBundle:Default:index.html.twig', array('nom' => 'articles'));
    
    return new Response($content);
    }

    public function viewAction($id, Request $request)

  {
	  $tag = $request->query->get('contenu');

    return $this->render('BlogArticlesBundle:Default:view.html.twig', array(
      'id'  => $id,
      'contenu' => $tag,
    ));
  }


}

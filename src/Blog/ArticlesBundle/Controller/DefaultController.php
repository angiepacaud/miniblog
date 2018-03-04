<?php

namespace Blog\ArticlesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
         $content = $this->get('templating')->render('BlogArticlesBundle:Default:index.html.twig', array('nom' => 'rete'));
    
    return new Response($content);
    }
}

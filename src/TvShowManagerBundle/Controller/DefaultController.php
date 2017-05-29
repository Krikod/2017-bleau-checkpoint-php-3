<?php

namespace TvShowManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TvShowManagerBundle\TvShowManagerBundle;
use Symfony\Component\BrowserKit\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TvShowManagerBundle:Default:index.html.twig');
    }


    public function sListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tvshows = $em->getRepository('TvShowManagerBundle:TvShow')->findAll();

        return $this->render('TvShowManagerBundle:Default:slist.html.twig', array(
            'tvshows' => $tvshows,
        ));
    }
}


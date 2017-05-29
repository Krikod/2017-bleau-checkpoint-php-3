<?php

namespace TvShowManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TvShowManagerBundle\TvShowManagerBundle;

class TvShowController extends Controller
{
    public function addAction()
    {
        return $this->render('TvShowManagerBundle:TvShow:add.html.twig', array(
            // ...
        ));
    }

    public function listAction()
    {
        $em = $this->getRepository()->getManager();
        $tvshows = $em->getRepository('TvShowManagerBundle:TvShow:list')->FindOneById($id);

        return $this->render('TvShowManagerBundle:TvShow:list.html.twig', array(
            'tvshow' => $tvshows,
        ));
    }

    public function showAction($id)
    {

        $em = $this->getRepository()->getManager();
        $tvshow = $em->getRepository('TvShowManagerBundle:TvShow')->myFindOneById($id);

        return $this->render('TvShowManagerBundle:Show:show.html.twig', array(
            'tvshow' => $tvshow
        ));
    }

    public function editAction()
    {
        return $this->render('TvShowManagerBundle:TvShow:edit.html.twig', array(
            // ...
        ));
    }

}

<?php

namespace TvShowManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TvShowController extends Controller
{
    public function addAction()
    {
        return $this->render('TvShowManagerBundle:TvShow:add.html.twig', array(
            // ...
        ));
    }

    /**
     * Show all TvShow with his episodes
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tvShows = $em->getRepository('TvShowManagerBundle:TvShow')->myFindAll();

        return $this->render('TvShowManagerBundle:TvShow:list.html.twig', array(
            'tvshows' => $tvShows,
        ));
    }

    public function editAction()
    {
        return $this->render('TvShowManagerBundle:TvShow:edit.html.twig', array(
            // ...
        ));
    }

    public function deleteAction()
    {
        return $this->render('TvShowManagerBundle:TvShow:delete.html.twig', array(
            // ...
        ));
    }

    /**
     * Show one TvShow with his episodes
     * @param $id int type TvShow
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $tvshow = $em->getRepository('TvShowManagerBundle:TvShow')->myFindOneById($id);
        return $this->render('TvShowManagerBundle:TvShow:show.html.twig', array(
            'tvshow' => $tvshow
        ));
    }

}

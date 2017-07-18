<?php

namespace TvShowManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TvShowManagerBundle\Entity\TvShow;
use TvShowManagerBundle\Form\TvShowType;

class TvShowController extends Controller
{
    public function addTvShowAction(Request $request)
    {
        $tvShow = new TvShow();
        $form = $this->createForm(TvShowType::class, $tvShow);

        $form->handleRequest($request); //récupère tout le tableau $_POST, récupère valeurs et clé, fait des sets = setName si clé 'name'

//        if ($request->getMethod() == 'POST') = à:
        // isValid utile si on fait de la validation de formulaire - il faut définir paramètres de validation (requirements)
        if ($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tvShow);
            $em->flush();

            return $this->redirectToRoute('list');
        }

        return $this->render('TvShowManagerBundle:TvShow:add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * Show all TvShow with his episodes
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        //TODO: Modifier méthode myfindall pour récupérer les TVSHOWS même si elles ne sont liées à aucun épisode (Finall met l'a série
        $tvShows = $em->getRepository('TvShowManagerBundle:TvShow')->FindAll();

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

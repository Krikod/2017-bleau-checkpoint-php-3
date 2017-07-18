<?php

namespace TvShowManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EpisodeController extends Controller
{
    public function deleteAction($idTvShow, $id)
    {
        $em = $this->getDoctrine()->getManager();

        // Récupération de l'épisode correspondant à l'id reçue
        $episode = $em->getRepository('TvShowManagerBundle:Episode')->myFindOneById($id);

        // delete de l'épisode
        $em->remove($episode);

        // validation côté base de données
        $em->flush();

        return $this->redirectToRoute('show', array(
            'id' => $idTvShow
        ));
    }



}

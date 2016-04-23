<?php

namespace AppBundle\Controller;

use AppBundle\Form\GameType;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Model;

class GamesController extends FOSRestController implements ClassResourceInterface
{
    public function cgetAction()
    {
    }

    /**
     * @param Request $request
     * @return Form
     */
    public function postAction(Request $request)
    {
        $form = $this->createForm(GameType::class);
        $form->submit($request->request->all());
        if ($form->isValid()) {
            /** @var Model\Game $gameModel */
            $gameModel = $form->getData();
            $game = $gameModel->toDocument();

            $dm = $this->get('doctrine_mongodb')->getManager();
            $dm->persist($game);
            $dm->flush();

            return $this->handleView($this->view($game, 200));
        }

        return $this->handleView($this->view($form));
    }

    public function getAction($gameId)
    {
    }
}

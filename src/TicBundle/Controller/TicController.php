<?php

namespace TicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use TicBundle\Utils\Move;

class TicController extends Controller
{
    /**
     * @Route("/random/{limit}")
     */
    public function randomAction($limit)
    {
        $number = rand(0, $limit);

        return $this->render('tic/random.html.twig', array(
            'number' => $number
        ));
    }

    /**
     * @Route("/tictactoe")
     */
    public function boardAction()
    {
        $win = false;

        return $this->render('tic/board.html.twig', array(
            'win' => $win
        ));
    }

    /**
     * @Route("/api/makeMove")
     */
    public function makeMoveAction(Request $request)
    {
        $move = new Move();

        $boardState = $request->request->get('boardState');
        $playerUnit = $request->request->get('playerUnit');

        try {
            $result = $move->makeMove($boardState, $playerUnit);
        } catch (\Exception $ex) {
            $result = false;
        }

        $response = new JsonResponse();
        $response->setData(array(
            'move' => $result
        ));
        if (!$result) {
            $response->setStatusCode(418);
        }

        return $response;
    }
}

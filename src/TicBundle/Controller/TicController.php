<?php

namespace TicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
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
    public function makeMoveAction()
    {
        $move = new Move();
        $state = array(
          0 => array('X', 'O', ''),
          1 => array('X', 'O', 'O'),
          2 => array('', '', ''),
        );
        $result = $move->makeMove($state, 'X');

        $response = new JsonResponse();
        $response->setData(array(
            'data' => $result
        ));

        return $response;
    }
}

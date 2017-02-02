<?php

namespace Tests\TicBundle\Utils;

use TicBundle\Utils\Move;

class MoveTest extends \PHPUnit_Framework_TestCase
{
    public function testMakeMove()
    {
        $move = new Move();
        $state = array(
          0 => array('X', 'O', ''),
          1 => array('X', 'O', 'O'),
          2 => array('', '', ''),
        );
        $result = $move->makeMove($state, 'X');

        $this->assertEquals(3, count($result));
    }

    public function testisPlayerWonFalse()
    {
        $move = new Move();
        $state = array(
          0 => array('X', 'X', 'O'),
          1 => array('O', '', 'O'),
          2 => array('', '', 'O'),
        );
        $player = 'X';

        $result = $move->isPlayerWon($state, $player);

        $this->assertFalse($result);
    }

    public function testisWhoWonFalse()
    {
        $move = new Move();
        $state = array(
          0 => array('X', 'X', 'O'),
          1 => array('', '', 'O'),
          2 => array('O', '', 'X'),
        );
        $player = 'X';

        $result = $move->whoWon($state);

        $this->assertFalse($result);
    }
}
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

        $this->assertEquals(array(2, 0 , 'O'), $result);
    }
}

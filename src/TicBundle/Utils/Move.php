<?php

namespace TicBundle\Utils;

use TicBundle\Utils\MoveInterface;

class Move implements MoveInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeMove($boardState, $playerUnit = 'X')
    {
        $column = rand(0, 2);
        $row = rand(0, 2);

        return array(2, 0, 'O');
    }
}

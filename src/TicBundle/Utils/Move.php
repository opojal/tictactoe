<?php

namespace TicBundle\Utils;

use TicBundle\Utils\MoveInterface;

class Move implements MoveInterface
{
    /**
     * @var int
     */
    private $size = 3;

    /**
     * {@inheritdoc}
     */
    public function makeMove($boardState, $playerUnit = 'X')
    {
        $column = rand(0, 2);
        $row = rand(0, 2);

        if ($this->whoWon($boardState, $playerUnit)) {
            // create a new specific exception, and throw it here
            throw new Exception('There is a winner, no more moves!');
        }

        return array(2, 0, 'O');
    }

    /**
     * Function to check if a player wins, will check all the possible combinations
     *
     * @param array $boardState
     * @param string $playerUnit
     * @return boolean
     */
    public function isPlayerWon($boardState, $playerUnit = 'X')
    {
        //horizontal check
        if ($this->isWonVerticalOrHorizontal($boardState, $playerUnit, 'x', 'y')) {
            return true;
        }

        // vertical check
        if ($this->isWonVerticalOrHorizontal($boardState, $playerUnit, 'y', 'x')) {
            return true;
        }

        //digonal
        if ($this->isWonDiagonal($boardState, $playerUnit)) {
            return true;
        }

        //other diagonal
        if ($this->isWonDiagonal($boardState, $playerUnit, true)) {
            return true;
        }

        return false;
    }

    /**
     * Function to check if player has a winning combination horizontally or vertically
     * $col and $row will be used to flip the for loop,
     * so we can check the combination vertically or horizontally
     *
     * @param array $boardState
     * @param string $playerUnit
     * @param string $col
     * @param string $row
     * @return boolean
     */
    private function isWonVerticalOrHorizontal($boardState, $playerUnit = 'X', $col, $row)
    {
        for (${$col} = 0; ${$col} < $this->size; ${$col}++) {
            $countToWin = 0;
            for (${$row} = 0; ${$row} < $this->size; ${$row}++) {
                if ($boardState[$x][$y] == $playerUnit) {
                    $countToWin++;
                }
            }

            if ($countToWin == $this->size) {
                return true;
            }
        }

        return false;
    }

    /**
     * Function to check if player has a winning combination diagonally
     * $flip is used to simply flip the combination to get the other side of the diagonal
     *
     * @param array $boardState
     * @param string $playerUnit
     * @param bool $flip
     * @return boolean
     */
    private function isWonDiagonal($boardState, $playerUnit = 'X', $flip = false)
    {
        $countToWin = 0;
        for ($x = 0; $x < $this->size; $x++) {
            $y = $flip ? $x : $this->size - 1 - $x;
            if ($boardState[$x][$y] == $playerUnit) {
                $countToWin++;
            }

            if ($countToWin == $this->size) {
                return true;
            }
        }

        return false;
    }

    /**
     * Function to check if there is a winner, if there was return the player
     *
     * @param array $boardState
     * @return string|boolean
     */
    public function whoWon($boardState)
    {
        if ($winner = $this->whoWonVerticalOrHorizontal($boardState, 'x', 'y')) {
            return $winner;
        }

        if ($winner = $this->whoWonVerticalOrHorizontal($boardState, 'y', 'x')) {
            return $winner;
        }

        if ($winner = $this->whoWonDiagonal($boardState, true)) {
            return $winner;
        }

        if ($winner = $this->whoWonDiagonal($boardState)) {
            return $winner;
        }

        return false;
    }

    /**
     * Function to check who wins horizontally or vertically
     * $col and $row will be used to flip the for loop,
     * so we can check the combination vertically or horizontally
     *
     * @param array $boardState
     * @param string $col
     * @param string $row
     * @return string|boolean
     */
    private function whoWonVerticalOrHorizontal($boardState, $col, $row)
    {
        for (${$col} = 0; ${$col} < $this->size; ${$col}++) {
            $countToWin = 0;
            $currentPlayer = 'X';
            for (${$row} = 0; ${$row} < $this->size; ${$row}++) {

                if (empty($boardState[$x][$y])) {
                  //then there is no winner, skip
                  continue;
                }

                if (${$row} == 0) {
                    $currentPlayer = $boardState[$x][$y];
                }

                if ($boardState[$x][$y] == $currentPlayer) {
                    $countToWin++;
                }
            }

            if ($countToWin == $this->size) {
                return $currentPlayer;
            }
        }

        return false;
    }

    /**
     * Function to check who wins diagonally
     * $flip is used to simply flip the combination to get the other side of the diagonal
     *
     * @param array $boardState
     * @param boolean $flip
     * @return string|boolean
     */
    private function whoWonDiagonal($boardState, $flip = false)
    {
        $countToWin = 0;
        $currentPlayer = 'X';
        for ($x = 0; $x < $this->size; $x++) {
            $y = $flip ? $x : $this->size - 1 - $x;
            if (empty($boardState[$x][$y])) {
              //then there is no winner, skip
              continue;
            }

            if ($x == 0) {
                $currentPlayer = $boardState[$x][$y];
            }

            if ($boardState[$x][$y] == $currentPlayer) {
                $countToWin++;
            }

            if ($countToWin == $this->size) {
                return $currentPlayer;
            }
        }

        return false;
    }
}

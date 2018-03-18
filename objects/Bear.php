<?php
/**
 * Created by PhpStorm.
 * User: ejcka
 * Date: 3/17/2018
 * Time: 4:26 PM
 */

class Bear extends Creature
{
    /**
     * @return string attack message
     */
    public function attack()
    {
        return "<p>The bear strikes you with its massive paw, knocking you to the ground. You begin to see stars</p>";
    }

    /**
     * @return string kill message
     */
    public function kill($player)
    {
        return "<p>The bear bites you and the world goes black.</p>".$player->playerDeath();
    }
}
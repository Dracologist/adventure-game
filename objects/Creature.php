<?php
/**
 * Created by PhpStorm.
 * User: ejcka
 * Date: 3/17/2018
 * Time: 10:49 AM
 */

class Creature
{
    /**
     * @return string attack message
     */
    public function attack(){
        return "<p>The creature attacks you!</p>";
    }
    /**
     * @param Player $player
     * @return string kill message
     */
    public function kill($player){
        return "<p>The creature kills you!</p>".$player->playerDeath();
    }
    /**
     * @param int probability (1-100)
     * @return true if creature perceives the thing, false otherwise
     */
    public function perception($probability){
        return rand(1, 100) <= $probability;
    }
}
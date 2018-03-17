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
     * @param Player $player
     */
    public function attack($player){
        $player->deductPoints();
        echo "The creature attacks you!";
    }
    /**
     * @param Player $player
     */
    public function kill($player){
        $player->playerDeath();
        echo "The creature kills you!";
    }
    /**
     * @param Player $player
     */
    public function reward($player){
        $player->awardPoints();
        echo "You are rewarded for your wisdom.";
    }
    /**
     * @param int probability (1-100)
     * @return true if creature perceives the thing, false otherwise
     */
    public function perception($probability){
        return rand(1, 100) <= $probability;
    }
}
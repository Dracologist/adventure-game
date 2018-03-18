<?php
/**
 * Created by PhpStorm.
 * User: ejcka
 * Date: 3/17/2018
 * Time: 4:33 PM
 */

class BearCub extends Bear
{
    /**
     * @return string attack message
     */
    public function attack()
    {
        return "<p>The little bear's claws rake across your leg.</p>";
    }

    /**
     * @param Bear $mother
     * @return string message
     */
    public function callMother($mother){
        $message = "<p>The little bear lets out a plaintive cry, calling for its mother.</p>";
        if($mother->perception(80)){
            $message .= "<p>The cry is answered by a deeper roar and a massive adult bear comes running to its side. ".
                "Its mother has come and she is not happy to see you.</p>";
        }
        else{
            $message .= "<p>But unfortunately, there is no answer. ".
                "Still, it's probably best to get out of here before the mother arrives</p>";
        }
        return $message;
    }
}
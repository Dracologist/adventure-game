<?php
/**
 * Created by PhpStorm.
 * User: ejcka
 * Date: 3/17/2018
 * Time: 11:20 AM
 */

/**
 * @return PDO $dbh
 */
function connect(){
    require '/home/ekanzler/connect.php';
    try {
        $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    return $dbh;
}

/**
 * @param Player $player
 * @param string $location
 */
function addPlayer($player, $location){
    $dbh = connect();
    $fname = &$player->getFname();
    $lname = &$player->getLname();
    $locref = &$location;
    $query = "INSERT INTO player(fname, lname, location)".
        " VALUES (:fname, :lname, :location)";
    $statement = $dbh->prepare($query);
    $statement->bindParam(":fname", $fname,
        PDO::PARAM_STR);
    $statement->bindParam(":lname", $lname,
        PDO::PARAM_STR);
    $statement->bindParam(":location", $locref,
        PDO::PARAM_STR);
    $statement->execute();
    return $dbh->lastInsertId();
}

/**
 * @param Player $player
 * @param string $location
 * @param int $id
 */
function updatePlayer($player, $location, $id){
    $dbh = connect();
    $fname = $player->getFname();
    $fnref = &$fname;

    $lname = $player->getLname();
    $lnref = &$lname;

    $score = $player->getScore();
    $scref = &$score;

    $deaths = $player->getDeaths();
    $deathref = &$deaths;

    $locref = &$location;

    $idref = &$id;

    $query = "UPDATE student SET fname = :fname, lname = :lname,".
        " score = :score, deaths = :deaths, location = :location".
    "WHERE id = :id";
    $statement = $dbh->prepare($query);
    $statement->bindParam(":fname", $fnref,
        PDO::PARAM_STR);
    $statement->bindParam(":lname", $lnref,
        PDO::PARAM_STR);
    $statement->bindParam(":location", $locref,
        PDO::PARAM_STR);
    $statement->bindParam(":score", $scref, PDO::PARAM_INT);
    $statement->bindParam(":deaths", $deathref, PDO::PARAM_INT);
    $statement->bindParam(":id", $idref, PDO::PARAM_INT);

}

/**
 * @param int $id
 * @return Player
 */
function loadPlayer($id){
    $idref = &$id;
    $dbh = connect();
    $sql = "SELECT * from student WHERE id = :id";
    $statement = $dbh->prepare($sql);
    $statement->bindParam(":id", $idref, PDO::PARAM_INT);
    try {
        $statement->execute();
        $info = $statement->fetch(PDO::FETCH_ASSOC);
        $fname = $info['fname'];
        $lname = $info['lname'];
        $score = $info['score'];
        $deaths = $info['score'];
        $player = new Player($fname, $lname);
        $player->setScore($score);
        $player->setDeaths($deaths);
        return $player;
    } catch (PDOException $e) {
        return false;
    }
}
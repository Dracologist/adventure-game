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
 * @return string
 */
function addPlayer($player, $location){
    $dbh = connect();
    $fname = $player->getFname();
    $lname = $player->getLname();

    $query = "INSERT INTO player (fname, lname, location) VALUES (:fname, :lname, :location)";

    $statement = $dbh->prepare($query);
    $statement->bindParam(":fname", $fname,
        PDO::PARAM_STR);
    $statement->bindParam(":lname", $lname,
        PDO::PARAM_STR);
    $statement->bindParam(":location", $location,
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
    $lname = $player->getLname();
    $score = $player->getScore();
    $deaths = $player->getDeaths();

    $query = "UPDATE player 
              SET fname = :fname, lname = :lname, score = :score, deaths = :deaths, location = :location 
              WHERE id = :id";
    $statement = $dbh->prepare($query);
    $statement->bindParam(":fname", $fname,
        PDO::PARAM_STR);
    $statement->bindParam(":lname", $lname,
        PDO::PARAM_STR);
    $statement->bindParam(":location", $location,
        PDO::PARAM_STR);
    $statement->bindParam(":score", $score, PDO::PARAM_INT);
    $statement->bindParam(":deaths", $deaths, PDO::PARAM_INT);
    $statement->bindParam(":id", $id, PDO::PARAM_INT);
    $statement->execute();
}

/**
 * @param int $id
 * @return mixed
 */
function loadPlayer($id){
    $dbh = connect();
    $sql = "SELECT * FROM player WHERE id = :id";
    $statement = $dbh->prepare($sql);
    $statement->bindParam(":id", $id, PDO::PARAM_INT);
    try {
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return $e;
    }
}
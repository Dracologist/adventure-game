<?php
require_once('vendor/autoload.php');

session_start();
session_save_path("/tmp/cache");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>

<?php
$f3 = Base::instance();
$f3->set('DEBUG',3);
$f3->set('CACHE', true);
$f3->set('cub', new BearCub);
$f3->set('mother', new Bear);
new Session();
$f3->route('GET|POST /quit', function($f3) {
    if($f3->exists('SESSION.player')) {
        echo "<h1>Your game id is " . $f3->get('SESSION.playerid') . "</h1>";
        echo "<br>";
        echo "<p>Save this number if you want to be able to continue playing later.</p>";
        updatePlayer($f3->get('SESSION.player'), $f3->get('SESSION.location'),
            $f3->get('SESSION.playerid'));
    } else {
        echo "<p>Leaving so soon?</p>";
    }
    echo "<a href='/328/adventure-game' class='btn btn-primary btn-lg'>Home</a>";
    session_destroy();
});

$f3->route('GET|POST /', function($f3) {
    $view = new View;
    $f3->set('SESSION.location', 'entryway');
    echo $view->render('views/home.html');
});
$f3->route('GET|POST /submit-character', function($f3) {
    $template = new Template;
    if(!$f3->exists('SESSION.location')){
        $page = 'views/timeout.html';
    }
    else {
        $feedback['fname'] = validName($_POST['fname']);
        $feedback['lname'] = validName($_POST['lname']);
        if ($feedback['fname'] != "Name is valid" || !validName($_POST['lname'])) {
            if ($feedback['fname'] != "Name is valid"){
                $f3->set('fnerror', $feedback['fname']);
            }
            if ($feedback['lname'] != "Name is valid"){
                $f3->set('lnerror', $feedback['lname']);
            }
        } else {
            $player = $f3->get('SESSION.player');
            if ($player == null) {
                $player = new Player($_POST['fname'], $_POST['lname']);
                $f3->set('SESSION.playerid', addPlayer($player,
                    $f3->get('SESSION.location')));
            } else {
                $player->setFname($_POST['fname']);
                $player->setLname($_POST['lname']);
                updatePlayer($f3->get('SESSION.player'), $f3->get('SESSION.location'),
                    $f3->get('SESSION.playerid'));
            }
        }
        $f3->set('SESSION.player', $player);
        $page = 'views/view-character.html';
    }
    echo $template->render($page);
});

$f3->route('GET /@location', function($f3) {
    $template = new Template;
    $location = $f3->get('PARAMS.location');
    $page = 'views/' . $location . '.html';
    if($location != "character-form" && $location != "load-character") {
        $f3->set('SESSION.location', $f3->get('PARAMS.location'));
    }
    if($f3->get('SESSION.player') != null) {
        updatePlayer($f3->get('SESSION.player'), $f3->get('SESSION.location'),
            $f3->get('SESSION.playerid'));
    }
    echo $template->render($page);
});

$f3->route('GET|POST /continue', function ($f3){
    $template = new Template;
    $id = $_POST['player-id'];
    $load = loadPlayer($id);
    if(is_array($load)) {
        $player = new Player($load['fname'], $load['lname']);
        $f3->set('SESSION.player', $player);
        $f3->set('SESSION.location', $load['location']);
        $f3->set('SESSION.playerid', $id);
        $page = "views/view-character.html";
    } else {
        if($load != false) {
            $f3->set("iderror", "Database Error " . $load->getMessage());
        }
        else{
            $f3->set("iderror", "Invalid ID!");
        }
        $page = "views/load-character.html";
    }
    echo $template->render($page);
});

$f3->run();
?>

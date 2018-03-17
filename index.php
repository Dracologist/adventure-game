<?php
require_once('vendor/autoload.php');
require ('database/db-functions.php');

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
new Session();

$f3->route('GET|POST /quit', function($f3) {

    session_destroy();
    echo "All Cleared!";
});

$f3->route('GET|POST /', function($f3) {
    $view = new View;
    $f3->set('SESSION.location', 'entryway');
    echo $view->render('views/home.html');
});
$f3->route('POST /submit-character', function($f3) {
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
            $page = 'views/character-form.html';
        } else {
            if (!$f3->exists('SESSION.player')) {
                $player = new Player($_POST['fname'], $_POST['lname']);
            } else {
                $player = $f3->get('SESSION.player');
                $player->setFname($_POST['fname']);
                $player->setLname($_POST['lname']);
                $f3->set('SESSION.playerid', addPlayer($f3->get('SESSION.player'),
                    $f3->get('SESSION.location')));
            }
            $f3->set('SESSION.player', $player);
            $page = 'views/view-character.html';
        }
    }
    echo $template->render($page);
});

$f3->route('GET|POST /@location', function($f3) {
    $template = new Template;
    $page = 'views/' . $f3->get('PARAMS.location') . '.html';
    if($page != "views/character-form.html") {
        $f3->set('SESSION.location', $f3->get('PARAMS.location'));
    }
    echo $template->render($page);
});

$f3->route('GET /continue', function (){
    $template = new Template;
    $template->render("views/load-character.html");
});

$f3->route('POST /continue', function ($f3){
    $template = new Template;
    $id = $_POST['player-id'];
    $load = loadPlayer($id);
    if($load != false) {
        $f3->set('SESSION.player', $load);
        $f3->set('SESSION.playerid', $id);
        $page = "views/view-character.html";
    } else {
        $f3->set("iderror", "Invalid ID!");
        $page = "views/load-character.html";
    }
    $template->render($page);
});

$f3->run();
?>

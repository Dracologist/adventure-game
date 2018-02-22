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
new Session();

$f3->route('GET|POST /character/create', function($f3) {
    $template = new Template;
    echo $template->render('views/character.html');
});

$f3->route('GET|POST /reset', function($f3) {
    session_destroy();
    echo "All Cleared!";
});

$f3->route('GET|POST /character/edit', function($f3) {
    $template = new Template;
    echo $template->render('views/character.html');
});
$f3->route('GET|POST /', function($f3) {
    $view = new View;
    $f3->set('SESSION.nextPage', 'views/entrance.html');
    echo $view->render('views/home.html');
});
$f3->route('GET|POST /character/submit', function($f3) {
    $template = new Template;
    if(!$f3->exists('SESSION.nextPage')){
        $f3->set('SESSION.nextPage','views/timeout.html');
    }
    elseif(isset($_POST['submit'])) {
        if (!validName($_POST['fname']) || !validName($_POST['lname'])) {
            $f3->set('SESSION.nextPage','views/character.html');
        } else {
            if (!$f3->exists('SESSION.player')) {
                $player = new Player($_POST['fname'], $_POST['lname']);
                $player->awardPoints(10);
            } else {
                $player = $f3->get('SESSION.player');
                $player->setFname($_POST['fname']);
                $player->setLname($_POST['lname']);
            }
            $f3->set('SESSION.player', $player);
        }
    }
    echo $template->render($f3->get('SESSION.nextPage'));
});

$f3->run();
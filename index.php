<?php session_start(); ?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<?php
    require_once('vendor/autoload.php');
    $f3 = Base::instance();

    $f3->set('CACHE', true);
    new Session();

    $f3->route('GET /', function() {
        $view = new View;
        echo $view->render('views/home.html');
    });

    $f3->route('GET|POST /character/create', function($f3) {
        $template = new Template;
        $f3->set('SESSION.currentPage', 'views/entrance.html');
        echo $template->render('views/character.html');
    });

    $f3->route('POST /submit-character', function($f3) {
        $template = new Template;
        if(!$f3->exists('SESSION.currentPage')){
            $page = 'views/timeout.html';
        }
        else {
            $page = $f3->get(SESSION.currentPage);
        }
        if(!validName($_POST['fname']) || !validName($_POST['lname'])){
            $page = "views/character.html";
        }
        else {
            if(!$f3->exists('SESSION.player')){
                $player = new Player($_POST['fname'], $_POST['lname']);
            }
            else {
                $player = $f3->get('SESSION.player');
                $player->setFname($_POST['fname']);
                $player->setLname($_POST['lname']);
            }
            $f3->set('SESSION.player', $player);
        }
        echo $template->render($page);
    });

    $f3->run();
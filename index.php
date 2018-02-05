<?php
/**
 * Created by PhpStorm.
 * Users: Elizabeth Kanzler and Jarod Bose
 * Date: 2/5/2018
 * Time: 11:39 AM
 */

<?php
    require_once('vendor/autoload.php');
    $f3 = Base::instance();
    $f3->route('GET /', function() {
        $view = new View;
        echo $view->render
        ('views/home.html');
    });

    $f3->run();
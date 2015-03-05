<?php

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../src/places.php";

session_start();
if (empty($_SESSION["places"])) {
    $_SESSION["places"] = array();
}

$app = new Silex\Application();
$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path'=>__DIR__.'/../views'));


$app->get("/", function() use ($app){
    return $app['twig']->render('home.twig', array('places'=>Places::getAllPlaces()));

});

$app->post("/mary", function() use($app){
    $place_lived = new Places($_POST['city'], $_POST['state'], $_POST['cow']);
    $place_lived->save();
    return $app['twig']->render('places_list.twig', array('new_location'=> $place_lived));

});

$app->post("/delete", function(){
    Places::deleteAll();
    return $app['twig']->render('delete.twig');

});

return $app;
?>

<?php

require '../libs/vendor/autoload.php';
require '../include/util/Helper.php';

$app = new Slim\App();

$message = array();

$app->post('/hello/{name}', function ($request, $response, $args) {
    $name = $args['name'];
    $message = "Hello, " . $name . "!";
    return $response->write($message);
});

$app->post('/conncheck', function ($request, $response, $args) {
    require_once '../include/db/DbConnect.php';
    $db = new DbConnect();
    $conn = $db->connect();
    if ($conn != null) {
        $message = "Database connection established successfully";
        return $response->write($message);
    }
});

$app->run();

?>
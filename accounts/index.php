<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use \Accounts\GamificationAccount;

require 'vendor/autoload.php';

//$app = new \Slim\App;
//$app->get('/getAccountBalance/{id}', function (Request $request, Response $response, array $args) {
//    $id = $args["id"];
//    $response->getBody()->write("Hello, $name");
//
//    return $response;
//});
//$app->run();


$app = new \Slim\App();
$app->post('/account/new/{email}', function ($request, $response, $args) {
    $account = new GamificationAccount(
        $args["email"],
        ""
    );

    $accountArray = [
        "id" => $account->getId(),
        "e-mail" => $account->getEMail(),
        "description" => $account->getDescription(),
        "point-balance" => $account->getPointBalance(),
        "status" => $account->isStatus(),
    ];

    file_put_contents("account_data/account_" . $account->getId(),
        json_encode($accountArray));

    echo "New account with e-mail " . $account->getEMail() . " has been added.";

    return $response;
});


try {
    $app->run();
} catch (Exception $e) {
    echo "Slim exception: " . $e->getMessage();
}


<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 3/21/18
 * Time: 7:16 PM
 */

require_once __DIR__ .  "/../vendor/autoload.php";

//use Money\Money;
use Products\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

$test = new Product(12, "test", 776);

$app->post('/products', function (Request $request) use($app) {
    $product = new Product(
        $request->get("id"),
        $request->get("name"),
        $request->get("price")
    );

    $returnArray = array(
        'id' => $product->getId(),
        'name' => $product->getName(),
        'price' => $product->getPrice()
    );

    file_put_contents("nazwaPliku.txt", json_encode($returnArray));

    return new Response("Dodano nowy produkt:\n" . json_encode($returnArray), 200);
});




$app->run();

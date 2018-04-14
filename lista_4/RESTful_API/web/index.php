<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 3/23/18
 * Time: 12:04 AM
 */


require_once __DIR__ .  "/../vendor/autoload.php";
use Money\Money;
use Products\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$app = new Silex\Application();
$app['debug'] = true;


/*
 * Adds a product with given 'name', 'amount' and 'currency' to data directory in json
 */
$app->post('/products', function (Request $request) use($app) {
    $id = time() . rand(1000, 9999);

    $product = new Product(
        $id,
        $request->get("name"),
        new Money(
            $request->get('amount'),
            new \Money\Currency($request->get('currency'))
        )
    );

    $returnArray = array(
        'id' => $product->getId(),
        'name' => $product->getName(),
        'price' => $product->getPrice()
    );

    file_put_contents("data/" . $returnArray['id'] . ".txt", json_encode($returnArray));

    return new Response("A new product with id:" . $id . " has been added.\n" . json_encode($returnArray), 200);
});

/*
 * Overrides product at given id or adds a new if there's no file with given id
 */
$app->put('/data/{id}', function (Request $request) use ($app) {

    $product = new Product(
        $request->get("id"),
        $request->get("name"),
        new Money(
            $request->get("amount"),
            new \Money\Currency($request->get("currency"))
        )
    );

    $puttedArray = array(
        'id' => $product->getId(),
        'name' => $product->getName(),
        'price' => $product->getPrice()
    );

    file_put_contents("data/" . $puttedArray['id'] . ".txt", json_encode($puttedArray));

    return new Response("Product with id: " . $puttedArray['id'] . " has been changed.\nnew value: " . json_encode($puttedArray), 200);
});

/*
 * Gets all the products in /data directory
 */
$app->get('/data', function () use ($app) {

    $Products = scandir(__DIR__ . "/../data/");
    $Products = array_diff($Products, array(".", ".."));
    $output = "";

    foreach($Products as $item) {
        $output .= file_get_contents(__DIR__ . "/../data/" . $item) . "<br>";
    }
    return $output;

});

/*
 * Gets a product with given id
 */
$app->get('/data/{id}', function ($id) use ($app) {

    $requestedProduct = file_get_contents(__DIR__ . "/../data/" . $id . ".txt");

    return $requestedProduct;
});

/*
 * Deletes a product with given id
 */
$app->delete('/products/{id}', function ($id) use ($app) {

    if(!file_exists(__DIR__ . "data/" . $id)) {
        echo "Product with id: $id does not exist!";
        $app->abort(404, "File with id: $id does not exist.");
    }
    unlink(__DIR__ . "/../data/" . $id . ".txt");
    return new Response("File with id: $id has been deleted.", 200);
});


$app->run();

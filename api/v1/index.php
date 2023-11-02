<?php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

/* put = update
    post = Insert
    get = select
    delete = delete
*/

$app = new \Slim\Slim(); /*creating a new instance of slim*/

$app->get('/getHello', 'getHello'); /* if a user types in /getHello, it will run a function called getHello*/
$app->run();

function getHello()
{
    echo "Hello World";
}

?>

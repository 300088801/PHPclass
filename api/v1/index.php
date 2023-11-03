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
$app->get('/showMember/:MemberName','showMember');
$app->post('/addMember/:MemberName', 'addMember');
$app->post('/addJson', 'addJson');
$app->delete('/delUser:userID', 'delUser');

$app->get('/get_races', 'get_races');
$app->get('/get_runners/:race_id','get_runners');
$app->post('/add_runner','add_runner');
$app->delete('/delete_runner','delete_runner');
$app->put('/update_runner','update_runner');
$app->run();

function getHello()
{
    echo "Hello World";
}
function showMember($MemberName)
{
    echo "Hello $MemberName";
}
function addMember($MemberName)
{
    echo "Welcome $MemberName";
}

function addJson()
{
    $request = \Slim\Slim::getInstance()->request();
    $post_json = json_decode($request->getBody(), TRUE);
    echo $post_json["fname"];
}

function delUser($userID)
{
    echo "User $userID was Deleted";
}

function get_races()
{
    echo "Getting Races:";
}
function get_runners($raceID)
{
    echo "The runners for race " . $raceID . " are : ";
}
function add_runner()
{
    $request = \Slim\Slim::getInstance()->request();
    $post_json = json_decode($request->getBody(), TRUE);
    echo "Runner has been added. Runner info: " . $post_json["fname"] . " " . $post_json["lname"] . " " . $post_json["age"] . " " . $post_json["runnerID"];

}
function delete_runner()
{
    $request = \Slim\Slim::getInstance()->request();
    $post_json = json_decode($request->getBody(), TRUE);
    echo $post_json["fname"] . " " . $post_json["lname"] . " has been deleted from the runners list";

}
function update_runner()
{
    $request = \Slim\Slim::getInstance()->request();
    $post_json = json_decode($request->getBody(), TRUE);
    echo $post_json["fname"] . " " . $post_json["lname"] . "'s profile has been updated";
}

?>

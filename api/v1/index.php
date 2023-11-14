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
    include '../../Includes/dbConn.php';


        try{
            $db = new PDO($dsn, $username, $password, $options); // trying to connect using PDO

            $sql = $db->prepare("select * from race");
            $sql->execute(); //database gets records and retrieve it into our sql
            $results = $sql->fetchAll(); // grabs the first row
            echo '{"Races":'. json_encode($results) .'}';
            $results = null;
            $db = null;
        }catch(PDOException $e){
            $error = $e->getMessage();
            echo  json_encode($error);
        }
}
function get_runners($raceID)
{
    include '../../Includes/dbConn.php';


    try {
        $db = new PDO($dsn, $username, $password, $options); // trying to connect using PDO
        $sql = $db->prepare("SELECT DISTINCT memberLogin.memberName, memberLogin.memberEmail FROM memberLogin INNER JOIN member_race ON memberLogin.memberID = member_race.memberID WHERE member_race.raceID = :raceID");
        $sql->bindValue(":raceID", $raceID);
        $sql->execute(); //database gets records and retrieve it into our sql
        $results = $sql->fetchAll(); // grabs the first row
        echo '{"Runners":' . json_encode($results) . '}';
        $results = null;
        $db = null;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo json_encode($error);
    }
}
function add_runner()
{

    $request = \Slim\Slim::getInstance()->request();
    $post_json = json_decode($request->getBody(), TRUE);
    $memberID= $post_json["memberID"];
    $raceID= $post_json["raceID"];
    $memberKey= $post_json["memberKey"];

    include '../../Includes/dbConn.php';


    try {
        $db = new PDO($dsn, $username, $password, $options); // trying to connect using PDO
        $sql = $db->prepare("SELECT member_race.raceID from member_race INNER JOIN memberLogin ON member_race.memberID = memberLogin.memberID where member_race.raceID = 2 AND memberLogin.memberKey = :APIKey");
        $sql->bindValue(":APIKey", $memberKey);
        $sql->execute(); //database gets records and retrieve it into our sql
        $results = $sql->fetch(); // grabs the first row
        if($results==null)
        {
            echo "Bad API Key";
        }
        else{
            $sql = $db->prepare("Insert into member_race(memberID,raceID,RoleID) values (:memberID, :raceID,3)");
            $sql->bindValue(":memberID", $memberID);
            $sql->bindValue(":raceID", $raceID);
            $sql->execute();
            echo "Good Key";
        }
        $results = null;
        $db = null;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo json_encode($error);
    }
}


function delete_runner()
{
    $request = \Slim\Slim::getInstance()->request();
    $post_json = json_decode($request->getBody(), TRUE);
    $memberID= $post_json["memberID"];
    $raceID= $post_json["raceID"];
    //$RoleID = $post_json["RoleID"];
    $memberKey= $post_json["memberKey"];

    include '../../Includes/dbConn.php';


    try {
        $db = new PDO($dsn, $username, $password, $options); // trying to connect using PDO
        $sql = $db->prepare("SELECT member_race.raceID from member_race INNER JOIN memberLogin ON member_race.memberID = memberLogin.memberID where member_race.raceID = 2 AND memberLogin.memberKey = :APIKey");
        $sql->bindValue(":APIKey", $memberKey);
        $sql->execute(); //database gets records and retrieve it into our sql
        $results = $sql->fetch(); // grabs the first row
        if($results==null)
        {
            echo "Bad API Key";
        }
        else{
            $sql = $db->prepare("delete from member_race where memberID = :memberID and raceID = :raceID and RoleID=3 ");
            $sql->bindValue(":memberID", $memberID);
            $sql->bindValue(":raceID", $raceID);
            $sql->execute();
            echo "Good Key";
        }
        $results = null;
        $db = null;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo json_encode($error);
    }
}

?>

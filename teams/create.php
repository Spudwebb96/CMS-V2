<?php

require_once 'db.php';
require_once 'teams.php';

if (isset($_POST["create"])){
    $inst = new DB();
    team::create($inst, $_POST['teams'], $_POST['city'], $_POST['state'],
    $_POST['wins'], $_POST['loses'], $_POST['stadium'] );

    echo "The " . $_POST['teams'] . " have been added to the database.";
}

?>

<form action="create.php" method="post" target="_self">
    <input type="hidden" name="create" value="true">
    <input type="text" name="teams" value="Bulls">    
    <input type="text" name="city" value="Chicago">
    <input type="text" name="state" value="Illinois">
    <input type="number" step="0.01" name="wins" value="82">
    <input type="number" step="0.01" name="loses" value="0">
    <input type="text" name="stadium" value="United Center">
    <button>XXX</button>
</form>
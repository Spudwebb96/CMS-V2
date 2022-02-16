<?php

class DB 
{
    public $db;

    public function __construct(){

        $this->db = new PDO('mysql:host=localhost;port=3306;dbname=bball;', 'root', '');
    } 
    
}
?>

<!-- factorize both classes and apply to stuff.php 
make class for table -> updates, fetch -->

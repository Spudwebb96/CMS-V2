<?php
require_once './players/db.php';

class Team
{
    private string $id;
    private string $teams;
    private string $city;
    private string $state;
    private string $wins;
    private string $loses;
    private string $stadium;
    private $db;

    private function __construct($db)
    {
        $this->db = $db;
    }

    public static function create($db, $teams, $city, $state, $wins, $loses, $stadium){
        $sql = "INSERT INTO team (teams,city,state,wins,loses,stadium
        VALUES (:teams,:city,:state,:wins,:loses,:stadium)";
        $stmt = $db->db->prepare($sql);

        $stmt->bindParam(':teams', $teams, \PDO::PARAM_STR);
        $stmt->bindParam(':city', $city, \PDO::PARAM_STR);
        $stmt->bindParam(':state', $state, \PDO::PARAM_STR);
        $stmt->bindParam(':wins', $wins, \PDO::PARAM_INT);
        $stmt->bindParam(':loses', $loses, \PDO::PARAM_INT);
        $stmt->bindParam(':stadium', $stadium, \PDO::PARAM_STR);

        $stmt->execute();

        $id = $db->db->lastInsertId();

        $team = new Team($db);
        $team->setteams($teams);
        $team->setcity($city);
        $team->setstate($state);
        $team->setwins($wins);
        $team->setloses($loses);
        $team->setstadium($stadium);
        $team->setid($id);
  
        return $team;
    }

    public function getteams(): string
    {
        return $this->teams;
    }

    public function setteams(string $teams): void
    {
        $this->teams = $teams;
    }

    public function getcity(): string
    {
        return $this->city;
    }

    public function setcity(string $city): void
    {
        $this->city = $city;
    }

    public function getstate(): string
    {
        return $this->state;
    }

    public function setstate(string $state): void
    {
        $this->state = $state;
    }

    public function getwins(): string
    {
        return $this->wins;
    }

    public function setwins(string $wins): void
    {
        $this->wins = $wins;
    }

    public function getloses(): string
    {
        return $this->loses;
    }

    public function setloses(string $loses): void
    {
        $this->loses = $loses;
    }

    public function getstadium(): string
    {
        return $this->stadium;
    }

    public function setstadium(string $stadium): void
    {
        $this->stadium = $stadium;
    }

    public function getid(): string
    {
        return $this->id;
    }

    public function setid(string $id): void
    {
        $this->id = $id;
    }
}
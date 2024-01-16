<?php
class Database{
    private static $dbName = "vuokraamo"; //tietokannan nimi
    private static $dbHost = "localhost"; //palvelimen osoite
    private static $dbUsername= "user"; //käyttäjätunnus
    private static $dbUserPassword = "sskky1234"; //käyttäjän salasana

    private static $cont = null;

    public function __construct() {
        die("init function is not allowed");
    }
    public static function connect(){
        if(null == self::$cont){
            try{ //luodaan yhteys pdo rajapinnan kautta
                self::$cont = new PDO("mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }
        return self::$cont;
    }
    public static function disconnect(){
        self::$cont = null;
    }
}
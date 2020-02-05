<?php
class DBase{
    
    private static $hostname="localhost";
    private static $dbname="tuarbitro";
    private static $username="root";
    private static $password="";

    public static function Conect(){
    return new PDO("mysql:host=".self::$hostname.";dbname=".self::$dbname."",self::$username,self::$password);
    }
    
    
}	
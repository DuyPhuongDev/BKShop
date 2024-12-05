<?php
class DB
{
    public static $instance = NULL;
    public static function getInstance() 
    {
        if (!isset(self::$instance)) 
        {
            self::$instance = mysqli_connect("localhost", "root", "root", "assignWeb");
            if (mysqli_connect_error())
            {
                die("Failed to connect to MySQL: " . mysqli_connect_error());
            }
        }
        return self::$instance;
    }
}
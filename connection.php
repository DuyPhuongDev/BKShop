<?php
// class DB
// {
//     public static $instance = NULL;
//     public static function getInstance() 
//     {
//         if (!isset(self::$instance)) 
//         {
//             self::$instance = mysqli_connect("mysql", "root", "root", "assignWeb");
//             if (mysqli_connect_error())
//             {
//                 die("Failed to connect to MySQL: " . mysqli_connect_error());
//             }
//         }
//         return self::$instance;
//     }
// }
class DB
{
    public static $instance = NULL;

    public static function getInstance() 
    {
        if (!isset(self::$instance)) 
        {
            $retries = 5;
            while ($retries > 0) {
                self::$instance = mysqli_connect("mysql", "root", "root", "assignWeb");
                
                if (self::$instance) {
                    return self::$instance;
                }

                // Wait and retry
                $retries--;
                sleep(2); // Wait for 2 seconds before retrying
            }

            // If connection fails after retries
            die("Failed to connect to MySQL: " . mysqli_connect_error());
        }
        return self::$instance;
    }
}
?>
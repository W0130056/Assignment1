<?php
$db = mysqli_connect("localhost", "root", "inet2005", "employees");

    function getConnection(){
        $db = mysqli_connect("localhost","root","inet2005","employees");
        if (!$db){
            die('Could not connect to the Employees Database: ' . mysqli_error($dbConn));
        }
        return $db;
    }//end getConnection()

function dbClose()
{
    global $db;
    mysqli_close($db);
}
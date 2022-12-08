<?php
    function OpenConn(){
        $dbhost ="localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "portaldb";
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
        if(!$conn){
            die("Failed to connect". $conn->error);
        } else {
            return $conn;
        }
    }
    function CloseConn($conn){
        $conn->close();
    }
?>
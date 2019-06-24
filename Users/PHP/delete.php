<?php

    $intUserId = $_GET["id_user"];
    deleteUser($intUserId);
    echo $intUserId;
    
   ////////////////////////////////////////////////////////////////////////////////////////////////////
   
    function deleteUser($intUserId)
    {
        $servername = "localhost";
        $username = "praksa";
        $password = "datastation";
        $dbname = "prx_pavle";
       
        $connectMysqli = mysqli_connect("localhost",$username,$password,$dbname);
       
        $query = "DELETE FROM `table_users` WHERE `table_users`.`id` =$intUserId";
        
        mysqli_query($connectMysqli,$query);
    }
?>

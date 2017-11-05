
<?php
$intUserId = $_GET["id_user"];
	viewUser($intUserId);

function viewUser($intUserId)
    {
       
        $servername = "localhost";
        $username = "praksa";
        $password = "datastation";
        $dbname = "prx_pavle";
       
        $connectMysqli = mysqli_connect("localhost",$username,$password,$dbname);
           
            $query = "SELECT *
                      FROM  `table_users`
                      WHERE  `id` =".$intUserId."";
           
        if ($result = $connectMysqli->query($query))
        {
            $arrData = $result->fetch_assoc();
            $result->close();
        }

        echo json_encode($arrData);
    }
?>

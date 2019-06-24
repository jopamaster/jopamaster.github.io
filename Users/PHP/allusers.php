<?php

	allUsers();
   
    function allUsers()
    {
        $servername = "localhost";
        $username = "praksa";
        $password = "datastation";
        $dbname = "prx_pavle";
       
        $connectMysqli = mysqli_connect("localhost",$username,$password,$dbname);
       
        $query = "SELECT `id`, `first_name`, `last_name`, `e_mail`
                  FROM  `table_users`";
     
        if ($result = $connectMysqli->query($query))
        {
            while($row = $result->fetch_assoc()) 
            {
                $arrData[] = array(
                                        'id'         => $row["id"],
                                        'first_name' => $row["first_name"],
                                        'last_name'  => $row["last_name"],
                                        'e_mail'     => $row["e_mail"],
                                    );
            }
        }
        
        echo json_encode($arrData);

    }
?>

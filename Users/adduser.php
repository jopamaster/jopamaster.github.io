<?php

		$arrPostData = array(
							'first_name'        => $_POST["firstname"],
							'last_name'         => $_POST["lastname"],
							'e_mail'            => $_POST["email"],
							'birthday'          => $_POST["bday"],
							'city'              => $_POST["city"],
							'address'           => $_POST["address"],
							'phone_number'      => $_POST["tel"],
							'gender'            => $_POST["gender"],
							'country'           => $_POST["country"],
							
                        );
        
		$intLastInsertUser = insertUser($arrPostData); 
      	
      	// za proveru //
	//$arrData = viewUser(1);  
	//$strHtmlTable = viewUserTable($arrData);
	
	echo $strHtmlTable;
		
	if (isset($intLastInsertUser) && $intLastInsertUser > 0)
	{
		$arrData = viewUser($intLastInsertUser);
		$strHtmlTable = viewUserTable($arrData);
	
		echo $strHtmlTable;
	}
	else
	{
		echo "Something went wrong (First name, Last name, E-mail - required)";
	}
	
 
    
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    function insertUser($arrData)
    {
		try
		{
			$servername = "localhost";
			$username = "praksa";
			$password = "datastation";
			$dbname = "prx_pavle";

			$connectMysqli = mysqli_connect("localhost", $username, $password, $dbname);
			
			if (is_array($arrData) && count($arrData) > 0 && (isset($arrData['first_name']) && $arrData['first_name'] !='') && (isset($arrData['e_mail']) && $arrData['e_mail'] !='') && (isset($arrData['phone_number']) && $arrData['phone_number'] >0))
			{
				$sql = "INSERT INTO `table_users` (`first_name`, `last_name`, `e_mail`, `birthday`, `city`, `address`, `phone_number`, `gender`, `country`)
						VALUES ('". $arrData["first_name"] ."','". $arrData["last_name"] ."','". $arrData["e_mail"] ."','". $arrData["birthday"] ."','". $arrData["city"] ."','". $arrData["address"] ."','". $arrData["phone_number"] ."','". $arrData["gender"] ."','". $arrData["country"] ."')";
							
				mysqli_query($connectMysqli, $sql);
							
				$intLastInsertUser = $connectMysqli->insert_id;
				
				return $intLastInsertUser;
			}
			
			return false;
		   
		}
         
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////   

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

			return $arrData;
			

		}
	
	 //////////////////////////////////////////////////////////////////////////////////////////////////////////////   
	
	function viewUserTable($arrData)
	{
		$strHtmlTable = '<html>
			<head>		
			<title>Table</title>			
			<meta charset="UTF-8">			
			<link rel="stylesheet" type="text/css" href="adduser.css">
			<link rel="icon" type="image/png" href="icon.png"/>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>			
			<script src="adduser.js"></script>
			<script src="allusers.js"></script>
				<style>
				.button
				 {
				  margin-left:auto; 
				  margin-right:auto
				  color: #900;
				  background:white;
				  font-weight: bold;
				  border: 1px solid #900;
				   width:15%;
				   height:31px;
					 position:relative;
					top:88%;
				
				  }
				</style>		  
		  </head> 
		  <body>			 
			 <div class="wrapper">				
					<div class="banner">					
					<div class="banner-text">Added User</div>				
					</div>						
					<div class="form">							
							<table>
							<thead>
							<th></th>
							<th>Entered data</th>
							</thead>
							<tbody>
							<tr>
							<td> First Name </td>
							<td >'. $arrData['first_name']. '</td>
							</tr>
							<tr>
							<td> Last Name </td>
							<td >'. $arrData['last_name']. ' </td>
							</tr>
							<tr>
							<td> E-mail </td>
							<td > '. $arrData['e_mail']. ' </td>
							</tr>
							<tr>
							<td> Birthday </td>
							<td>'. $arrData['birthday']. ' </td>
							</tr>
							<tr>
							<td> City  </td>
							<td > '. $arrData['city']. '</td>
							</tr>
							<tr>
							<td> Address  </td>
							<td >'. $arrData['address']. ' </td>
							</tr>
							<tr>
							<td> Phone  </td>
							<td> '. $arrData['phone_number']. '</td>
							</tr>
							<tr>
							<td> Gender </td>
							<td> '. $arrData['gender']. '</td>
							</tr>
							<tr>
							<td> Country </td>
							<td>'. $arrData['country']. ' </td>
							</tr>
							</tbody>
							</table><button name="button" class="button" id="buttonreturnid" type="submit">Return</button>			
					</div>
					<div class="footer">					
					<div class="footer-text">© Pavle Jovanovic</div>
					</div>
					</div>
		</body>
		</html> ';
		
	return $strHtmlTable;

}

?>

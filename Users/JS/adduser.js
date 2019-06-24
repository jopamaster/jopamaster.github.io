

	function validate() 
	{
		
	var vfname = document.forms["form"]["firstname"].value;
	var vlname = document.forms["form"]["lastname"].value
	var vemail = document.forms["form"]["email"].value;
	var vtel = document.forms["form"]["tel"].value;

	var emailValid = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		
							
				if (vfname != '' && vemail != '' && vtel != '')
							 {
					if (vemail.match(emailValid)) 
					{
					if (document.getElementById("male").checked || document.getElementById("female").checked || document.getElementById("other").checked) 
					{
					if (vtel.length  >= 9) 
					{
					
					return true;
					} 
					
				
					else 
					{
					alert("Phone number must be at least 9 digits long!");
					return false;
					}
					} 
	
					else 
					{
					
					alert("You must select gender!");
					
					return false;
					}
					} 
					
					else 
					{
					alert("Invalid E-mail Address Format!!!");
					
					
					return false;
					}
					} 
					
					else 
					{
					alert("All fields are required!");
					return false;
					}
					
			
			}
							
							

		function checkNum()
			{
			  var vtel=document.forms["form"]["tel"].value;
			  if (isNaN(vtel)) 
			  {
				alert("Must input numbers");
				return false;
			  }
			}
				
			
	
	

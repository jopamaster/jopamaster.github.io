
 
 $(document).ready(function(){

	 $('#buttonreturnid').click(function()
		{
		  window.location.href='index.html';
		  return false;     
		})
	 
	 $('#buttonaddid').click(function()
		{
		  window.location.href='adduser.html';
		  return false;     
		})
        
         $('#buttonallid').click(function()
		{
		  window.location.href='allusers.html';
		  return false;     
		})
		
	      $(".table-container").hide();
		

        var strUsers= "";
        var strUsersUrl = "allusers.php";

  
      
            $.ajax({
                url: strUsersUrl,
                type: "POST", 
                dataType: "json", 
                success: function(objResponse)
                {  
                    strUsers += ' <table>\
                                            <tr>\
                                                <td><b>Name</b></td>\
                                                <td><b>E-mail</b></td>\
                                                <td><b>Delete</b></td>\
                                            </tr>';                                        
                    for (i in objResponse)
                    {        
                        strUsers += ' <tbody>  <tr class="st-row-table" id="row-' + objResponse[i].id + '"><td>' + objResponse[i].first_name + " " + objResponse[i].last_name +'  </td>\
                                        <td >' + objResponse[i].e_mail + ' </td>\
                                        <td><input type="button" id="' + objResponse[i].id + '"class="buttonDelete" value="Delete"></td></tr>';
                    }    
                    
                    strUsers += '<tbody> </table>';
                                        
                    console.log(strUsers);
                    
                },
                error: function()
                {
                    alert("error"); 
                },
                complete: function()
                {	 
                    $('.st-table-wrapper').html(strUsers);
                     $('.buttonDelete').click(function()
                    {
                        var idUser=$(this).attr('id');
                        
                        if(confirm('Are you sure?'))
                        {
                             deleteUser(idUser);
                        }
                    
                    
                    });
                    
                    $('.st-row-table').click(function()
                    {
                        var idRow = $(this).attr('id');
                        var userID = idRow.substring(4, idRow.length);
                        viewUser(userID);
                    });
                },
            });
  
    });
    
      function deleteUser(idUser)
        { 

            $.ajax
            ({
                url: 'delete.php?id_user='+idUser,
                success: function(id_user, status, jqXHR)
                {
                    alert('User has been deleted.');
                    $('#row-' + id_user).remove();
                },
                error: function()
                {
                    alert('ERROR');
                }
            }); 
  
		}
        
        
        
        
        function viewUser(idUser)
    { 
        var strViewUser= "";
        
        $.ajax
        ({
            url: 'view.php?id_user='+idUser,
            success: function(objResponse)
            {    
                var objView = JSON.parse(objResponse);

                strViewUser += '<table class="st-table-view">\
                                    <tbody>\
                                        <tr>\
                                            <td> First Name </td>\
                                            <td>'+ objView.first_name +'</td>\
                                        </tr>\
                                        <tr>\
                                            <td> Last Name  </td>\
                                            <td > '+ objView.last_name +' </td>\
                                        </tr>\
                                        <tr>\
                                            <td> E-mail </td>\
                                            <td>'+ objView.e_mail +'</td>\
                                        </tr>\
                                        <tr>\
                                            <td> Birthday </td>\
                                            <td> '+ objView.birthday +'</td>\
                                        </tr>\
                                        <tr>\
                                            <td> City  </td>\
                                            <td > '+ objView.city+'</td>\
                                        </tr>\
                                        <tr>\
                                            <td> Address  </td>\
                                            <td > '+ objView.address +'</td>\
                                        </tr>\
                                        <tr>\
                                            <td> Phone number  </td>\
                                            <td > '+ objView.phone_number +'</td>\
                                        </tr>\
                                        <tr>\
                                            <td> Gender  </td>\
                                            <td >'+ objView.gender +' </td>\
                                        </tr>\
                                                                                <tr>\
                                            <td> Country  </td>\
                                            <td >'+ objView.country +' </td>\
                                        </tr>\
                                   </tbody>\
                            </table>';                                        
                                
            },
            error: function()
            {
                alert('ERROR');
            },
            complete: function()
            {	
				$(".table-container").show();
                $('.st-table-view-user').html(strViewUser);
            }
        
            //
                //var intID = parseInt($('#row-' + idUser).attr('id').match(/\d+/));
            //
        }); 
    }
        
        
  

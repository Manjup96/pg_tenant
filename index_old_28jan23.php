<html lang="en" class="h-100">

    <head><body style="background-color:#D6DBDF;">
		<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>login form</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">  
 
          
 

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

        <?php
            include "./adminHeader.php";
          ?>
        </head>
<style>
p.two {
  border-style: solid;
  border-width: medium;
  border-radius:20px;
}

h1 {
  color: #7B241C;
}

</style>
 <?php

// $_SESSION["username"] = $_GET['username'];

?> 

    <body class="h-100">
    
    	
    	<div class="container h-60 ">
            <div class="row h-60 justify-content-center align-items-center"  >
                <div class="col-10 col-md-8 col-lg-6" style="  border-style: solid;border-width: 5px;border-radius: 25px;
                 padding: 20px; margin-top:50px;
                 box-shadow: 5px 10px #76D7C4;">
					<!-- Form  dashboard.php-->
                	<form id="form" class="form-example" >
                    <h1><center><div class="p-3 mb-2 bg- text-black" ><p class="two">PG Tenant Login Form</p></div></center></h1>
                		
                		<!-- Input fields -->
                		<div class="form-group">
                			<label for="username">Email Address:</label>
                			<input type="text" class="form-control username" id="username" placeholder="Email..." name="username">
                		</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control password" id="password" placeholder="Password..." name="password">
						</div>
						<center> <button type="submit" class="btn btn-dark btn-customized p-1">Login</button></center>
                		<!-- End input fields -->
                		
                	</form>
					<!-- Form end -->
                </div>
            </div>
        </div>
        <!-- <form name="in_form" action="" method="get">
  <input type="text" name="manager_name" id="manager_name" value="">
</form> -->


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

     $(document).ready(function(){  


var form=document.getElementById('form');

form.addEventListener('submit', function(e){
 e.preventDefault()

 var username=document.getElementById('username').value;
 var password=document.getElementById('password').value;
console.log(username,password);
// alert("Ok");
 fetch('https://iqbetspro.com/pg-management/Login-Tenant-API.php', {
  method: 'POST',
  body: JSON.stringify({
    tenant_email:username,
    password:password,

  }),
  headers: {
    'Content-type': 'application/json; charset=UTF-8',
  }
  })
  .then(function(response){ 
  return response.json()})
  .then(function(data)
  {console.log(typeof(data[0].Message));
    console.log(data[0].Message);
    
    if(data[0].Message.response =='error')
      {window.location = "index.php";
        alert("Failed to  log in, bad credentials ");
      }
    else
    {
      alert("Successfully logged in ");
        var username1 = data[0].Message.property_name; 
        dataString = 'username1='+ username1 ;
      // document.getElementById("manager_name").value=data[0].Message.property_name;
           $.ajax({
            url: 'set_session.php',
            Type: "GET",
            //data:{"cat_id" : cat_id, "cat_type":cat_type}
            data: dataString,  
            //cache: false,
            success: function(data) {
               
              
                   // $("#display_data").html(data);  
                     window.location = `dashboard.php`;  
            } 
        });
      }
      // window.location = "dashboard.php";}

}).catch(error => console.error('Error:', error)); 
});

});
</script>

    </body>

</html>
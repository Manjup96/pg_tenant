<?php

?>

<!DOCTYPE html>
<html lang="en" class="h-90">
<head>
<body style="background-color:#D6DBDF;">
  <title>Admin</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Bed form</title>

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

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>


       <?php
            include "./adminHeader.php";
            include "./sidebar.php";
           
            include_once "./config/dbconnect.php";
        ?>


</head>
<style>
p.two {
  border-style: solid;
  border-width: medium;
  border-radius:20px;
}

h1 {
  color: #B9770E;
} .btn {
  background-color: DodgerBlue;
  border: none;
  color: black;
  padding: 10px 25px;
  padding:0rem 1rem 1rem 1rem;
  cursor: pointer;
  font-size: 20px;
}

.form-group div
    {
      color: red;
      size: 80%
    }
    .hidden
    {
      display:none;
    }
</style>
		
    <body class="h-100">


    <a href="complaints_table.php"  > <div style="margin-left:910px">
<button style="font-size:24px"><i class="fa fa-close"></i></button></div></a>
    	<div class="container h-80 ">
            <div class="row h-90 justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6" style="  border-style: solid;border-width: 3px;
				border-radius: 20px;
                 padding: 20px;box-shadow: 5px 10px #76D7C4;">
					<!-- Form -->
                    <?php if(!empty($msg)){echo $msg; }?></p>
                    
                    <form id="complaint" class="form-example" action="" method="post" >
					<h1><center><div class="p-3 mb-2 bg- text-black" ><p class="two">complaint Form</p></div></center></h1>
                		
                		
                        <div class="form-group">
							          <label for="complaintType">Complaint Type :</label>
							          <input type="text" class="form-control complainType" id="complaintType" placeholder="" name="complainType">
                        
					          </div> 

                          <div class="form-group">
                            <label for="complaintDescription">Description</label>
                         </br>
                                 <!-- <textarea id="complaintDescription" name="complaintDescription" placeholder=""rows="3" cols="40" style="height:150px" style="width:150px"></textarea></div> -->
                                 <textarea id="complaintDescription" name="complaintDescription" placeholder="Write something.." style="height:200px"></textarea>
                                </br>

                          
						<center><button type="submit" class="btn btn-success btn-customized">Save</button>
                             </center>
						
                	</form>
					<!-- Form end -->
                </div>
            </div>
        </div>

        <script>
 var form=document.getElementById('complaint');

form.addEventListener('submit', function(e){
 e.preventDefault()
 var complaintType = document.getElementById("complaintType").value; 
     var complaintDescription = document.getElementById("complaintDescription").value; 
  
    
     console.log(complaintType,complaintDescription);
   
 fetch('https://iqbetspro.com/pg-management/complaints-POST-API.php', {
  method: 'POST',
  body: JSON.stringify(
    {
     
    "tenant_mobile":"8398391209",
    "complaint_type":complaintType,
      "created_date":new Date().toLocaleDateString()+' '+    new Date().toLocaleTimeString(),    
    "complaint_description":complaintDescription,
       "resolve_date":"",
    "comments":""

 }
  ),
  headers: {
    'Content-type': 'application/json; charset=UTF-8',
  }
  })
  .then(function(response){ 
  return response.json()})
  .then(function(data)
  {
    console.log(typeof(data[0].Message));
    //console.log(data[0].Message.response)
     //alert("ok");
    if(data[0].Message.response =='error')
    {  alert("complaint Registered failed");
      window.location = "complaints.php";}
    else
   { 
    alert("complaint Registered Succesfully");
    window.location = "complaints_table.php";}

}).catch(error => console.error('Error:', error)); 
});
</script>   
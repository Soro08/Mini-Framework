<?php 
session_start();

   require 'php/database.php';
   
   $db = Database::connect();

  if(isset($_POST['forminscription'])){
      
     
         
        $nom = checkInput($_POST['nom']);
        $prenom = checkInput($_POST['prenom']);
        $email = checkInput($_POST['email']);
      
        
        
                 

          $inser=$db->prepare("INSERT INTO users(nom,prenom,email) VALUES(?,?,?)");
          $result=$inser->execute(array($nom,$prenom,$email));
                  
          $Error = '<div class="alert alert-success">Votre compte a été crée avec success veillez vous voir la liste des inscrit  ici <a href="membre_inscrits.php">mon profil !!!!</div>';
                    
             
         
  }
    


 function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>





<!DOCTYPE html>

<html>
<head>
<title>Inscrition</title>    
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

   <link rel="stylesheet" type="text/css" href="public/css/style.css">
  <style type="text/css">
    body{
      background: black;
      background: url(public/img/bg4.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      height: 100vh;
    }
  </style>
    
</head>
<body>
        
  
    <div align="center">
        
        
      <div class="container h-100" style="padding-top: 20vh;">
      	<div class="d-flex justify-content-center">
      		<div class="card mt-5 col-md-4 animated bounceInDown myForm" style="background: transparent;">
      			<div>
      				<h4 style="color: #750711">FORMULAIRE INSCRIPTION</h4>
      			</div>
      			<div class="card-body">
      				<form method="POST">
                                  
                  <?php
                  
                 if(isset($Error)){
                      echo '<font color="red">'.$Error.'</font>';
                  }
                  
                  ?>
          				<div id="dynamic_container">

          						<div class="input-group">
                                      
          							<div class="input-group-prepend">
          								<span class="input-group-text br-15"><i class="fas fa-user-graduate"></i></span>
          							</div>
          							<input type="text"  name="nom" id="nom" placeholder="nom" class="form-control"  value=""/>
          						</div>
                                  
                                  
                      <div class="input-group mt-3">
          							<div class="input-group-prepend">
          								<span class="input-group-text br-15"><i class="fas fa-user-graduate"></i></span>
          							</div>
          							<input type="text" name="prenom" id="prenom" placeholder="prenom" class="form-control"/>
          						</div>
                                  
                      <div class="input-group mt-3">
          							<div class="input-group-prepend">
          								<span class="input-group-text br-15"><i class="fas fa-envelope"></i></span>
          							</div>
          							<input type="email" name="email" id="email" placeholder="Email" class="form-control"/>
          						</div>
                   

          			
                              
                              
                <div>
                  <br>
                   <input  type="submit" style="font-size: 20px;"  value="S'insrire"  name="forminscription" class="btn btn-success btn-sm float-center submit_btn"/>             
          			</div>

      				</form>
      			</div>
      			
      		</div>
      	</div>
      	
        
    </div>
    </div>
  </body>
  </html>
    

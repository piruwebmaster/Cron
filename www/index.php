<!DOCTYPE html>
<html>
<head>
	<title>:)</title>
	<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
	<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	

	<script type="text/javascript">
		
		
		$(document).ready(function(){

			borrar = function(correo){
			alert("borrando a "+ correo)
			console.log({e:correo});

			$.ajax({
  			method: "POST",
  			url: "borrar.php",
  			data: { e: correo }
			})
  			.done(function( msg ) {
    			alert("hecho");
    			window.location = '/'
  			});

  		}
			

			a = function(){window.location="/"}
			b = function(){alert("no se pudo realizar")}
			$("#f").on("submit",function(){
				alert("eviando");
				var value = $(this).serialize();
				if($("#p").value() && $("#e").value())
				$.ajax({
  				type: "POST",
				url: "/agregar.php",
				data: value,
				success: a,
				dataType: b
				});

			});

			});
	</script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Byron Ramos</a>
    </div>
   
  </div>
</nav>
<div class="container">
		<ul class="list-group">
		<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT correo lastname FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo '<li class="list-group-item"><span class="badge" onclick="borrar(\''.$row["lastname"].'\')"">X</span>'.$row["lastname"].' </li>';
       
    }

} 
$conn->close();
?>
  			
		</ul>
</div>

<div class="container">
		<h1>Registrar</h1>	
		<form role="form" id="f" method="POST" action="agregar.php">
  <div class="form-group" >
    <label for="email">Email address:</label>
    <input  name="e" type="email" class="form-control" id="e">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input name="p" type="password" class="form-control" id="p">
  </div>
  
  <button  id="r" type="submit" class="btn btn-default">Submit</button>
</form>
</div>



</body>
</html>
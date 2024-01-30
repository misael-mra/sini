<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Excluir Notificação</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Assets/css/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

<!-- The Modal1 -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Atenção</h4>
         
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			Nº de notificação inválida
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         
		  <a class="btn btn-danger btn-lg" href="excluir-notificacao-admin.php">
   Entendido
</a>
        </div>
        
      </div>
    </div>
  </div>
  
  
  <!-- The Modal2 -->
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Atenção</h4>
		 
         
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			Notificação removida com sucesso!
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         
		  <a class="btn btn-sucess btn-lg" href="excluir-notificacao-admin.php">
   Entendido
</a>
        </div>
        
      </div>
    </div>
  </div>
  

<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "sine");
  $numero_os = $_POST['oser'];
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt delete query execution
$sql = "DELETE FROM notificacoes WHERE contador='$numero_os'";
if(mysqli_query($link, $sql)){
	
	
	if ($total = mysqli_affected_rows($link)){
        
		echo '<script type="text/javascript"> $("#myModal2").modal("show")</script>';
	}
    else{
        
		echo '<script type="text/javascript"> $("#myModal").modal("show")</script>';

    
		
		
		
		
		//sleep(5);
		//header('location: http://www.google.com/');
	}
    //echo "<meta http-equiv='refresh' content='0;URL=Lista.php'>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>



</body>
</html>







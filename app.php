<?php 
session_start();
if(!isset($_SESSION['loggedIn'])){
	header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>title</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel ="stylesheet">
		<link href="css/styles.css" rel ="stylesheet">
	</head>
	<body>	
	 <!-- navbar-fixed-top lo deja en el scroll en static nomas cuando el scroll esta ahi-->
		<div class="navbar navbar-inverse navbar-static-top">
				<div class="container">
				
					<a href="#" class="navbar-brand"> Session Handler	 </a>
					<button class ="navbar-toggle" data-toggle="collapse" data-target = ".navHeaderCollapse" >
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
					</button>
					
					
					
					<div class= "collapse navbar-collapse navHeaderCollapse">
					
						<ul class="nav navbar-nav navbar-right">
						
						</ul>
					
					</div>
				
				</div>
		</div>
		
		<div class= "container">
		
			<div class="jumbotron text-center" id="jquery_jumbotron">
				<h1> Welcome</h1>
				<p>You are logged in.</p>
				<a href="session_manager.php" class="btn btn-info"> Logout <a/>
			</div>
		
		</div>
		
			
		
		<div class= "navbar navbar-default navbar-fixed-bottom">
			
			<div class="container">
				<p class="navbar-text pull-left"> Company name here</p>
				 
			</div>
			
		</div>
		
<div class="modal fade" id="sessionModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
                <h4><b>Inactivity Warning </b></h4>
            </div>
            <div class="modal-body">
                
                        <p>Your session is about to expire.
                        Please click Continue in the next <span id="modalTimer"></span> seconds to extend your session. </p>
                
            </div>
            <div class="modal-footer">
                    <input type="button" class="btn-standard pull-left" id="extendSession" value="Continue" data-dismiss="modal" style="margin-right:10px"></input>
					<input type="button" class="btn-standard" id="closeSession" value="Exit Session" data-dismiss="modal" ></input>
            </div>
        </div>
    </div>
</div>

		
		<script src = "http://code.jquery.com/jquery-1.10.2.min.js" ></script>
		<script src = "js/bootstrap.js" ></script>		
		<script src = "js/config.js" ></script>
		<script src = "js/handler.js" ></script>
		
	</body>
</html>
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
				<h1> Session Handler</h1>
				<p>Session Handler alllows you to detect inactivity in your web application.</p>
				<a href="session_manager.php?login=true" class="btn btn-info"> Login <a/>
			</div>
		
		</div>
		
			
		
		<div class= "navbar navbar-default navbar-fixed-bottom">
			
			<div class="container">
				<p class="navbar-text pull-left"> Company name here</p>
				 
			</div>
			
		</div>
		

		
		<script src = "http://code.jquery.com/jquery-1.10.2.min.js" ></script>
		<script src = "js/bootstrap.js" ></script>		
		<script src = "js/config.js" ></script>
	</body>
</html>
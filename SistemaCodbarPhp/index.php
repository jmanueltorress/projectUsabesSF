<?php session_start();?>
<html>
    <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>ACCESO SABES- BARCODE</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<style>
		body, html{
			margin: auto;
			background:#2f3542;
			background-image:url("barcode.jpg");
			/*background-repeat: no-repeat;
			background-size: cover;
			background-position: center center;
			background-attachment: fixed;
			height: 100%;   /* ges Hoehe der Seite -> weitere Hoehenangaben werden relativ hierzu ausgewertet */
			overflow: hidden;   /*  hide scrollbars */
		}
		</style>
    </head>
    <body>
       <div class="container" style="margin-top:5%"> 
		   <div class="wrapper">
            <div class="row">
				<div class="col-md-6">
				<canvas id="my_canvas"  width="520" height="510"  ></canvas>
				</div>
				<br>
				<br>
				<br>
				<br>
				
				<div class="col-md-6">
				<h3 style="color:#fff">REGISTRO DE USUARIOS AL PLANTEL</h3>
				</div>
                <div class="col-md-6">
				<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
					<a class="navbar-brand" href="#">Escáner de código de barras </a>
				</div>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="attendance.php"> <span class="glyphicon glyphicon-calendar"></span> Historial de Registros</a></li>
					</ul>
				</div>
				</nav>
				<form action="TimeInOut.php" method="post" class="form-horizontal" style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">
                     <i class="glyphicon glyphicon-barcode"></i> <label>ESCANEAR CÓDIGO DE BARRAS AQUÍ</label><p></p>
                    <input type="text" name="studentID" id="text" placeholder="scan barcode" class="form-control" autofocus>
					
                </form>
				 <div class="row">
						<div class="col-md-12">
						 <label style="color:#fff">Legend: </label>
							<label class="label label-primary">Tiempo en</label>
							<label class="label label-Success">Se acabó el tiempo</label>
							<label class="label label-danger">Número de identificación no encontrado</label>
						</div>
						</div>
						<br>
				<div class="row">	
					<div class="col-md-12">
					<?php
					if(isset($_SESSION['error'])){
					  echo "
						<div id='alert' class='alert alert-danger' style='background:#e34612;color:#fff;border:none'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-warning'></i> Error!</h4>
						  ".$_SESSION['error']."
						</div>
					  ";
					  unset($_SESSION['error']);
					}
					if(isset($_SESSION['success'])){
					  echo "
						<div id='alert' class='alert alert-success' style='background:#20bf6b;color:#fff;border:none'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-check'></i> Success!</h4>
						  ".$_SESSION['success']."
						</div>
					  ";
					  unset($_SESSION['success']);
					}
				  ?>
				  </div>
				  </div>
                </div>
            </div>			
        </div>	
		</div>			
       <?php require_once "scripts.php";?>
    </body>
</html>

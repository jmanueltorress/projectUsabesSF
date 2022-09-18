
<html>
    <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>ACCESO SABES | Asistencia</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<link rel="stylesheet" href="css/buttons.dataTables.min.css">
    </head>
    <body style="background:#eee">
        <nav class="navbar" style="background:#fff">
		  <div class="container-fluid">
			<div class="navbar-header">
			
			  <a class="navbar-brand" href="#">ACCESO SABES- BARCODE</a>
			</div>
			<ul class="nav navbar-nav">
			  <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>
			  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Mantenimiento <span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Estudiante</a></li>
				  <li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Nuevo Estudiante </a></li>
				  <li><a href="attendance.php"><span class="glyphicon glyphicon-calendar"></span> Asistencia</a></li>

				</ul>
			  </li>
			  <li><a href="#"><span class="glyphicon glyphicon-align-justify"></span> Reportes</a></li>
              <li><a href="index.php"><span class="glyphicon glyphicon-time"></span> Menú de Asistencia</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		  </div>
		</nav>
       <div class="container">
            <div class="row">
                <div class="col-md-12">
					<?php
					if(isset($_SESSION['error'])){
					  echo "
						<div class='alert alert-danger alert-dismissible' style='background:red;color:#fff'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-warning'></i> Error!</h4>
						  ".$_SESSION['error']."
						</div>
					  ";
					  unset($_SESSION['error']);
					}
					if(isset($_SESSION['success'])){
					  echo "
						<div class='alert alert-success alert-dismissible' style='background:green;color:#fff'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-check'></i> Success!</h4>
						  ".$_SESSION['success']."
						</div>
					  ";
					  unset($_SESSION['success']);
					}
				  ?>

                </div>
				
                <div class="col-md-12">
				<div style="border-radius: 5px;padding:10px;background:#fff;">
               <p>Resumen de asistencias</p>
			   <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
						<td>Nombre</td>
						<td>Matricula</td>
						<td>Hora de entrada</td>
						<td>Hora de salida</td>
						<td>Fecha de registro</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						require_once 'conn.php';
						$date = date('Y-m-d');
                        if($conn->connect_error){
                            die("Connection failed" .$conn->connect_error);
                        }
                           $sql ="SELECT * FROM attendance LEFT JOIN student ON attendance.STUDENTID=student.STUDENTID";
                           $query = $conn->query($sql);
                           while ($row = $query->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MNAME'];?></td>
                                <td><?php echo $row['STUDENTID'];?></td>
                                <td><?php echo $row['TIMEIN'];?></td>
                                <td><?php echo $row['TIMEOUT'];?></td>
                                <td><?php echo $row['LOGDATE'];?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                  </table>
				  
                </div>
				
                </div>
				
            </div>
						
        </div>
		<script>
			function Export()
			{
				var conf = confirm("Please confirm if you wish to proceed in exporting the attendance in to Excel File");
				if(conf == true)
				{
					window.open("export.php",'_blank');
				}
			}
		</script>				
    
		<script src="plugins/jquery/jquery.min.js"></script>
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

		<script src="js/dataTables.buttons.min.js"></script>
		<script src="js/jszip.min.js"></script>
		<script src="js/pdfmake.min.js"></script>
		<script src="js/vfs_fonts.js"></script>
		<script src="js/buttons.html5.min.js"></script>
		<script src="js/buttons.print.min.js"></script>	
		<script>
			$(document).ready(function() {
			$('#example1').DataTable( {
				dom: 'Bfrtip',
				buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print'
				]
			} );
		} );
		</script>
		
    </body>
</html>

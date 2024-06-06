<?php 


		if (function_exists('conectar')){

		} else {

		function conectar(){
		   
				//$connection = mysqli_connect("localhost", 'root', '', 'cl_water_sys');	

				$user = getenv('CLOUDSQL_USER');
				$pass = getenv('CLOUDSQL_PASSWORD');
				$inst = getenv('CLOUDSQL_DSN');
				$db = getenv('CLOUDSQL_DB');
				$connection = mysqli_connect(null, $user, $pass, $db, null, $inst);
			/*	$now = new DateTime();
				$mins = $now->getOffset() / 60;
				$sgn = ($mins < 0 ? -1 : 1);
				$mins = abs($mins);
				$hrs = floor($mins / 60);
				$mins -= $hrs * 60;
				$offset = sprintf('%+d:%02d', $hrs*$sgn, $mins);
				$connection->query("SET time_zone='$offset'");
			    $connection->query("SET lc_time_names = 'es_ES'"); */
				if (!$connection) {
						echo "Error Aibek!".mysqli_connect_error();
					}
				
				return $connection;
		}
		}

		
?>
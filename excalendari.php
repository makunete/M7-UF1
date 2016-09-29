<?php

# definim els valors inicials per al calendari

$mes=date("n");

$any=date("Y");

$diaActual=date("j");

 

# Obtenim el dia de la setmana del primer dia

# Retorna 0 per diumenge i 6 per dissabte

$diaSetmana=date("w",mktime(0,0,0,$mes,1,$any))+7;

# Obtenim l'ultim dia del mes

$ultimDiaMes=date("d",(mktime(0,0,0,$mes+1,1,$any)-1));

 

$mesos=array(1=>"Gener", "Febrer", "Març", "Abril", "Maig", "Juny", "Juliol","Agost", "Septembre", "Octubre", "Novembre", "Decembre");
?>

 

<!DOCTYPE html>

<html lang="es">

<head>

	<meta charset="utf-8">

	<style>

		#calendar {
			font-family:Arial;
			font-size:12px;

		}

		#calendar caption {

			text-align:left;
			padding:5px 10px;
			background-color:#fd3a3a;
			color:#fff;
			font-weight:bold;

		}

		#calendar th {

			background-color:#ff8c8c;
			color:#fff;
			width:40px;

		}

		#calendar td {

			padding:4px 10px;
			background-color:white;
			border: 1px solid black;

		}

		#calendar .hoy {

			background-color:red;

		}

	</style>

</head>

 

<body>


<table id="calendar">

	<caption><?php echo $mesos[$mes]." ".$any?></caption>

	<tr>
		<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th><th>Vie</th><th>Sab</th><th>Dom</th>
	</tr>

	<tr bgcolor="silver">

		<?php

		$ultimaCelda=$diaSetmana+$ultimDiaMes;

		// fem un bucle fins 42, que es el máxim de valors que pot haver... 6 columnes de 7 dies

		for($i=1;$i<=42;$i++){

			if($i==$diaSetmana){

				// posem en que dia comença

				$dia=1;
			}

			if($i<$diaSetmana || $i>=$ultimaCelda){

				//cel·la buida
				echo "<td>&nbsp;</td>";

			}else{

				// mostrem el dia
				if($dia==$diaActual)

					echo "<td class='hoy'>$dia</td>";

				else

					echo "<td>$dia</td>";

				$dia++;

			}

			// Quan arriba al final de la setmana, iniciems una columna nova

			if($i%7==0){

				echo "</tr><tr>\n";

			}

		}

	?>

	</tr>
</table>
</body>
</html>

<?php
/*EJERCICIO IMPORTAR ARCHIVOS CSV I
Para importar un archivo .csv de excel:
1.- Abrir el fichero en el modo deseado
2.- Mientras no lleguemos al final de fichero:
●Leer línea a línea con fgets():
●Eliminamos los saltos de linea del registro utilizando:
eregi_replace("[\n|\r|\n\r|\t]","" , $texto)
●convertimos la cadena de texto separada por comas en un array $fila de una fila y 'n' columnas utilizando la función explode(“,”, $registro)
●Este array lo guardamos en un segundo array que tendrá tantas filas como registros tenga el fichero:
array_push($registros, $fila)*/

/*SEGUNDA PARTE: EJERCICIO
Dado un fichero excel en formato .csv, importarlo en un array de php y, posteriormente, volcarlo en una tabla html*/

session_start();

$alumnos = [];
//convertir csv a array

//proteger lectura
if(file_exists('309_alumnos.csv')){
	//abrir archivo modo lectura
	$fichero = fopen('309_alumnos.csv', 'r');

	//primera lectura, descartar primera fila
	//fgets($fichero);

	//leer hasta el final
	while(!feof($fichero)){
	//lectura linea a linea
		$fila = fgets($fichero);

		//guarda fila en array 
		$alumno = explode(';', $fila);
		//print_r($alumno);
		//echo '<br>';

		//guardar alumno en array de alumnos
		array_push($alumnos, $alumno);
	}
	//print_r($alumnos);
	fclose($fichero);
	$_SESSION['alumnos'] = $alumnos;

	//guarda alumnos en tr alumno
	$tr_alumno = '';
	//foreach ($alumnos as $alumno) {
	foreach ($alumnos as $indiceFila => $alumno) {
		$tr_alumno.="<tr>";
		$td='';
		foreach ($alumno as $indiceCol => $dato) {
			if($indiceFila == 0){
				$td.="<th>$dato</th>";
			}else{
				$td.="<td>$dato</td>";
			}
		}
		
		$tr_alumno.=$td;
		$td='';
		$tr_alumno.="</tr>";
		
		
		
	}


		
}

	

?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>CSV</title>
	<meta charset="utf-8">
	<style type="text/css">
		table, td, th {border: 1px solid grey; padding: 5px};
	</style>
</head>
<body>
	<table>
		
		<?=$tr_alumno?>
		

	</table>
</body>
</html>
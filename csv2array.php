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


?>
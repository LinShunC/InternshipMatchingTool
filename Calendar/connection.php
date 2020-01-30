<?php
/* @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar e Bootstrap 4,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 * 
 * @author Pedro Ferraz
 * This work is based on the tutorial mentioned above, which I adapted to my idea
 * of using the fullCalendar and implement functionalities required in the
 * Internship Tool project
 */

//server
define('HOST', 'localhost');
//db user
define('USER', 'root');
//gets password
define('PASS', '');
//db name tests
//define('DBNAME', 'celke');

//db name internshipdatabase
define('DBINTERNSHIP', 'internshipdatabase');

//connection TEST
//$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);

//connection internshipdatabase
$conn2 = new PDO('mysql:host='.HOST.';dbname='.DBINTERNSHIP.';', USER, PASS);

?>

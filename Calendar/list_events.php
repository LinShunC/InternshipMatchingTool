<?php
/**
 * @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar e Bootstrap 4,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 * @author Pedro Ferraz
 * This work is based on the tutorial mentioned above, which I adapted to my idea
 * of using the fullCalendar and implement functionalities required in the
 * Internship Tool project
 */
include './connection.php';

//start internship data
//getting data
$query_events = "SELECT message_id, message_type, color, date, to_whom, content, remind_date, status FROM messages";
$result_events = $conn2->prepare($query_events);
$result_events->execute();

$events = [];
//reading data
while($row_events = $result_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['message_id'];
    $title = $row_events['message_type'];
    $color = $row_events['color'];
    $to_whom = $row_events['to_whom'];
    $content = $row_events['content'];
    $start = $row_events['date'];
    $remind_date = $row_events['remind_date'];
    $status = $row_events['status'];

    $events[] = [
        'id' => $id,
        'title' => $title,
        'color' => $color,
        'to_whom' => $to_whom,
        'content' => $content,
        'start' => $start,
        'remind_date' => $remind_date,
        'status' => $status
    ];
}
echo json_encode($events);

?>


<?php
//starting to use session
session_start();

//working with db, adding the file with connection
include_once './connection.php';

//instantiating data / method post and filer for string
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//converting date time to db format
$data_start = str_replace('/', '-', $dados['start']);
$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

//preparing query to save in the db, using links for values

$query_event = "UPDATE messages SET message_type=:message_type, color=:color, date=:date, to_whom=:to_whom, content=:content, remind_date=:remind_date, status=:status WHERE message_id=:id";
//preparing connection and query
$update_event = $conn2->prepare($query_event);
//getting values to link in the variable
$update_event->bindParam(':id', $dados['id']);
$update_event->bindParam(':message_type', $dados['title']);
$update_event->bindParam(':color', $dados['color']);
$update_event->bindParam(':date', $data_start_conv);
$update_event->bindParam(':to_whom', $dados['to_whom']);
$update_event->bindParam(':content', $dados['content']);
$update_event->bindParam(':remind_date', $dados['remind_date']);
$update_event->bindParam(':status', $dados['status']);

//executing query in the db
if ($update_event->execute()) {
    //arrays (success or not) message and situation
    $retorna = ['sit' => true, 'msgcad' => '<div class="alert alert-success" role="alert">Event updated successfuly!</div>'];
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Event added successfuly! Data: '.$dados['title'].', '.$dados['color'].', '.$data_start_conv.', '.$dados['to_whom'].', '.$dados['content'].', '.$dados['remind_date'].', '.$dados['status'].'</div>';
} else {
    $retorna = ['sit' => false, 'msgcad' => '<div class="alert alert-danger" role="alert">Error: Event updated unsuccessed! Data: '.$dados['title'].', '.$dados['color'].', '.$data_start_conv.', '.$dados['to_whom'].', '.$dados['content'].', '.$dados['remind_date'].', '.$dados['status'].'</div>'];
}


header('Content-Type: application/json');
echo json_encode($retorna);

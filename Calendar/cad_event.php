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

$status = 'ToDo';

//preparing query to save in the db, using links for values

$query_event = "INSERT INTO messages (message_type, color, date, to_whom, content, remind_date, status) VALUES (:message_type, :color, :date, :to_whom, :content, :remind_date, :status)";
//preparing connection and query
$insert_event = $conn2->prepare($query_event);
//getting values to link in the variable
$insert_event->bindParam(':message_type', $dados['title']);
$insert_event->bindParam(':color', $dados['color']);
$insert_event->bindParam(':date', $data_start_conv);
$insert_event->bindParam(':to_whom', $dados['to_whom']);
$insert_event->bindParam(':content', $dados['content']);
$insert_event->bindParam(':remind_date', $dados['remind_date']);
$insert_event->bindParam(':status', $status);

//executing query in the db
if ($insert_event->execute()) {
    //arrays (success or not) message and situation
    $retorna = ['sit' => true, 'msgcad' => '<div class="alert alert-success" role="alert">Event added successfuly!</div>'];
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Event added successfuly! Data: '.$dados['title'].', '.$dados['color'].', '.$data_start_conv.', '.$dados['to_whom'].', '.$dados['content'].', '.$dados['remind_date'].', '.$status.'</div>';
} else {
    $retorna = ['sit' => false, 'msgcad' => '<div class="alert alert-danger" role="alert">Error: Event additon unsuccessed! Data: '.$dados['title'].', '.$dados['color'].', '.$data_start_conv.', '.$dados['to_whom'].', '.$dados['content'].', '.$dados['remind_date'].', '.$status.'</div>'];
}


header('Content-Type: application/json');
echo json_encode($retorna);

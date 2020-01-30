<?php

//starting to use session
session_start();

//instantiating data / method post and filer for string
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


//getting values to link in the variable
/*
$update_event->bindParam(':id', $dados['id']);
$update_event->bindParam(':message_type', $dados['title']);
$update_event->bindParam(':color', $dados['color']);
$update_event->bindParam(':date', $data_start_conv);
$update_event->bindParam(':to_whom', $dados['to_whom']);
$update_event->bindParam(':content', $dados['content']);
$update_event->bindParam(':remind_date', $dados['remind_date']);
$update_event->bindParam(':status', $dados['status']);
*/

$to = $dados['to_whom'];
$subject = $dados['title'];
$txt = "
<html>
<head>
<title>".$dados['title']."</title>
</head>
<body>
<p>".$dados['content']."</p>
</body>
</html>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <6008@ait.nsw.edu.au>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

 

if(mail($to,$subject,$txt,$headers))
      {
      $retorna = "Mail was sent !";
      }
      else
      {
        $retorna = "Mail was not sent. Please try again later";
      }
     }



header('Content-Type: application/json');
echo json_encode($retorna);
?>
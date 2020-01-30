<?php
//starting to use session
session_start();

//working with db, adding the file with connection
include_once './connection.php';

//instantiating data / method post and filer for int
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$test= false; 

if( $test==false){
    echo "flase";
    
    
    try{ $sql ="DELETE FROM messages WHERE message_id ='".$id."';" ;
                
    
    if ($conn2->query($sql) === TRUE)
        {
            echo "updated";
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Dropped Successfuly<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        header("Location: ../Emails.php");
        }
    else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Error at Dropping Event $id<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        header("Location: ../Emails.php");
        }   
               
    echo "updated";
    }

catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>PDOException $e Check Dropping Event $id<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            echo $_SESSION['msg'];    
    }
header('Location: ../Emails.php');
$conn2->close();

?>
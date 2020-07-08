<?php
include 'database.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM tasks WHERE id = '$id'";
    $res = $conn->query($query);
    if(!$res){
        echo 'query failed';
    }
    $_SESSION['message'] = 'Task deleted';
    $_SESSION['message_type'] = 'danger';
    header('Location: index.php');

}
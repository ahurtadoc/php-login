<?php
include ('database.php');
if (isset($_POST['save_task'])){
    $title = $_POST['title'];
    $content = $_POST['content'];

    $query= "INSERT INTO tasks(title, content) VALUES ('$title','$content')";
    echo $query;
    $result = $conn->query($query);
    if(!$result){
        echo $result;
        die("Query failed");
    }
    $_SESSION['message'] = 'Task saved successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: index.php');

}
<?php
include 'database.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tasks WHERE id = '$id'";
    $res = $conn->query($query);
    if($res->num_rows == 1){
        $row = $res->fetch_array();
        $title = $row['title'];
        $content = $row['content'];


    }

}
if(isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $query = "UPDATE tasks set title = '$title', content = '$content' WHERE id = '$id'";
    $res = $conn->query($query);
    if(!$res){
        die( 'query failed');
    }

    $_SESSION['message'] = 'Task Updated';
    $_SESSION['message_type'] = 'warning';
    header('Location: index.php');
}

include 'includes/header.php'
?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto" >
            <div class="car car-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control"
                               placeholder="Update Title" value=<?php echo $title; ?> autofocus>
                    </div>
                    <div class="form-group">
                            <textarea name="content" rows="2" class="form-control"
                                      placeholder="Update content"><?php echo $content ?></textarea>
                    </div>
                    <input type="submit" class="btn btn-success" name="update" value="Update Task">
                </form>
            </div>

<?php include 'includes/footer.php' ?>

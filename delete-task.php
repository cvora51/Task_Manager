<?php 

    include('config/constants.php');
    
    if(isset($_GET['task_id']))
    {
        $task_id = $_GET['task_id'];
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        $sql = "DELETE FROM tbl_tasks WHERE task_id=$task_id";
        $res = mysqli_query($conn, $sql);
        
        if($res==true)
        {
            $_SESSION['delete'] = "Task Deleted Successfully.";
            header('location:index.php');
        }
        else
        {
            $_SESSION['delete_fail'] = "Failed to Delete Task";
            header('location:index.php');
        }
        
    }
    else
    {
        header('location:index.php');
    }

?>
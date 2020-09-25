<?php 

    include('config/constants.php'); 
    
    
    if(isset($_GET['list_id']))
    {
        $list_id = $_GET['list_id'];
        
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        
        $sql = "SELECT * FROM tbl_lists WHERE list_id=$list_id";
        $res = mysqli_query($conn, $sql);
        if($res==true)
        {
            $row = mysqli_fetch_assoc($res); //Value is in array
            
            $list_name = $row['list_name'];
            $list_description = $row['list_description'];
        }
        else
        {
            header('location:manage-list.php');
        }
    }

?>




<html>

    <head>
        <title>Task Manager with PHP and MySQL</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    
    <body>
         <div class="wrapper">
        
        
        
        <h1>TASK MANAGER</h1>
        
        
            
            <a class="btn-secondary" href="index.php">Home</a>
            <a class= "btn-secondary" href="manage-list.php">Manage Lists</a>
            
       
        
        
        <h3>Update List Page</h3>
        
        <p>
            <?php 
                if(isset($_SESSION['update_fail']))
                {
                    echo $_SESSION['update_fail'];
                    unset($_SESSION['update_fail']);
                }
            ?>
        </p>
        
        <form method="POST" action="">
        
            <table class="tbl-half">
                <tr>
                    <td>List Name: </td>
                    <td><input type="text" name="list_name" value="<?php echo $list_name; ?>" required="required" /></td>
                </tr>
                
                <tr>
                    <td>List Description: </td>
                    <td>
                        <textarea name="list_description">
                            <?php echo $list_description; ?>
                        </textarea>
                    </td>
                </tr>
                
                <tr>
                    <td><input class="btn-lg btn-primary" type="submit" name="submit" value="UPDATE" /></td>
                </tr>
            </table>
            
        </form>
        
        </div>
    </div>
        
    
    </body>

</html>


<?php 

    if(isset($_POST['submit']))
    {
        $list_name = $_POST['list_name'];
        $list_description = $_POST['list_description'];
        
        $conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        $db_select2 = mysqli_select_db($conn2, DB_NAME);
        
        $sql2 = "UPDATE tbl_lists SET 
            list_name = '$list_name',
            list_description = '$list_description' 
            WHERE list_id=$list_id
        ";
        
        $res2 = mysqli_query($conn2, $sql2);
        
        if($res2==true)
        {
            $_SESSION['update'] = "List Updated Successfully";
            
            header('location:manage-list.php');
        }
        else
        {
            $_SESSION['update_fail'] = "Failed to Update List";
            header('location:update-list.php?list_id='.$list_id);
        }
        
    }
?>
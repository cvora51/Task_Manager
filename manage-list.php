<?php 

include('config/constants.php');

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
        
        <h3>Manage Lists Page</h3>
        
        <p>
            <?php 
            
                //Check if the session is set
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                 if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
               
                if(isset($_SESSION['delete_fail']))
                {
                    echo $_SESSION['delete_fail'];
                    unset($_SESSION['delete_fail']);
                }
                
                


             
            ?>
        </p>
        
        <!-- Table to display lists starts here -->
        <div class="all-lists">
            
            <a class="btn-primary" href="add-list.php">Add List</a>
            
            <table class="tbl-half">
                <tr>
                    <th>S.N.</th>
                    <th>List Name</th>
                    <th>Actions</th>
                </tr>

                <?php
                    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
                    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
                    $sql = "SELECT * FROM tbl_lists";
                    $res = mysqli_query($conn, $sql);
                    if($res==true){
                        // echo "Executed";
                        $count_rows = mysqli_num_rows($res);
                        $sn = 1;

                        if($count_rows > 0){

                            while($row = mysqli_fetch_assoc($res)){
                                $list_id = $row['list_id'];
                                $list_name = $row['list_name'];
                                ?>

                                    <tr>
                                        <td><?php echo $sn++ ?>.</td>
                                        <td><?php echo $list_name; ?></td>
                                        <td>
                                            <a class="btn-update" href="update-list.php?list_id=<?php echo $list_id; ?>">Update</a>
                                            <a class="btn-delete" href="delete-list.php?list_id=<?php echo $list_id; ?>">Delete</a>
                                        </td>
                                    </tr>

                                <?php
                            }

                        }else{
                            ?>

                            <tr>
                                <td colspan = "3">No List added yet</td>
                            </tr>

                            <?php
                        }
                    }

      
                ?>

            </table>
        </div>
        <!-- Table to display lists ends here -->
        </div>
    </body>
</html>
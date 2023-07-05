<?php
session_start();
require_once('../../Database/connection1.php');

if(!isset($_SESSION['uid']))
{
    header("location:../../home.html");
  /*echo"<script>alert('Unauthorised access!!!');</script>";
  die();*/
}
if(!empty($_POST["college_id"]))
{ 
    // Fetch department data based for the specific college 
    $query = "SELECT * FROM department WHERE college_id = ".$_POST['college_id']."";
    $result = $db->query($query); 
     
    // Generate HTML of department options list 
    if($result->num_rows > 0)
    { 
        echo '<option value="">Select Department</option>'; 
        while($row = $result->fetch_assoc())
        { ?>
            <option value="<?php echo$row['dept_id'];?>" <?php echo (isset($_POST['dep']) && $_POST['dep'] === $new_row['dept_id']) ? 'selected' : '';?>><?php echo$row['dept_name'];?></option>
        <?php
        }
    }
    else
    { 
        echo '<option value="">Department not available</option>'; 
    } 
}
?>
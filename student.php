

<?php
    session_start();
    
    
    if(isset($_SESSION['id'])){
        $username=($_SESSION['username']);
        $userId=($_SESSION['id']);
        echo "The user name is : $username" ;
        echo "\n the id is : $userId";
        }
        else{
            header("Location:login.php");
        }
        
    $pagetitle="Entering Subjects Detail In This Page ";
    if($userId=='1'){
        include "includes/header.php";
    }
    elseif($userId=='2'){
        include "includes/header2.php";
    }
    else{
        include "includes/header3.php";
    }
    $pagetitle="student data";
    // include "includes/header2.php";
    
    ?>
<?php $db = new db(); ?>

<div class="container">
<?php 
if (isset($_GET['phone'])) {
        $phone = $_GET['phone'];
        
        if($db->delete_std($conn,'student_table',$phone)){
            echo "Record was Deleted";
            }
        } ?>
        

    <div class="row">
        <div class="templatemo-line-header" style="margin-top: 0px;">
            <div class="text-center">
                <hr class="team_hr team_hr_left hr_gray" /><span class="span_blog txt_darkgrey txt_orange">Students
                    Records</span>
                <hr class="team_hr team_hr_right hr_gray" />
            </div>
        </div>
    </div>
    <p><a href="student_entry.php" class="ui blue tiny button "><i class="glyphicon glyphicon-plus"> </i>Insert</a></p>
    <div class="table-responsive">
        <table class="ui celled table table table-hover">
            <thead>
                <tr>
                    <!--  <th>Std Id</th> -->
                    <th>Student Roll Number</th>
                    <th>Student Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Semester</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php        
            $veiw = $db->get_all_std($conn,'student_table',10);
            foreach ($veiw as $post) {
            $std_id = $post['std_roll_no'];
  
          echo '<tr>';

            // echo '<td>'. $post['student_id'] . '</td>';    
            echo '<td>'. $post['std_roll_no'] . '</td>';      
            echo '<td>'. $post['student_name'] . '</td>';
            echo '<td>'. $post['gender'] . '</td>';
            echo '<td>'. $post['email'] . '</td>';
            echo '<td>'. $post['phone'] . '</td>';
            echo '<td>'. $post['semester'] . '</td>';
            
            echo '<td width=250>';
            echo "<div class='ui mini buttons'>";
            echo '<a class="ui mini positive button" href="student_update.php?std_roll_no='.$post['std_roll_no'].'"> <i class="glyphicon glyphicon-pencil"></i>Update</a>';
            echo "<div class='or'></div>";    
            echo '<a class="ui mini red button" href="student.php?phone='.$post['phone'].'"><i class="glyphicon glyphicon-remove"> </i>Delete</a>';
            echo "</div>";
            echo '</td>';    
           echo '</tr>';  
            }
           ?>
            </tbody>
        </table>
    </div>
    <!--table-responsive-->
</div>
<!--container-->
<?php include "includes/footer.php"; ?>
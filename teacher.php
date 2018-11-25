
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

 $pagetitle="Teacher Records";
?>
  <?php $db = new db(); ?>


<div class="container">
	<?php 
		if(isset($_GET['teacher_id'])){
        $t_id = $_GET['teacher_id'];
        
        if($db->delete_teacher_record($conn,'teacher_table',$t_id)){
        echo "Record was Deleted";
            }
        } ?>

              <div class="row">
                    <div class="templatemo-line-header" style="margin-top: 0px;" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="span_blog txt_darkgrey txt_orange">Teacher Record</span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                </div>
               <p><a href="teacher_entry.php" class="ui blue tiny button "><i class="glyphicon glyphicon-plus"> </i>Insert</a></p>
                <div class="table-responsive">
                 <table class="ui celled table table table-hover">
                  <thead>
                    <tr>
                  
                      
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
     <tbody>
          <?php        
            $veiw = $db->get_all_teacher($conn,'teacher_table',10);
            foreach ($veiw as $post) {
            $teacher_id = $post['teacher_id'];
  
          echo '<tr>';

                     
            echo '<td>'. $post['teacher_name'] . '</td>';
            echo '<td>'. $post['gender'] . '</td>';
            echo '<td>'. $post['email'] . '</td>';
            echo '<td>'. $post['phone'] . '</td>';
           
            
            echo '<td width=250>';
            echo "<div class='ui mini buttons'>";
            echo '<a class="ui mini positive button" href="teacher_update.php?teacher_id='.$post['teacher_id'].'"> <i class="glyphicon glyphicon-pencil"></i>Update</a>';
            echo "<div class='or'></div>";    
            echo '<a class="ui mini red button" href="teacher.php?teacher_id='.$post['teacher_id'].'"><i class="glyphicon glyphicon-remove"> </i>Delete</a>';
            echo "</div>";
            echo '</td>';    
           echo '</tr>';  
            }
           ?>
      </tbody>     
            </table>
            </div><!--table-responsive-->
            </div><!--row-->   
           </div><!--container-->	  
<?php include "includes/footer.php"; ?>

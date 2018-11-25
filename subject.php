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

$pagetitle="Subjects Information";
 ?>
<?php $db = new db(); ?>

<div class="container">


    <div class="row">
        <div class="templatemo-line-header" style="margin-top: 0px;">
            <div class="text-center">
                <hr class="team_hr team_hr_left hr_gray" /><span class="span_blog txt_darkgrey txt_orange">Subjects
                    Details</span>
                <hr class="team_hr team_hr_right hr_gray" />
            </div>
        </div>
    </div>
    <p><a href="subject_entry.php" class="ui blue tiny button "><i class="glyphicon glyphicon-plus"> </i>Insert</a></p>
    <div class="table-responsive">
        <table class="ui celled table table table-hover">
            <thead>
                <tr>
                    <th>Subject No</th>
                    <th>Subject Name</th>
                    <th>Teacher Name</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <tbody>
                <?php        
            $veiw = $db->get_all_subject($conn,'subject_table',10);
            foreach ($veiw as $post) {
            $sub_no = $post['subject_no'];

            echo '<tr>';        
            echo '<td>'. $post['subject_no'] . '</td>';
            echo '<td>'. $post['subject_name'] . '</td>';
            echo '<td>'. $post['teacher_name'] . '</td>';
            echo '<td>'. $post['semester'] . '</td>';
            }
        ?>
            </tbody>
        </table>



    </div>
    <!--table-responsive-->
</div>
<!--container-->
<?php include "includes/footer.php"; ?>
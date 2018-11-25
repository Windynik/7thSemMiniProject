<?php
session_start();
if(isset($_SESSION['id'])){
    $username=($_SESSION['username']);
    $userID=($_SESSION['id']);
    echo "The user name is : $username" ;
    echo "\n the id is : $userID";
    }
    else{
        
        header("Location:login.php");
    }
$pagetitle="Entering Subjects Detail In This Page ";
if($userID=='1'){
    include "includes/header.php";
}
elseif($userID=='2'){
    include "includes/header2.php";
}
else{
    include "includes/header3.php";
}
?>

<?php 

    if (isset($_POST['saved'])) {
    $subject_no = $_POST['subject_no'];
    $subject = $_POST['subject_name'];
    $teacher= $_POST['teacher'];
    $semester= $_POST['semester'];

    $db = new db();

    if($db->subject_entry($conn,$subject_no,$subject,$teacher,$semester)){
    echo "Succesfully Saved";       
    }
    else{
        echo "unable to Save.";
    }
    }
    ?>
<?php  
error_reporting(E_ALL ^ E_DEPRECATED);
include("config.php");?>
<div class="container">

    <div class="row">
        <div class="templatemo-line-header" style="margin-top: 0px;">
            <div class="text-center">
                <hr class="team_hr team_hr_left hr_gray" /><span class="span_blog txt_darkgrey txt_orange">Subject's
                    Entry</span>
                <hr class="team_hr team_hr_right hr_gray" />
            </div>
        </div>
    </div>


    <div class="form-container">

        <form action="#" method="post" role="form">

            <div class="container">
                <div class="row">
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label for="subject_no">Subject Code </label>
                        
                            <input type="text" class="form-control" required id="subject_no" placeholder="Subject code"
                                name="subject_no">

                        </div>
                    </div>

                    < </div> <!--col-row-->
                </div>

        
        <div class="container">
                <div class="row">
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label for="subject_name">Subject Name </label>
                        
                            <input type="text" class="form-control" required id="subject_name" placeholder="Subject name"
                                name="subject_name">

                        </div>
                    </div>

                    < </div> <!--col-row-->
                </div>
                <!--col-container-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">

                            <div class="form-group">
                                <label for="semester">Semester </label>
                                <select class="form-control" required id="semester" name="semester">
                                    <option>Select semester</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-3">

                            <div class="form-group">

                                <label for="teacher">Teacher Name</label>
                                
                                <?php
                                    $qs=mysql_query("select * from teacher_table");
                                ?>
                                <?php	
                                    echo "<select class='form-control' required id='teacher' name='teacher' >";	
                                    		
                                    while($teachername=mysql_fetch_row($qs))
                                    {				
                                    echo"
                                    <option value=$teachername[1]>$teachername[1] </option>";
                                    }
                                    echo "</select>"."<br>";
                                ?>
                                    
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ui mini buttons col-sm-offset-3 col-sm-3">
                    <button type="submit" class="ui mini positive button" name="saved">Register</button>
                    <div class="or"></div>
                    <button type="reset" class="ui mini red button" name="back">Clear</button>
                </div>

        </form>
    </div>
    <!--form-container-->
</div>
<!--container-->

<?php include "includes/footer.php"; ?>
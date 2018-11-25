
<?php
session_start();
if(isset($_SESSION['id'])){
    $username=($_SESSION['username']);
    $userId=($_SESSION['id']);
    echo "<p>Your User name is $username </p>" ;
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
$pagetitle="student Report";
?>
<div class="container">
    <div class="row">
        <div class="templatemo-line-header" style="margin-top: 0px;">
            <div class="text-center">
                <hr class="team_hr team_hr_left hr_gray" /><span class="span_blog txt_darkgrey txt_orange">Individual
                    Searching</span>
                <hr class="team_hr team_hr_right hr_gray" />
            </div>
        </div>
    </div>
    <?php
error_reporting(E_ALL ^ E_DEPRECATED);
include("config.php");
?>
    <div class="form-container">

        <form method="post" action="Search_Rpt.php" role="form" class="search-form" style="width: 70%">
            <div class="container">
                <!-- <div class="row"> -->
                <div class="col-lg-8">
                    <div class="form-group">

                        <label for="student">Student Name </label>
                        <?php
          $qs=mysql_query("select * from student_table" );	
          echo "<select name='name' class='form-control' >";			

          while($stid=mysql_fetch_row($qs))
          {				
           echo"<option value=$stid[1] >$stid[1] </option>";
           }
          echo "</select>";

          ?>
                    

                    <div class="form-group">
                        <label for="date">Date: </label> <label style="color:red">(date should be like YY-MM-DD)</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                </div>
                <div class="col-lg-8"><br>
                    <button type="submit" class="btn btn-success btn-lg btn-block" value="Search" name="search">Search</button>
                </div>
            </div>

        </form>
    </div>
    <!--form-container-->
</div>
<!--container-->
<?php include "includes/footer.php"; ?>
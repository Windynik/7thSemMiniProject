
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
 $pagetitle="Teachers Registration Page";
 include "includes/header.php"; ?>
 <?php 
    if (isset($_POST['register'])) {
      
      $tName = $_POST['name'];
      $gender = $_POST['gender'];
      $email = $_POST['email'];
      $phone= $_POST['phone'];
     
      $db = new db();

      if($db->teacher_entry($conn,$tName,$gender,$email,$phone)){
      echo "New entry was created";
      }
      else{
        echo "unable to create new entry.";
      }
    }
     ?>  
<div class="container">

               <div class="row">
                    <div class="templatemo-line-header" style="margin-top: 0px;" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="span_blog txt_darkgrey txt_orange">Teachers Entry</span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                </div>


<div class="form-container">

    <form action="#" method="post" role="form" >
    
    
    <div class="form-container">
    <form action="#" method="post" role="form" >
    <div class="container">
    <div class="row">
    <div class="col-lg-3">
          <div class="form-group">
            <label for="name" > Name (*)</label>
            <input type="text" class="form-control" required id="name" placeholder="Name" name="name">
          </div>
    </div>
    
    </div>
    </div>
    <div class="container">
   
  <div class="col-lg-3">

          <div class="form-group">
          <label for="gender">Gender</label>
           <select  class="form-control" required id="sex" name="gender" >
           <option>-------select-------</option>
           <option value="male">Male</option>
           <option value="female">Female</option> 
           </select>
          </div>
  </div>
  </div>
  </div>
   <div class="container">
    <div class="row">
    <div class="col-lg-3">

          <div class="form-group">
            <label for="email" >Email address </label>
            <input type="email" class="form-control" required id="email" placeholder=" Email" name="email">
          </div>
   </div>
    <div class="col-lg-3">

          <div class="form-group">
            <label for="phone">Phone </label>
            <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone">
          </div>
    </div>
    </div>
    </div>
    <div class="container">
    <div class="row">
    
    
    </div>
    </div>
    <div class="container">
    
    </div>
          <div class="ui mini buttons col-sm-offset-3 col-sm-3">
          <button type="submit" class="ui mini positive button" name="register">Register</button>
          <div class="or"></div>
          <button type="reset" class="ui mini red button" name="back">Clear</button>
          </div>
      
       </form>
          </div><!--form-container-->
        </div> <!--container-->
   
<?php include "includes/footer.php"; ?>

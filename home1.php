<?php
session_start();

            if(isset($_SESSION['id'])){
            $username=($_SESSION['username']);
            $userId=($_SESSION['id']);
            echo "The user name is : $username" ;
            echo "\n the id is : $userId";
            }
            else{
                echo "<script> 
			
				alert('The username!')
			</script>";
                header("Location:login.php");
            }

        $pagetitle="Home Page";
        include "includes/header2.php";
        include "includes/slider.php";
    ?>
<div class="templatemo-welcome" id="templatemo-welcome">
    <div class="container">
        <div class="templatemo-slogan text-center">
            <span class="txt_darkgrey">Welcome to </span><span class="txt_orange">Home Page</span>
            <p class="txt_slogan">
        </div>
    </div>
</div>


<div id="templatemo-blog">
    <div class="container">
        <div class="row">
        <div class="row">
        <div id="entry" class="col-lg-4">
                    <div class="panel panel-primary">
        <img src="image/pioneer.jpg" alt="randomstudentslol" style="width:400px;height:200px;">
        </div>
        </div>
            <div class="blog_box">
                <div class="col-sm-5 col-md-6 blog_post">
                    <ul class="list-inline">
                        <li>
                            <div class="clearfix"> </div>
                            <p class="blog_text">
                            Acharya institute of technology is known for global leadership in technical education, and the Acharya faculty is a combination of young and experienced, passionate and curious individuals. They are the most distinguished scholars, who constantly do research in their respective fields.
                            <br>Faculty Logged in!
                        </li>
                    </ul>
                </div> <!-- /.blog_post 1 -->
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
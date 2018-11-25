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
    
        $pagetitle="Home Page";
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
            <?php include "includes/sidebar.php";?>
            <div class="blog_box">
                <div class="col-sm-5 col-md-6 blog_post">
                    <ul class="list-inline">
                        <li>
                            <div class="clearfix"> </div>
                            <p class="blog_text">
                                Acharya institute of technology is known for global leadership in technical education,
                                and the Acharya faculty is a combination of young and experienced, passionate and
                                curious individuals. They are the most distinguished scholars, who constantly do
                                research in their respective fields.
                                Admins
                        </li>
                    </ul>
                </div> <!-- /.blog_post 1 -->
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
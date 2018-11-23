<?php
$pagetitle="Search Report";
include "includes/header.php"; 
error_reporting(E_ALL ^ E_DEPRECATED);
$name=$_POST['name'];

$date=$_POST['date'];


include("config.php");

?>
<div class="container">
    <div class="row">
        <div class="templatemo-line-header" style="margin-top: 0px;">
            <div class="text-center">
                <hr class="team_hr team_hr_left hr_gray" /><span class="span_blog txt_darkgrey txt_orange">Individual
                    Report </span>
                <hr class="team_hr team_hr_right hr_gray" />
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="ui celled table table table-hover">
            <thead>
                <tr>

                    <th>StudentRollNumber</th>
                    <th>StudentName</th>
                    <th>Subject</th>
                    <th>Program</th>
                    <th>Date</th>
                    <th>Percentage</th>

                </tr>
            </thead>
            <tbody>
                <?php     
                error_reporting(E_ALL ^ E_DEPRECATED);
                $connect=mysql_connect("localhost","root","");
                if(!$connect)
                {
                    echo "Error".mysql_error();
                    }
                    
                    
                    $db=mysql_select_db("attendance_db");
                    if(!$db)
                    {
                        echo "Error".mysql_error();
                        }   
            $query=mysql_query("Select (Select count(*) from tbl_attendance Where attendance='P')/ count(std_roll_no) *100 as Percentage from tbl_attendance ");
			$query3=mysql_query("Select * from tbl_attendance T 
inner join Student_Table st on st.std_roll_no=T.std_roll_no
inner join Subject_table S on T.subject_no=S.Subject_No Where st.Student_Name like '%$name%' and T.date like '%$date%'  group by S.Subject_Name ");
while($row=mysql_fetch_row($query3))
{
echo"<tr>";
echo '<td>'. $row[1] . '</td>';
echo '<td>'. $row[6] . '</td>';
echo '<td>'. $row[12] . '</td>';
echo '<td>'. $row[14] . '</td>';
echo '<td>'. $row[4] . '</td>';
$query=mysql_query("Select  (select count(*) from tbl_attendance where Attendance='P' and std_roll_no='$row[1]' and subject_no='$row[2]')/(Select count(attendance) from tbl_attendance where std_roll_no='$row[1]' and subject_no='$row[2]')*100 as per from tbl_attendance where std_roll_no='$row[1]' and subject_no='$row[2]' group by per asc ");
while ($row2=mysql_fetch_row($query))
		    {
		 	   echo '<td>'. $row2[0] . '%</td>';
		 	   }
		 	   echo"</tr>";
}
            ?>
            </tbody>
        </table>
    </div>
    <!--table-responsive-->
</div>
<!--row-->
</div>
<!--container-->
<?php include "includes/footer.php"; ?>
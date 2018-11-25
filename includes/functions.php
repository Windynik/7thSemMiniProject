   <?php 
      $conn = "";
      try {

        $conn = new PDO('mysql:host=localhost;dbname=attendance_db;','root','');

      } catch (Exception $e) {

        echo 'ERROR'.$e->getMessage();
      }

// $con = mysqli_connect("localhost","root","","attendance_db");

// // Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }
//   // else{
//   // 	echo "successfully connected!";
//   // }
// 	$conn = new mysqli("localhost","root","","attendance_db");
// 	// Check connection
// 	if ($conn->connect_error) {
// 	    die("Connection failed: " . $conn->connect_error);
// } 



     Class db{

/**********************/
//Students Entry
/*********************/
 function std_entry($conn,$sno,$studentName,$gender,$email,$phone,$semester){
	try{
		
		$query = "INSERT INTO student_table SET std_roll_no = ?,student_name = ?, gender = ?,email = ?,phone = ?,semester=?";
		$entry = $conn->prepare($query);
		$entry->bindValue(1, $sno);
		$entry->bindValue(2, $studentName);
		$entry->bindValue(3, $gender);
		$entry->bindValue(4, $email);
		$entry->bindValue(5, $phone);
		$entry->bindValue(6, $semester);
		
		if($entry->execute())
		{
			return "Successfully registered.";
			die();
		}
		else{
			return "Unable to register! Try again please.";
		}
	}

		catch(PDOException $e){
			return "Error: " . $e->getMessage();
		}
	}


		/**********************/
		//Gettintg all records
		/*********************/

function get_all_std($conn,$table,$limit){

			try {
				$query = "SELECT * FROM {$table} ORDER BY  std_roll_no LIMIT {$limit}";
					$stmt = $conn->prepare( $query );
					$stmt->execute();
					return $stmt->fetchAll();

			} catch (Exception $e) {
				return "ERROR". $e->getMessage();
			}

	      }


	      /*********************************/
		//Getting single record for editing
		/***********************************/

function get_single_std($conn,$table,$id)
	{
		
		try {

			$query = "SELECT * FROM {$table} WHERE std_roll_no ={$id} ";
			$stmt = $conn->prepare($query);
			// $stmt->bindParam(1, $id);
			$stmt->execute();
			return $stmt->fetchAll();

			
		} catch (Exception $e) {
			return "Error : ". $e->getMessage();	
		}
	}

		/**********************/
		//delete single record
		/*********************/

function delete_std($conn,$table,$id){

			try {
				$query = "DELETE  FROM {$table} WHERE phone={$id}";
					$stmt = $conn->prepare( $query );
					$stmt->execute();
					
					
			} catch (Exception $e) {
				return "ERROR". $e->getMessage();
			}

	}

	 	/*****************************/
		//Update singel Student Record
		/****************************/

	function update_std($conn,$studentName,$dob,$gender,$email,$phone,$add,$rollno, $session, $program, $semester){
	try{
		
		$query = "UPDATE  student_table SET student_name = ?, dob = ?, gender = ?, email = ?, phone = ?, address = ? , Session = ?, Program = ?, Semester = ? WHERE std_roll_no = ?";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(1, $studentName);
		$stmt->bindParam(2, $dob);
		$stmt->bindParam(3, $gender);
		$stmt->bindParam(4, $email);
		$stmt->bindParam(5, $phone);
		$stmt->bindParam(6, $add);
		$stmt->bindParam(7, $session);
		$stmt->bindParam(8, $program);
		$stmt->bindParam(9, $semester);
		$stmt->bindParam(10, $rollno);
		if($stmt->execute()){
			return "Record was Updated.";
			die();
		}else{
			 return "Unable to Update Record";
			
		}
	}

		catch(PDOException $exception){
			return "Error: " . $exception->getMessage();
		}
	}

	/**************************/
	//Teachers Registration
	/*************************/
 function teacher_entry($conn,$name,$gender,$email,$phone){
	try{
		
		$query = "INSERT INTO teacher_table SET teacher_name = ?, gender = ?,email = ?,phone = ? ";

		$entry = $conn->prepare($query);
		$entry->bindValue(1, $name);
		$entry->bindValue(2, $gender);
		$entry->bindValue(3, $email);
		$entry->bindValue(4, $phone);
		
		if($entry->execute())
		{
			return "Successfully registered.";
			die();
		}
		else{
			return "Unable to register! Try again please.";
		}
	}

		catch(PDOException $e){
			return "Error: " . $e->getMessage();
		}
	}

        /*****************************/
		//Fetching Teachers Records
		/****************************/ 


	function get_all_teacher($conn,$table,$limit){
	       try {
				$query = "SELECT * FROM {$table} ORDER BY  teacher_id LIMIT {$limit}";
					$stmt = $conn->prepare( $query );
					$stmt->execute();
					return $stmt->fetchAll();

			} catch (Exception $e) {
				return "ERROR". $e->getMessage();
			}

	      }



       /***************************************************/
		  //Fetching teacher's single record for Editing
	   /*************************************************/ 

	 	function get_single_teacher($conn,$table,$id){
	        try {
				$query = "SELECT * FROM {$table} WHERE teacher_id= {$id}";
					$stmt = $conn->prepare( $query );
					$stmt->execute();
					return $stmt->fetchAll();

			} catch (Exception $e) {
				return "ERROR". $e->getMessage();
			}

	    }     

    /******************************/
	//Deleting Teacher's Record
	/*****************************/

    function delete_teacher_record($conn,$table,$t_id){
    	try{
    		$query="DELETE FROM {$table} WHERE teacher_id={$t_id}";
    		$stmt=$conn->prepare($query);
    		$stmt->execute();

    	}
    	catch(PDOException $e){
    		return "ERROR : ". $e->getMessage();

    	}
    } 

 /******************************/
	//Updating Teacher's Record
	/*****************************/

	function update_teacher_record($conn,$firstName,$lastName,$dob,$gender,$email,$phone,$degree,$salary,$address,$id){
	try{
		
		$query = "UPDATE  teacher_table SET first_name = ?, last_name = ?, dob = ?, gender = ?, email = ?, phone = ?, degree = ?, salary = ?, address = ? WHERE teacher_id = ?";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(1, $name);
		$stmt->bindParam(2, $gender);
		$stmt->bindParam(3, $email);
		$stmt->bindParam(4, $phone);
		
		if($stmt->execute()){
			return "Record was Updated.";
			die();
		}else{
			 return "Unable to Update Record";
			
		}
	}
		catch(PDOException $exception){
			return "Error: " . $exception->getMessage();
		}
	}

	 /*****************************/
	// Subject Entry
	/****************************/ 

	function subject_entry($conn,$subno,$subject_name,$teacher,$semester){
	try{
		
		$query = "INSERT INTO subject_table SET subject_no = ?,subject_name=?, teacher_name = ?, semester =?";

		$entry = $conn->prepare($query);
		$entry->bindValue(1, $subno);
		$entry->bindValue(2, $subject_name);
		$entry->bindValue(3, $teacher);
		$entry->bindValue(4, $semester);	
		if($entry->execute())
		{
			return "Successfully saved.";
			die();
		}
		else{
			return "Unable to save ! please try again.";
		}
	}

		catch(PDOException $e){
			return "Error: " . $e->getMessage();
		}
	}


		/**********************/
		//Gettintg all subject
		/*********************/

function get_all_subject($conn,$table,$limit){

			try {
				$query = "SELECT * FROM {$table} ORDER BY  subject_no LIMIT {$limit}";
					$stmt = $conn->prepare( $query );
					$stmt->execute();
					return $stmt->fetchAll();

			} catch (Exception $e) {
				return "ERROR". $e->getMessage();
			}

	      }

	    /**********************/
		//Gettintg all semester
		/*********************/

function get_all_term($conn,$table,$limit){

			try {
				$query = "SELECT * FROM {$table} ORDER BY  semester_no LIMIT {$limit}";
					$stmt = $conn->prepare( $query );
					$stmt->execute();
					return $stmt->fetchAll();

			} catch (Exception $e) {
				return "ERROR". $e->getMessage();
			}

	      }
 
 	 /*****************************/
	// semester Entry
	/****************************/ 

	function term_entry($conn,$semesterNo,$subject){
	try{
		
		$query = "INSERT INTO semester_table SET semester_no=?, subject = ?";

		$entry = $conn->prepare($query);
		$entry->bindValue(1, $semesterNo);
		$entry->bindValue(2, $subject);	
		if($entry->execute())
		{
			return "Successfully saved.";
			die();
		}
		else{
			return "Unable to save ! please try again.";
		}
	}

		catch(PDOException $e){
			return "Error: " . $e->getMessage();
		}
	}

	    //###################
		// Get Single User ##
		//###################

	function get_single_user($conn,$table,$id)
	{
		
		try {

			$query = "SELECT * FROM {$table} WHERE id ={$id} ";
			$stmt = $conn->prepare($query);
			// $stmt->bindParam(1, $user_id);
			$stmt->execute();
			return $stmt->fetchAll();

			
		} catch (Exception $e) {
			return "Error : ". $e->getMessage();	
		}
	}
//####################
//Get User ##
//####################
 function get_user($conn,$table){
				
		try {

				$query = "SELECT * FROM {$table}";
					$stmt = $conn->prepare( $query );
					$stmt->execute();
					return $stmt->fetchAll();

			} catch (Exception $e) {
				return "ERROR". $e->getMessage();
			}



		catch(PDOException $exception){
			return "Error: " . $exception->getMessage();
		}
	}

	
 	}


      







<?php
include("auth.php");
require_once("header.php");
require("db.php");
    // initialize errors variable
	$errors = "";
    
	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['diary_post'])) {
			$errors = "You must fill in the diary post";
		}else{
			$post = $_POST['diary_post'];
            $user_id = $_POST['user_id'];
            $trn_date = date("Y-m-d H:i:s");
			$sql = "INSERT into `diary` (post,user_id,trn_date) VALUES ('$post','$user_id','$trn_date')";
			mysqli_query($con, $sql);
			header('location: diary.php');
		}
	}
    
?>

  <div class="container">
  <br/><br/><br/>
  <form method="post" action="diary.php" class="input_form">
  <div class="card col-lg-8 mx-auto">
   
    <div class="card-body">
    <div class="card-header text-center bg-warning">Create Diary Post</div>
    <br/>
            <div class="form-group">
            <label for="todo">Diary Post</label>
            <textarea class="form-control" placeholder="Type something..." rows="4" name="diary_post"></textarea >
            </div>
    

            <div class="form-group">
            <input type="hidden" name="user_id"  value="<?php echo $_SESSION['user_id']; ?>"/>
            </div>

            <hr/>
            <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" />
            </div>
    </div>
   
  </div>
  <br/>
    
        
  <?php 
            $u_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM diary WHERE user_id = $u_id ";
            $result = mysqli_query($con, $sql);
            $x = 1;

                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) { ?>
                   <div class="card col-md-8 mx-auto">
                       <div class="card-header bg-warning"><?php echo $row["trn_date"]; ?></div>
                
                       <div class="card-body">
                           <p class="card-text"><?php echo $row["post"];?></p>
                       </div>
                   </div>
                   <br />
                      <?php } } ?>
    
  </div><!--container-->
  
  </div>
 <?php require_once("footer.php");?>
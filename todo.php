<?php
include("auth.php");
require_once("header.php");
require("db.php");
    // initialize errors variable
	$errors = "";

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
            $priority = $_POST['priority']; 
            $user_id = $_POST['user_id'];
            $done = 0;
            $trn_date = date("Y-m-d H:i:s");
			$sql = "INSERT into `tasks` (task, priority, user_id,done,trn_date) VALUES ('$task', '$priority','$user_id','$done','$trn_date')";
			mysqli_query($con, $sql);
			header('location: todo.php');
		}
	}
    if(isset($_POST['user_id'])){
        $id = $_POST['user_id'];
        $sql = "UPDATE tasks SET done = 1 WHERE id = $id";
        mysqli_query($con, $sql);
        header('location: todo.php');
    }	
?>

  <div class="container">
  <br/><br/><br/>
  <form method="post" action="todo.php" class="input_form">
  <div class="card col-lg-8 mx-auto">
   
    <div class="card-body">
    <div class="card-header text-center bg-warning">Create To Do Item</div>
    <br/>
            <div class="form-group">
            <label for="todo">To Do Item</label>
            <textarea class="form-control" placeholder="Type something..." rows="4" name="task"></textarea >
            </div>
    
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineCheckbox1" name="priority" value="High">
            <label class="form-check-label" for="inlineCheckbox1">High</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input"  name="priority" type="radio" id="inlineCheckbox2" value="Medium">
            <label class="form-check-label" for="inlineCheckbox2">Medium</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input"  name="priority" type="radio" id="inlineCheckbox3" value="Low">
            <label class="form-check-label" for="inlineCheckbox3">Low</label>
            </div>

            <div class="form-group">
            <input type="hidden" name="user_id"  placeholder="<?php echo $_SESSION['user_id']; ?>" value="<?php echo $_SESSION['user_id']; ?>"/>
            </div>

            <hr/>
            <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" />
            </div>
    </div>
   
  </div>
  <br/>
    <div class="card col-lg-8 mx-auto">
    
        <div class="card-body">
        <div class="card-header text-center bg-warning">My List</div>
         <table id="dtBasicExample" class="table table-striped table-bordered table-sm">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Task</th>
                     <th>Date</th> 
                     <th>Done</th>
                     <th>Mark as Done</th>
                 </tr>
             </thead>
             <tbody>
            <?php 
            $u_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM tasks WHERE user_id = $u_id ";
            $result = mysqli_query($con, $sql);
            $x = 1;

                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                
                    <td>
                    <?php 
                            echo $x++;
                    
                       ?> 
                    </td>
                      
                    <td scope="row"><?php echo $row["task"]; ?></td>
                    <td><?php echo $row["trn_date"]; ?></td>
                    <td>
                        <?php if($row["done"] == 1){ ?>
                        <p style="color:green">Done</p>
                        <?php } else {?>
                            <p style="color:red">Not Done</p>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if($row["done"] == 1){ ?>
                       
                        <button class="btn btn-success" disabled><i class="fa fa-check-circle" aria-hidden="true"></i></button>
                        <?php } else {?>
                            <form action="todo.php" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $row["id"]; ?>" />
                            <button class="btn btn-success" type="submit" name="done"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
                            </form>
                        <?php } ?>
                    </td>
                </tr>  
                  <?php 
                }
                } else {
                echo "0 results";
                }
              ?>
              
                
             </tbody>
             <tfoot>
             <tr>
                     <th>#</th>
                     <th>Task</th>
                     <th>Date</th> 
                     <th>Done</th>
                     <th>Mark as Done</th>
                 </tr>
             </tfoot>
         </table>
         
        </div>
        
    </div>
    
  </div><!--container-->
  
  </div>
 <?php require_once("footer.php");?>
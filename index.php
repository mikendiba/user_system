<?php
//include auth.php file on all secure pages
include("auth.php");
require_once("header.php");
?>

      <div class="container ">
            <hr/>
      <div class="card-deck">
            
                  <div class="card bg-primary">
                
                        <div class="card-body">
                        <a class="linky" href="diary.php">
                              <p class="card-text">Diary</p>
                        </a>
                        </div>
                  </div>
           
           
                  <div class="card bg-success">
                        
                        <div class="card-body">
                        <a class="linky"  href="todo.php">
                              <p class="card-text">To Do List</p>
                        </a>
                        </div>
                  </div>
            
      </div>
      </div>
   <?php require_once("footer.php"); ?>
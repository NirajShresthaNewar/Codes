<?php
 

?>


       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background: linear-gradient(to right, #001c68, #00b8a9);">
    
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="./assets/images/logo.png" width="80" height="80" alt="reader">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <?php           
       // if(isset($_SESSION['user_id'])){
          ?>
          <a href="index.php" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
         </a>
          <?php
      //  } else {
            ?>
            <a href="../../assets/logout.php" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>

            <?php
       // } 
		?>
    </div>  
</nav>

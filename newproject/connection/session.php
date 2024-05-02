<!-- email = email i.e one and the same thing -->
<!-- convert to mysqli -->
<?php  
    require_once("config.php");
    session_start();
	//echo "session start from session.php";
    $logged = false;
    //checking if anyoneis logged in or not
    if(isset($_SESSION['logged']))
    {
        if ($_SESSION['logged'] == true)
        {
            //echo "session not destroyed from session.php";
            $logged = true ;
            $email = $_SESSION['email'];		
        }
    }else {
	$logged=false;
    $_SESSION['logged']=false;}


    if($logged!= true){
      
		
        $email = "";
        if (isset($_POST['email']) && isset($_POST['password']))
        {//echo "fetching email";
			
            $email=$_POST['email'];
            $password=$_POST['password'];            
            // some prereq-safeguards for the purpose of DB searching ->
            $email = stripslashes($email);
            $email = mysqli_real_escape_string($con,$email);
            $password = stripslashes($password);
            $password = mysqli_real_escape_string($con,$password);
            
            //DB HAS 3 TABLES ADMIN READER AND USER BOTH HAVING THEIR OWN ATTRIBUTES
            //EMAIL AND PASSWORD 

            // user       
            $sql = "SELECT * FROM user WHERE email='$email' AND password='$password' ";
            $result = mysqli_query($con,$sql);
			
			

            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                $_SESSION['user'] = $row['username'];
                $_SESSION['logged']=true;
                $_SESSION['uid']=$row['user_id'];
                $_SESSION['email'] = $email;
                $_SESSION['account']="user";
                
                header("Location:../users/user/index.php");
            }  
            // admin
            $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password' ";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                $_SESSION['logged']=true;
                $_SESSION['email'] = $email;
                $_SESSION['aid']=$row['admin_id'];
                $_SESSION['account']="admin";
                header("Location:../users/admin/index.php");
            }
			
			 $sql = "SELECT * FROM meter_reader WHERE email='$email' AND password='$password' ";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                $_SESSION['logged']=true;
                $_SESSION['email'] = $email;
                $_SESSION['rid']=$row['reader_id'];
                $_SESSION['account']="reader";
                header("Location:../users/reader/index.php");
            }
            //email pass wrong redirect 
            if($_SESSION['logged']==false)
            {
             
                
                header("Location:../index.php");
                
            }

        }
		
		else{
                $_SESSION['logged']=false;
			
		}
    }
?>
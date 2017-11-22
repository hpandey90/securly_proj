<?php
include 'db_conn.php'; 
$err="";
if(isset($_POST['submit'])){
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $query = "select * from admin where user_name='".$uname."'";
    $result = $conn->query($query);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if($row['pwd']==md5($pwd)){
            $cookie_name = "user_name";
            $cookie_value = $uname;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            header('Location:dashboard.php');    
        }else{
            echo "Invalid Password";    
        }
    }else{
        $err= "Invalid Username or Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
<link rel="stylesheet" href="./css/login_v1.css">
</head>
<body>
  <div class="login">
	<h1>Login</h1>
    <form method="post">
        <div style="color:red"><?php echo $err ?></div>
    	<input type="text" name="uname" placeholder="Username" required="required" />
        <input type="password" name="pwd"  placeholder="Password" required="required" />
        <button type="submit" name ="submit"  class="btn btn-primary btn-block btn-large">Log me in.</button>
        <a href="#">Forgot Password</a>
    </form>
</div>
</body>
</html>
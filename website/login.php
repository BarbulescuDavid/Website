
<?php
  session_start();


  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = mysqli_connect("localhost", "root", "", "website");

    $query = mysqli_query($db, "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."'");



    if(mysqli_num_rows($query) != 0){
      $_SESSION['user_login'] = $username;
      header("Location: index.html");
    }else{
      $error = "Username or password incorrect";
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
      <title>Login Page</title>
	  <link rel="stylesheet" type="text/css" href="login_style.css">
</head>
<body>


	<div class="login_box">
	<img src="dwarf.png" class="avatar">
    <h1>Login here:</h1>
    <form method="post" action="login.php">
        <p>Username:</p><input type="text" name="username" placeholder="Insert username"/>
        <br/>
        <p>Password:</p><input type="password" name="password" placeholder="Insert password" />
        <br/>
        <input type="submit" name="submit" value="Login"/>
    </form>
    <h2>Or register: <a href="register_user.php"> HERE </a></h2>
	</div>
    <?php
        if(isset($error)){
          echo $error;
        }
    ?>
</body>

</html>

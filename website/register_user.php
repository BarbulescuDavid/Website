<?php
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $db = mysqli_connect("localhost", "root", "", "website");

  $query = mysqli_query($db, "INSERT INTO user(username, password) VALUES ('".$username."','".$password."')");

  if(mysqli_affected_rows($db) != 0){
    $succes = "Account created successfully.";
    header("Location: index.html");
  }
}
?>

<!DOCTYPE html>
<head>
      <title>Register Page</title>
      <link rel="stylesheet" type="text/css" href="login_style.css">
</head>
<body>

  <div class="login_box">
    <img src="dwarf.png" class="avatar">
    <h1>You can register here:</h1>
    <form method="post" action="register_user.php">
      <p>Username:</p><input type="text" name="username" placeholder="Insert username"/>
      <br/>
      <p>Password:</p><input type="password" name="password" placeholder="Insert password" />
      <br/>
      <input type="submit" name="submit" value="Register"/>
    </form>
  </div>
  <?php
      if(isset($succes)){
        echo $succes;
      }
  ?>

</body>
</html>

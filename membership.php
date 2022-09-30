<?php
    
    define( 'DB_NAME', 'szaveri3' );
    define( 'DB_USER', 'szaveri3');
    define( 'DB_PASSWORD','szaveri3');
    define( 'DB_HOST', 'localhost');

    function checkInfo($Username, $password) {

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  // Check connection
  if ($conn) {
    
   } else{
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "SELECT * FROM membership";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        if ($row["Username"] == $Username && $row["password"] == $password) {
            return $row["id"];
        }
    }
    } else {
        return -1;
    }

mysqli_close($conn);
 
}
?>
<!-- Set Cookies -->
<?php

if ($_POST['Username'] != '' && $_POST['password'] != '') {
    if (checkInfo($_POST['Username'], $_POST['password']) > 0) {
        setcookie("userid", checkInfo($_POST['Username'], $_POST['password']), time() + (86400 * 30), "/");
        header("Location: index.php");
    } else {
         setcookie("userid", "", time() - 3600, "/");
         print("Username and password are not correct.");
    }
}
   
?>
  
  

 
 
<form method="post">
  username: <input type="text" name="Username"><br>
  password: <input type="text" name="Password"><br>
  <input type="submit" value="Submit">
</form>
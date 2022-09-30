<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="./fontawesome-free-6.1.1-web/fontawesome-free-6.1.1-web/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Kavivanar|Open+Sans" rel="stylesheet">
	<link href="./fontface.css" rel="stylesheet">
<link href="./hiking.css" rel="stylesheet">
</head>
<?php
  define( 'DB_NAME', 'szaveri3' );
  define( 'DB_USER', 'szaveri3');
  define( 'DB_PASSWORD','szaveri3');
  define( 'DB_HOST', 'localhost');

  function checkInfo($Username, $password) {

  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
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
<?php

if ($_POST['Username'] != '' && $_POST['password'] != '') {
    if (checkInfo($_POST['Username'], $_POST['password']) > 0) {
        setcookie("userid", checkInfo($_POST['Username'], $_POST['password']), time() + (86400 * 30), "/");
        header("Location: comment.php");
    } else {
         setcookie("userid", "", time() - 3600, "/");
         print("Username and password are not correct.");
    }
}

?>
<!-- Set Cookies -->

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<button onclick="document.getElementById('id01').style.display='block'">Login</button>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"
class="close" title="Close Modal">&times;</span>
<form method="post">
<div class="container">
<label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="password">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>




    

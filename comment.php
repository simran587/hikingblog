<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="./fontawesome-free-6.1.1-web/fontawesome-free-6.1.1-web/css/all.css">

	<link href="./fontface.css" rel="stylesheet">
  <link href="./hiking.css" rel="stylesheet">
<link href="./comment.css" rel="stylesheet">
</head>
<header>
<nav>
			<ul>
				<li><a href="./index.html">Home</a></li>
				<li><a href="./about.html">About</a></li>
				<li><a href="./sitedescription.html">Site Description</a></li>
				<li><a href="./checklist.html">Checklist</a></li>
				<li><a href="./contact.php">Comment</a></li>
			</ul>
		</nav>
</header>
<?php
if(!isset($_COOKIE['userid'])) {
    header("Location: contact.php");
  } else {
    echo "";
  }
?>
  
<html>
<div class="container">
  <script src="./jquery-3.6.0.min.js"></script>
    <h2> Was this blog useful? <h2>
     <h2> Comment down below <h2>   

<form action="/html/tags/html_form_tag_action.cfm" method="post"   onsubmit = "return(insertComment())">

<textarea required placeholder = "" name="comments" id="comments" style="height=80%";>
</textarea>
<div>
<input type=submit ></div>
</form>
<div id = "commentArea"> 
  </div>

  <script>

    function insertComment () {
            comment = $("#comments").val();
           
            $.get("./commentajax.php", {"cmd" : "create", "input" : comment}, function(data) {
                $("#commentArea").html(data);
            });
            return(false);
        }
        function deleteComment(id) {
            $.get("./commentajax.php", {"cmd" : "delete", "id" : id}, function(data) {
                $("#commentArea").html(data);
            });
            return(false);
        }
        function showComment() {
            $.get("./commentajax.php", {"cmd" : ""}, function(data) {
                $("#commentArea").html(data);
            });
            return(false);
        }
        showComment();
  </script>
  </div>
</html> 
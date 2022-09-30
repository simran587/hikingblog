<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/css?family=Kavivanar|Open+Sans" rel="stylesheet">
	<link href="./fontface.css" rel="stylesheet">
<link href="./hiking.css" rel="stylesheet">
</head>

<?php

define('DB_NAME', 'szaveri3');
define('DB_USER', 'szaveri3');
define('DB_PASSWORD', 'szaveri3');
define('DB_HOST', 'localhost');

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function deleteComment($id) {
    global $conn;
    $del = "DELETE FROM COMMENT WHERE id = '$id'";
    $result = $conn->query($del);
}

function insertComment($input) {
    global $conn;

    $insert = "INSERT INTO COMMENT (comment)
    VALUES ('$input')";

    $result = $conn->query($insert);
}

function showComment() {
    global $conn;

    $sql = "SELECT * FROM COMMENT";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $delurl = "[<a href='' onclick=return(deleteComment('$id'))>delete</a>]";
        echo $row["comment"]."<br>";
    }
    } else {
    echo "";
    }
}

$cmd = $_GET['cmd'];

if ($cmd == 'create') {
    insertComment($_GET['input']);
} else if ($cmd == 'delete') {
    $id = $_GET['id'];
    deleteComment($id);
}

showComment();

mysqli_close($conn);

?>

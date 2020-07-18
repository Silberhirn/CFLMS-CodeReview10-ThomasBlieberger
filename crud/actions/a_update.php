<?php 

require_once 'db_connect.php';

if ($_POST) {
   $ISBN = $_POST['ISBN'];
   $title = $_POST['title'];
   $publish_date = $_POST['publish_date'];
   $type=$_POST['type'];
   $status=$_POST['status'];
   $author=$_POST['author'];
   $publisher=$_POST['publisher'];
   $short_description=$_POST['short_description'];
   $image=$_POST['image'];

   $sql = "UPDATE media SET ISBN = '$ISBN', title = '$title', publish_date = '$publish_date', type = '$type', status = '$status', fk_author_id = '$author', fk_publisher_id = '$publisher', short_description = '$short_description', image = '$image' WHERE ISBN = $ISBN" ;

echo "<!DOCTYPE html>
<html>
<head>
   <title>update</title>
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
</head>
<nav class='navbar navbar-expand-lg navbar-light bg-light'>

  <div class='collapse navbar-collapse' id='navbarSupportedContent'>
    <ul class='navbar-nav mr-auto'>
      <li class='nav-item active'>
        <a class='nav-link' href='../index.php'>Media</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='../publisher.php'>Publisher</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='../create.php'>Create New</a>
      </li>
    </ul>
  </div>
</nav>";

   if($connect->query($sql) === TRUE) {
       echo  "<p class='text-center m-3'>Successfully Updated</p>";
       echo "<div class='m-auto text-center'><a href='../update.php?id=" .$ISBN."'><button type='button' class='btn btn-outline-success'>Back</button></a><a href='../index.php'><button type='button' class='btn btn-outline-success'>Home</button></a></div>";
   } else {
        echo "Error while updating record : ". $connect->error;
   }

   $connect->close();

}

?>
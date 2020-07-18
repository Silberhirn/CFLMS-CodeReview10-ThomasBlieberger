<?php require_once 'actions/db_connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
   <title>index</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../CSS/index.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Media<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="publisher.php">Publisher</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">Create New</a>
      </li>
    </ul>
  </div>
</nav>

<div class="hero d-flex justify-content-center w-100"><p class="m-auto"><b>Your library around the corner!</b></p></div>

  <h1 class="w-100 my-5 text-center">Books</h1>

            <?php
           $sql = "select * from media join author on author.id=fk_author_id join publisher on publisher.id=fk_publisher_id where type='book'";
           $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "<div class='d-flex container my-4 mx-auto p-2'>
                       <div class='col-3 img_cont d-flex justify-content-center'><img class='img-fluid h-100 w-auto rounded' src='../".$row['image']."'></div><div class='col-6'><h3>" .$row['title']."</h3><p><b>Author: </b>".$row['name']." ".$row['surname']."</p><p><b>Publisher: </b>".$row['publisher_name']."</p><p><b>Published: </b>".$row['publish_date']."</p></div><div class='d-flex flex-column justify-content-center'><a href='update.php?id=".$row['ISBN']."'><button type='button' class='btn btn-outline-warning w-100'>Edit</button></a><a href='delete.php?id=" .$row['ISBN']."'><button type='button' class='btn btn-outline-danger w-100'>Delete</button></a><a href='medium.php?id=".$row['ISBN']."'><button type='button' class='btn btn-outline-success w-100'>Show More</button></a></div>
                       </div>";
               }
           } else  {
               echo  "<p>No Data Avaliable</p>";
           }
            ?>

  <h1 class="w-100 my-5 text-center">CDs</h1>

            <?php
           $sql = "select * from media join author on author.id=fk_author_id join publisher on publisher.id=fk_publisher_id where type='CD'";
           $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "<div class='d-flex container my-4 mx-auto p-2'>
                       <div class='col-3 img_cont d-flex justify-content-center'><img class='img-fluid h-100 w-auto rounded' src='../".$row['image']."'></div><div class='col-6'><h3>" .$row['title']."</h3><p><b>Artist: </b>".$row['name']." ".$row['surname']."</p><p><b>Label: </b>".$row['publisher_name']."</p><p><b>Published: </b>".$row['publish_date']."</p></div><div class='d-flex flex-column justify-content-center'><a href='update.php?id=".$row['ISBN']."'><button type='button' class='btn btn-outline-warning w-100'>Edit</button></a><a href='delete.php?id=" .$row['ISBN']."'><button type='button' class='btn btn-outline-danger w-100'>Delete</button></a><a href='medium.php?id=".$row['ISBN']."'><button type='button' class='btn btn-outline-success w-100'>Show More</button></a></div></div>
                       </div>";
               }
           } else  {
               echo  "<p>No Data Avaliable</p>";
           }
            ?>

  <h1 class="w-100 my-5 text-center">DVDs</h1>

            <?php
           $sql = "select * from media join author on author.id=fk_author_id join publisher on publisher.id=fk_publisher_id where type='DVD'";
           $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "<div class='d-flex container my-4 mx-auto p-2'>
                       <div class='col-3 img_cont d-flex justify-content-center'><img class='img-fluid h-100 w-auto rounded' src='../".$row['image']."'></div><div class='col-6'><h3>" .$row['title']."</h3><p><b>Regisseur: </b>".$row['name']." ".$row['surname']."</p><p><b>Studio: </b>".$row['publisher_name']."</p><p><b>Published: </b>".$row['publish_date']."</p></div><div class='d-flex flex-column justify-content-center'><a href='update.php?id=".$row['ISBN']."'><button type='button' class='btn btn-outline-warning w-100'>Edit</button></a><a href='delete.php?id=" .$row['ISBN']."'><button type='button' class='btn btn-outline-danger w-100'>Delete</button></a><a href='medium.php?id=".$row['ISBN']."'><button type='button' class='btn btn-outline-success w-100'>Show More</button></a></div>
                       </div>";
               }
           } else  {
               echo  "<p>No Data Avaliable</p>";
           }
            ?>


</body>
</html>
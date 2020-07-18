<?php 

require_once 'actions/db_connect.php';

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM media WHERE ISBN = $id" ;
   $result = $connect->query($sql);
   $data = $result->fetch_assoc();

   $connect->close();
?>

<!DOCTYPE html>
<html>
<head>
   <title >Delete media</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

<h3 class="text-center m-3">Do you really want to delete this media?</h3>
<p class="text-center"><?php echo $data['title'] ?></p>
<form action ="actions/a_delete.php" method="post" class="d-flex justify-content-center">

   <input type="hidden" name= "id" value="<?php echo $data['ISBN'] ?>" />
   <button type="submit" class='btn btn-outline-danger'>Yes, delete it!</button >
   <a href="index.php"><button type="button" class='btn btn-outline-success'>No, go back!</button ></a>
</form>

</body>
</html>

<?php
}
?>
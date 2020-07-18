<?php 

require_once 'actions/db_connect.php';

if ($_GET['id']) {
   $id = $_GET['id'];
   $sql = "SELECT * FROM media WHERE ISBN = $id" ;
   $result = $connect->query($sql);

   $data = $result->fetch_assoc();


?>

<!DOCTYPE html>
<html>
<head>
   <title >Edit media</title>

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


<fieldset>
   <legend>Update media</legend>
   <form action="actions/a_update.php"  method="post">
       <table>
           <tr>
               <th>ISBN</th >
               <td><input  type="text" name="ISBN"  placeholder="ISBN" value="<?php echo $data['ISBN'] ?>"></td >
           </tr>    
           <tr>
               <th>Title</th>
               <td><input  type="text" name= "title" placeholder="Title" value="<?php echo $data['title'] ?>"></td>
           </tr>
           <tr>
               <th>Date of publish</th>
               <td><input type="text"  name="publish_date" placeholder ="Date of publish" value="<?php echo $data['publish_date'] ?>"></td>
           </tr>
           <tr>
               <th>Type</th>
               <td>
                 <select name="type">
                    <option value="book" <?php if ($data['type']=='book'){echo 'selected';} ?>>Book</option>
                    <option value="CD" <?php if ($data['type']=='CD'){echo 'selected';} ?>>CD</option>
                    <option value="DVD" <?php if ($data['type']=='DVD'){echo 'selected';} ?>>DVD</option>
                  </select>
               </td>
              </tr>
              <tr>
               <th>Status</th>
              <td>
                 <select name="status">
                    <option value="available" <?php if ($data['status']=='available'){echo 'selected';} ?>>available</option>
                    <option value="reserved" <?php if ($data['status']=='reserved'){echo 'selected';} ?>>reserved</option>
                  </select>
               </td>
             </tr>           
             <tr>
            <th>Image (path)</th>
            <td><input type="text"  name="image" placeholder ="image (path)" value="<?php echo $data['image'] ?>" /></td>
          </tr>
             <tr>
              <th>Author/Artist/Regisseur</th>
              <td>
                 <select name="author">
                    <?php
                      $sql="select * from author";
                      $result = $connect->query($sql);
                      if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  if ($data['fk_author_id']==$row['id']){
                    echo "<option value='".$row['id']."' selected>".$row['name']." ".$row['surname']."</option>";
                  } else {
                    echo "<option value='".$row['id']."'>".$row['name']." ".$row['surname']."</option>";
                  }
               }
           }
                    ?>
                  </select>
               </td>
           </tr>

            <tr>
              <th>Publisher/Label/Studio</th>
              <td>
                 <select name="publisher">
                    <?php
                      $sql="select id, publisher_name from publisher";
                      $result = $connect->query($sql);
                      if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  if ($data['fk_publisher_id']==$row['id']){
                   echo  "<option value='".$row['id']."' selected>".$row['publisher_name']."</option>";
                 } else {
                  echo  "<option value='".$row['id']."'>".$row['publisher_name']."</option>";
                 }
               }
           }
                    ?>
                  </select>
               </td>
           </tr>
           <tr>
            <th>Short description</th>
            <td><textarea name="short_description" placeholder="Short description" rows=6 cols=70><?php echo $data['short_description'] ?></textarea></td>
           <tr>
               <input type= "hidden" name= "id" value= "<?php echo $data['id']?>" />
               <td><button  type= "submit" class='btn btn-outline-warning'>Save Changes</button ><a  href= "index.php"><button  type="button" class='btn btn-outline-success'>Back</button></a ></td>
               <td></td >
           </tr>
       </table>
   </form >

</body >
</html >

<?php
}
   $connect->close();
?>
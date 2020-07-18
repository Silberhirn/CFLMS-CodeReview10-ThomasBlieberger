<?php require_once 'actions/db_connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
   <title>add media</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../CSS/index.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Media</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="publisher.php">Publisher</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="create.php">Create New<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<fieldset>
   <legend>New medium</legend>

   <form  action="actions/a_medium_create.php" method= "post">
       <table cellspacing= "0" cellpadding="0">
           <tr>
               <th>ISBN</th >
               <td><input  type="text" name="ISBN"  placeholder="ISBN"></td >
           </tr>    
           <tr>
               <th>Title</th>
               <td><input  type="text" name= "title" placeholder="Title"></td>
           </tr>
           <tr>
               <th>Date of publish</th>
               <td><input type="text"  name="publish_date" placeholder ="Date of publish"></td>
           </tr>
           <tr>
               <th>Type</th>
               <td>
                 <select name="type">
                    <option value="book">Book</option>
                    <option value="CD">CD</option>
                    <option value="DVD">DVD</option>
                  </select>
               </td>
              </tr>
              <tr>
               <th>Status</th>
              <td>
                 <select name="status">
                    <option value="available">available</option>
                    <option value="reserved">reserved</option>
                  </select>
               </td>
             </tr>           
             <tr>
            <th>Image (path)</th>
            <td><input type="text"  name="image" placeholder ="image (path)" /></td>
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
                   echo  "<option value='".$row['id']."'>".$row['name']." ".$row['surname']."</option>";
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
                   echo  "<option value='".$row['id']."'>".$row['publisher_name']."</option>";
               }
           }
                    ?>
                  </select>
               </td>
           </tr>
           <tr>
            <th>Short description</th>
            <td><textarea name="short_description" placeholder="Short description" rows=6 cols=70></textarea></td>
          </tr>
           <tr>
               <th><button type ="submit" class='btn btn-outline-success'>Insert medium</button></td>
           </tr>
       </table>
   </form>
</fieldset>
<hr>

<fieldset>
   <legend>New author</legend>

   <form  action="actions/a_author_create.php" method= "post">
       <table cellspacing= "0" cellpadding="0">
           <tr>
               <th>Name</th >
               <td><input  type="text" name="name"  placeholder="Name" /></td >
           </tr>    
           <tr>
               <th>Title</th>
               <td><input  type="text" name= "surname" placeholder="Surname" /></td>
           </tr>

           <tr>
               <th><button type ="submit" class='btn btn-outline-success'>Insert author</button></td>
           </tr >
       </table>
   </form>
</fieldset>
<hr>

<fieldset class="mb-5">
   <legend>New publisher</legend>

      <form  action="actions/a_publisher_create.php" method= "post">
       <table cellspacing= "0" cellpadding="0">
           <tr>
               <th>Name</th >
               <td><input  type="text" name="publisher_name"  placeholder="Name" /></td >
           </tr>    
           <tr>
               <th>Address</th>
               <td><input  type="text" name= "address" placeholder="Address" /></td>
           </tr>
          <tr>
               <th>Size</th>
               <td>
                 <select name="size">
                    <option value="big">Big</option>
                    <option value="medium">Medium</option>
                    <option value="small">Small</option>
                  </select>
               </td>
              </tr>
       <tr>
               <th><button type ="submit" class='btn btn-outline-success'>Insert publisher</button></td>
           </tr >       
      </table>
   </form>
 </fieldset>

</body>
</html>
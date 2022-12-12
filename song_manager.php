<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Manager Song</title>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
      <h2 class="mb-5">MANAGER SONG</h2>
      

      <div class="table-responsive custom-table-responsive">

        <table class="table custom-table">
          <thead>
            <tr>  

              

              <th>Song Id</th>
        <th scope="col">Song Name </th>
        <th scope="col">Price </th>
        <th scope="col">Images </th>
        <th scope="col">Genre Name </th>
        <th scope="col">Singer Name </th>
        <th scope="col">Action </th>
            </tr>
          </thead>
          <tbody>
            <tr scope="row">

         <?php
          $connect = mysqli_connect('localhost' , 'root' , '' , 'mp4_music');
         $sql = "SELECT * FROM song,singer,genre WHERE song.genre_id = genre.genre_id and song.singer_id = singer.singer_id";
        $result = mysqli_query($connect, $sql);
        while($row= mysqli_fetch_array($result)){
               $song_id = $row['song_id'];
               $song_name = $row['song_name'];
               $song_price = $row['song_price'];
               $song_image = $row['song_img'];
               $genre_name = $row['genre_name'];
               $singer_name = $row['singer_name'];

            ?>
        <tr>

            
                          <td>
                         <?php echo $song_id ?>
                          </td>
                          <td><?php echo $song_name ?></td>
                          <td>
                            <small class="d-block"> <?php echo $song_price ?></small>
                          </td>
                          <td>
                          <img src="Images/<?php echo $song_image ?>" style ="width: 100px;">
                          </td>
                          <td>
                            <small class="d-block"><?php echo $genre_name ?></small>
                          </td>
                          <td>
                            <small class="d-block"><?php echo $singer_name ?></small>
                          </td>
                          <td> <a href="editsong.php?id=<?php echo $song_id ?>">Update | </a>
                         <a href="?id=<?php echo $song_id ?>"> Delete</a></td>
            
                        </tr>
                        <tr class="spacer"><td colspan="100"></td></tr>
             </tr>
             <?php
             }
             ?>

     
</table>
<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql="DELETE FROM song where song_id = $id";
    $result=mysqli_query($connect,$sql);
    if($result) {
        echo "<script> alert ('Xóa thành công!')</script>";
    }
} else{
    echo"Lỗi";
}
?>




            
          </tbody>
        </table>
      </div>


    </div>

  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>







     
</body>
</html>
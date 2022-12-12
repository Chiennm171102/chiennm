<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

</head>
<body>
<!-- menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
	  <a class="navbar-brand" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="#"> Home <span class="glyphicon glyphicon-home sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../dangky.php"> <span class="glyphicon glyphicon-user"></span>Register</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../dangnhap.php"> <span class="glyphicon glyphicon-user"></span>Login</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdown">
                      Dropdown
                  </a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                  </div>
              </li>
          </ul>
          
          <form class="form-inline my-2 my-lg-0" action="../search.php">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" name="Search" aria-label="Search">
              <input name="submit" class="btn btn-outline-success my-2 my-sm-0"  type="submit"></input>
          </form>


      </div>
  </div>
</nav>
<!-- end menu -->
<!-- slide -->
<div id="carouselExampleIndicators" class="carousel slide mt-1" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" style="max-height:550px" src="https://i.pinimg.com/originals/a3/71/b0/a371b07d9bd5d0810d6a29d0ae6c9694.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://i.pinimg.com/originals/a3/71/b0/a371b07d9bd5d0810d6a29d0ae6c9694.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://i.pinimg.com/originals/a3/71/b0/a371b07d9bd5d0810d6a29d0ae6c9694.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- end slide -->
<!-- list product -->
<div class="container">
	<div class="row mt-5">
		<h2 class="list-product-title">New product</h2>
		<div class="list-product-subtitle">
			<p>List product description</p>
		</div>
		<div class="product-group">
			<div class="row">


                
                <div class="product-group">
            <div class="row">            
            <?php
            $connect = mysqli_connect('localhost' , 'root' , '' , 'mp4_music');

            $sql = "SELECT * FROM song";            
            $result = mysqli_query($connect, $sql);
            // Trả về kết quả dạng 1 mảng
            while ($row_song = mysqli_fetch_array($result)){
                $song_id = $row_song['song_id'];
                $song_name = $row_song['song_name'];
                $song_price = $row_song['song_price'];
                $song_audio = $row_song['song_audio'];
                $song_img = $row_song['song_img'];
                ?>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="card card-product mb-3">
                      <img class="card-img-top" src="../img/<?php echo"$song_img"?>">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo"$song_name"?></h5>
                         <h5 class="card-title"><?php echo"$song_price"?></h5>
                       <audio controls controlsList="nodownload" ontimeupdate="myAudio(this)" style="width: 250px;">
                           <source src="Audio/<?php echo $song_audio?>" type="audio/mpeg">
                       </audio>
                       <script type="text/javascript">
                           function myAudio(event){
                               if(event.currentTime>10){
                                   event.currentTime=0;
                                   event.pause();
                                   alert("Bạn phải trả phí để nghe cả bài")
                               }
                           }
                       </script>
                       <?php
                       echo"
                        <a href='../detail.php?id=$song_id' class='btn btn-primary'>Details</a> "?>
                      </div>
                    </div>
                </div>
                <?php
            }
                ?>
               
            </div>
        </div>

			</div>
		</div>
	</div>
</div>
<!-- end list product -->

<!-- Load jquery trước khi load bootstrap js -->
<script src="./jquery-3.3.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
		<?php 
		include("connect.php");	
		?>

<div class="container mt-3">
<form method="POST" enctype="multipart/form-data">


    <div class="mb-3 mt-3">
      <label for="song ID">Toy ID:</label>
      <input type="text" class="form-control"  placeholder="Enter toy ID" name="song_id">
    </div>


    <div class="mb-3 mt-3">
      <label for="song Name">Toy Name:</label>
      <input type="text" class="form-control"  placeholder="Enter toy Name" name="song_name">
    </div>

    <div class="mb-3 mt-3">
      <label for=" song description">Toy description:</label>
      <input type="text" class="form-control"  placeholder="Toy description" name=" song_description">
    </div>

    <div class="mb-3 mt-3">
      <label for="song Price<">Toy Price<:</label>
      <input type="text" class="form-control"  placeholder="Toy Price" name="song_price">
    </div>

    <div class="mb-3 mt-3">
      <label for="song Img">Toy Img:</label>
      <input type="file" class="form-control"  placeholder="song Img" name="song_img">
    </div>
    
    
    <div class="mb-3 mt-3">
      <label for="song Audio">Toy Audio:</label>
      <input type="file" class="form-control"  placeholder="song Audio" name="song_audio">
    </div>

    <div >
    <select class="mb-3 mt-3"name='singer_id'>
							<?php 								
								$sql3 = 'select * from singer';
								$result3 = mysqli_query($connect, $sql3);
								while($row_singer =  mysqli_fetch_array($result3)){
									$singer_id =$row_singer['singer_id'];
									$singer_name =$row_singer['singer_name'];
									echo "<option value='$singer_id'>$singer_name</option>";		
								}
							?>
						</select>
    </div>

    <div class="mb-3 mt-3">
    <select name='genre_id'>
							<?php 
									
								$sql2 = 'select * from genre';
								$result2 = mysqli_query($connect, $sql2);
								while($row_cat =  mysqli_fetch_array($result2)){
									$genre_id =$row_cat['genre_id'];
									$genre_name =$row_cat['genre_name'];
									echo "<option value='$genre_id'>$genre_name</option>";		
								}
							?>
						</select>
    </div>



    <button type="submit" name="add_song" class="btn btn-primary">Submit</button>
  </form>
</div>

	

	<?php 
	
	if(isset($_POST['add_song'])){
		$song_id = $_POST['song_id'];
		$song_name = $_POST['song_name'];
		$song_price = $_POST['song_price'];
        $song_description = $_POST['song_description'];
					//Lấy ảnh từ thư mục bất kỳ của máy tính
		$song_img = $_FILES['song_img']['name'];
					// di chuyển ảnh từ thư mục bất kỳ sang thư mục tmp_name của htdocs
		$song_img_tmp = $_FILES['song_img']['tmp_name'];

					// Đưa ảnh từ thư mục tmp sang thư mục cần lưu 
		move_uploaded_file($song_img_tmp, "img/$song_img");
		$song_audio = $_FILES['song_audio']['name'];
					// di chuyển ảnh từ thư mục bất kỳ sang thư mục tmp_name của htdocs
		$song_audio_tmp = $_FILES['song_audio']['tmp_name'];
		move_uploaded_file($song_audio_tmp, "Audio/$song_audio");
		$genre_id = $_POST['genre_id'];
		$singer_id = $_POST['singer_id'];

					//Thêm sản phẩm vào cơ sở dữ liệu
		$sql = "INSERT INTO song VALUES('song_id','$song_name','$song_description','$song_price','$song_audio','$song_img','$genre_id','$singer_id', 'song_lyric')";
		$result = mysqli_query($connect,$sql);
		if($result){
			echo"<script>alert('Thêm mới sản phẩm thành công') </script>";
		}
		else{
			echo"<script>alert('Thêm mới lỗi') </script>";
		}
	}
	?>
</body>
</html>